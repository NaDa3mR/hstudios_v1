/*
 * Deal Drag & Drop Enhancement Script
 * This script efficiently manages empty state placeholders in the kanban board
 */

document.addEventListener('DOMContentLoaded', function() {
    // Add styling for better drag feedback
    const dragulaStyle = document.createElement('style');
    dragulaStyle.innerHTML = `
        .gu-mirror {
            opacity: 0.8 !important;
            transform: scale(0.95);
            z-index: 9999 !important;
        }

        .tasklist-cards-wrap.gu-over {
            background-color: rgba(33, 150, 243, 0.08) !important;
            border-radius: 8px !important;
            padding-bottom: 20px !important;
        }
    `;
    document.head.appendChild(dragulaStyle);

    // Simple direct functions for managing empty placeholders with minimal overhead
    function hideAllEmptyPlaceholders() {
        document.querySelectorAll('.empty-stage-placeholder').forEach(function(placeholder) {
            placeholder.style.display = 'none';
        });
    }

    // Simplified function that only updates necessary placeholders
    function updateEmptyPlaceholders() {
        document.querySelectorAll('.tasklist-cards-wrap').forEach(function(container) {
            if (container.id && container.id.startsWith('i')) {
                const stageId = container.id.substring(1);
                const placeholder = document.getElementById('empty-' + stageId);

                if (placeholder) {
                    const dealCount = container.querySelectorAll('.tasklist-card:not(.visually-hidden)').length;
                    placeholder.style.display = dealCount === 0 ? 'block' : 'none';
                }
            }
        });
    }

    // More efficient source container update
    function updateSourceContainer(source) {
        if (source && source.id && source.id.startsWith('i')) {
            const sourceId = source.id.substring(1);
            const placeholder = document.getElementById('empty-' + sourceId);
            // const cardCount = source.querySelectorAll('.tasklist-card:not(.visually-hidden)').length;

            if (placeholder && cardCount === 0) {
                placeholder.style.display = 'block';
            }
        }
    }

    // Direct implementation with reduced redundancy
    function setupDragula() {
        if (typeof drake !== 'undefined') {
            // When a drag operation starts, hide all empty placeholders
            drake.on('drag', hideAllEmptyPlaceholders);

            // After a drop, update only source and target with a single delayed check
            drake.on('drop', function(el, target, source) {
                // Wait for DOM to update, then check containers
                setTimeout(function() {
                    // Update the source container (where card was removed from)
                    if (source) updateSourceContainer(source);

                    // Update all placeholders once to catch any other changes
                    updateEmptyPlaceholders();
                }, 250);
            });

            // Single update for cancel and dragend operations
            drake.on('cancel', function() {
                setTimeout(updateEmptyPlaceholders, 250);
            });

            drake.on('dragend', function() {
                setTimeout(updateEmptyPlaceholders, 250);
            });

            return true;
        }
        return false;
    }

    // Try to find drake instance immediately or set a one-time check
    if (!setupDragula()) {
        // Single delayed check for drake after a reasonable timeout
        setTimeout(function() {
            // If drake still wasn't found, use native drag events as fallback
            if (!setupDragula() && typeof drake === 'undefined') {
                // Simplified fallback using native drag events
                document.addEventListener('dragstart', hideAllEmptyPlaceholders);
                document.addEventListener('dragend', function() {
                    setTimeout(updateEmptyPlaceholders, 250);
                });
            }
        }, 2000);
    }

    // Setup a single mutation observer for all containers
    function setupMutationObserver() {
        // Create one observer that watches all containers
        const observer = new MutationObserver(function(mutations) {
            // Only update if there were actual changes to the DOM
            let shouldUpdate = false;

            for (let mutation of mutations) {
                if (mutation.type === 'childList' &&
                    (mutation.addedNodes.length > 0 || mutation.removedNodes.length > 0)) {
                    shouldUpdate = true;
                    break;
                }
            }

            if (shouldUpdate) {
                // Just update all placeholders once - more efficient than checking each individually
                updateEmptyPlaceholders();
            }
        });

        // Watch all stage containers with a single observer
        document.querySelectorAll('.tasklist-cards-wrap').forEach(function(container) {
            observer.observe(container, {
                childList: true,   // Watch for card additions/removals
                subtree: false     // Don't need to watch the entire subtree
            });
        });
    }

    // Set initial empty placeholders on page load
    document.querySelectorAll('.tasklist-cards-wrap').forEach(function(container) {
        if (container.id && container.id.startsWith('i')) {
            const stageId = container.id.substring(1);
            const dealCount = container.querySelectorAll('.tasklist-card:not(.visually-hidden)').length;
            const emptyPlaceholder = document.getElementById('empty-' + stageId);

            if (emptyPlaceholder) {
                emptyPlaceholder.style.display = dealCount === 0 ? 'block' : 'none';
            }
        }
    });

    // Set up the mutation observer once the DOM is fully loaded
    setupMutationObserver();

    // Final check after all scripts have loaded
    setTimeout(updateEmptyPlaceholders, 1000);

    // No global functions or variables needed anymore

    // Just update once at the beginning
    updateEmptyPlaceholders();
});
