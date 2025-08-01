/*Kanban Init*/
$(document).ready(function() {
    const pipelineId = document.getElementById('pipe').innerHTML;

    // Function to update counters and empty states when deals are moved
    function updateCounter(stageId, source) {
        // Get stage IDs
        var sourceStageId = (source.id).substring(1);
        var targetStageId = stageId;

        // Get containers
        var sourceContainer = document.getElementById("i" + sourceStageId);
        var targetContainer = document.getElementById("i" + targetStageId);

        // Update counters - count actual deal cards (excluding empty placeholders)
        var sourceDealCount = sourceContainer.querySelectorAll('.tasklist-card:not(.empty-stage-placeholder)').length;
        var targetDealCount = targetContainer.querySelectorAll('.tasklist-card:not(.empty-stage-placeholder)').length;

        // Update counter badges
        var sourceCounter = document.getElementById("count" + sourceStageId);
        var targetCounter = document.getElementById("count" + targetStageId);
        if (sourceCounter) sourceCounter.textContent = sourceDealCount;
        if (targetCounter) targetCounter.textContent = targetDealCount;

        // Handle empty state for source stage
        handleEmptyState(sourceStageId, sourceDealCount);

        // Handle empty state for target stage - always has at least one card after drop
        handleEmptyState(targetStageId, targetDealCount);

        // Update financial metrics for both stages
        updateStageFinancials(sourceStageId);
        updateStageFinancials(targetStageId);
    }

    // Function to handle showing/hiding empty state placeholder
    function handleEmptyState(stageId, dealCount) {
        var container = document.getElementById("i" + stageId);
        var placeholder = document.getElementById("empty-" + stageId);

        if (!container) return;

        // If no placeholder exists but stage is empty, create one
        if (!placeholder && dealCount === 0) {
            var emptyHtml = `
                <div class="px-2 py-4 text-center empty-stage-placeholder" id="empty-${stageId}">
                    <div class="mx-auto mb-2 avatar avatar-sm bg-light text-primary rounded-circle">
                        <span class="avatar-text"><i class="ri-add-line"></i></span>
                    </div>
                    <p class="mb-0 text-muted small">No deals in this stage</p>
                </div>
            `;
            container.innerHTML += emptyHtml;
        }
        // Otherwise show/hide existing placeholder
        else if (placeholder) {
            placeholder.style.display = dealCount === 0 ? 'block' : 'none';
        }
    }

    // Function to calculate and update financial metrics for a stage
    function updateStageFinancials(stageId) {
        var container = document.getElementById("i" + stageId);
        if (!container) return;
        
        // Get the parent stage element that contains the financial metrics
        var stageElement = container.closest('.tasklist');  
        if (!stageElement) return;

        // Get all deal cards in this stage
        var deals = container.querySelectorAll('.tasklist-card:not(.empty-stage-placeholder)');

        // Calculate total amount
        var totalAmount = 0;
        deals.forEach(function(deal) {
            // Get amount from data attribute
            var amount = parseFloat(deal.getAttribute('data-amount') || 0);
            if (!isNaN(amount)) {
                totalAmount += amount;
            }
        });

        // Get stage percentage - need to find the percentage badge specifically
        var percentageElement = stageElement.querySelector('.badge:not([id^="count"])');
        var percentage = 0;
        if (percentageElement) {
            // Extract percentage from text content (expected format: "XX%")
            var percentText = percentageElement.textContent.trim();
            percentage = parseFloat(percentText.replace(/[^0-9.]/g, '')) || 0;
        }

        // Calculate weighted amount
        var weightedAmount = totalAmount * (percentage / 100);

        // Find elements to update
        var totalElement = stageElement.querySelector('[data-metric="total"]');
        var weightedElement = stageElement.querySelector('[data-metric="weighted"]');

        // Update values if elements exist
        if (totalElement) {
            totalElement.textContent = '$' + formatNumber(totalAmount);
        }

        if (weightedElement) {
            weightedElement.textContent = '$' + formatNumber(weightedAmount);
        }
    }

    // Helper function to format numbers for currency display
    function formatNumber(number) {
        return number.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    // Initialize Kanban board
    let apiUrl = `/apiss/deals/${pipelineId}/stages`;

    $.ajax({
        url: apiUrl,
        type: "GET",
        success: function(data) {
            // Create Dragula instance for drag and drop
            var drake = dragula(
                data.map(stage => document.getElementById("i" + stage))
            );

            // When a deal is dropped
            drake.on('drop', function(el, target, source, sibling) {
                var dealId = el.id;
                var targetStageId = target.id.substring(1);

                // Update the deal stage via AJAX
                var updateUrl = `/deals/update-stage`;
                var requestData = {
                    deal_id: dealId,
                    stage_id: targetStageId
                };

                $.ajax({
                    url: updateUrl,
                    type: 'GET',
                    data: requestData,
                    success: function(response) {
                        // Update counters and financial metrics
                        updateCounter(targetStageId, source);
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to update deal stage:', error);
                        // Move deal back to source on error
                        source.appendChild(el);
                        // Update counters to reflect the reversion
                        var sourceStageId = source.id.substring(1);
                        updateCounter(sourceStageId, target);
                    }
                });
            });

            // Initialize empty states and counters
            setTimeout(function() {
                data.forEach(function(stageId) {
                    var container = document.getElementById("i" + stageId);
                    if (container) {
                        var dealCount = container.querySelectorAll('.tasklist-card:not(.empty-stage-placeholder)').length;
                        handleEmptyState(stageId, dealCount);
                        updateStageFinancials(stageId);
                    }
                });
            }, 500);
        },
        error: function(error) {
            console.log(`Error loading stages: ${error}`);
        }
    });



});

dragula([document.getElementById("tasklist_wrap")], {
	moves: function (el, container, handle) {
		return handle.classList.contains('tasklist-handle');
	}
});
/* Single Date*/
// $('input[name="single-date-pick"]').daterangepicker({
// 	singleDatePicker: true,
// 	startDate: moment().startOf('hour'),
// 	showDropdowns: true,
// 	minYear: 1901,
// 	"cancelClass": "btn-secondary",
// 	locale: {
// 	  format: 'YYYY-MM-DD'
// 	}
// });
/*Id Add*/
var edCnt = 0;
$('.editable').each(function () {
	$(this).attr('id', 'editable_' + edCnt);
	edCnt++;
});

function getEditorStatus(editorId) {
	return tinymce.get(editorId).mode.get();
};

function toggleEditorStatus(editorId, currentStatus) {
	if (currentStatus === "design") {
		tinymce.get(editorId).mode.set("readonly");
	} else {
		tinymce.get(editorId).mode.set("design");
	}
};

function enableDisable(targetEditor) {
	var status = getEditorStatus(targetEditor);
	toggleEditorStatus(targetEditor, status);
};
// tinymce.init({
// 	selector: '.editable',
// 	inline: true,
// 	readonly: true,
// 	toolbar: false,
// 	menubar: false,
// });

var selId, el, sel, range;
$(document).on("click", ".edit-tyn", function (e) {
	selId = $(this).closest('.inline-editable-wrap').find('.editable').attr('id');
	$(this).css('visibility', 'hidden');
	el = document.getElementById(selId);
	range = document.createRange();
	sel = window.getSelection();
	range.selectNodeContents(el);
	range.collapse(false);
	sel.removeAllRanges();
	sel.addRange(range);
	el.focus();
	enableDisable(selId);
	return false;
});
$(document).on("focusout", ".editable", function (e) {
	enableDisable(selId);
	$('.edit-tyn').css('visibility', 'visible');
});
/*Individual Add Task*/
var $closestTarget;
$(document).on("click", ".btn-add-newtask", function (e) {
	$closestTarget = $(this).closest('.tasklist').find(".tasklist-cards-wrap");
	$('.add-new-task input.form-control.task-name').val("");
});
$(document).on("click", ".btn-add-task", function (e) {
	e.preventDefault();
	var taskName, htmlBlock;
	if ($('.add-new-task input.form-control').val())
		taskName = $('.add-new-task input.task-name').val();
	else
		taskName = "Dummy Task";
	htmlBlock = `<div class="card card-simple card-flush rounded-8 tasklist-card">
					<div class="card-header card-header-action rounded-8">
						<h6 class="fw-semibold">${taskName}</h6>
						<div class="card-action-wrap">
							<a class="btn btn-xs btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown"><span class="btn-icon-wrap"><span class="feather-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></span></span></a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#task_detail"><span class="feather-icon dropdown-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></span><span>Edit</span></a>
								<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span><span>Assign to</span></a>
								<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg></span><span>Attach files</span></a>
								<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg></span><span>Apply Labels</span></a>
								<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span><span>Set Due Date</span></a>
								<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg></span><span>Follow Task</span></a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg></span><span>Set as Top Priority</span></a>
								<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg></span><span>Change Status</span></a>
								<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pocket"><path d="M4 3h16a2 2 0 0 1 2 2v6a10 10 0 0 1-10 10A10 10 0 0 1 2 11V5a2 2 0 0 1 2-2z"></path><polyline points="8 10 12 14 16 10"></polyline></svg></span><span>Save as Template</span></a>
								<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg></span><span>Move to archive</span></a>
								<a class="dropdown-item delete-task" href="#"><span class="feather-icon dropdown-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></span><span>Delete</span></a>
							</div>
						</div>

					</div>
					<div class="card-footer text-muted justify-content-between">
						<div>
							<span class="task-counter">
								<span><i class="ri-checkbox-line"></i></span>
								<span>12/18</span>
							</span>
							<span class="task-discuss">
								<span><i class="ri-message-3-line"></i></span>
								<span>24</span>
							</span>
						</div>
						<div>
							<span class="task-deadline">
								22 Sep, 22
							</span>
						</div>
					</div>
				</div>`;
	$(htmlBlock).appendTo($closestTarget);
	$(this).parents().find('.modal').modal("hide");
});

$(document).on("click", ".delete-task", function (e) {
	e.preventDefault();
	$(this).closest('.tasklist-card').remove();
});

/*Edit List*/
var $tasklistHead;
$(document).on("click", ".edit-tasklist", function (e) {
	e.preventDefault();
	$('.edit-tasklist-modal  input').val($(this).closest('.tasklist-handle').find('h6 .tasklist-name').text());
	$tasklistHead = $(this).parent().parent().parent().find('h6 .tasklist-name');
});
$(document).on("click", ".btn-edit-tasklist", function (e) {
	e.preventDefault();
	$tasklistHead.text($('.edit-tasklist-modal input').val());
	$(this).parents().find('.modal').modal("hide");
});

/*Delete List*/
$(document).on("click", ".delete-tasklist", function (e) {
	e.preventDefault();
	$(this).closest('.tasklist').remove();
});

/*Clear List*/
$(document).on("click", ".clear-tasklist", function (e) {
	e.preventDefault();
	$(this).closest('.tasklist').find('.tasklist-card').remove();
});

/*Individual List*/
$(document).on("click", ".btn-add-newlist", function (e) {
	$('.add-tasklist-modal input.form-control').val("");
});
$(document).on("click", ".btn-add-tasklist", function (e) {
	e.preventDefault();
	var taskListName, htmlBlock;
	if ($('.add-tasklist-modal input.form-control').val())
		taskListName = $('.add-tasklist-modal input.form-control').val();
	else
		taskListName = "All Modules";
	htmlBlock = '<div class="card card-flush tasklist"><div class="card-header card-header-action rounded-8"><div class="tasklist-handle"><h6 class="mb-0 text-uppercase d-flex align-items-center"><span class="tasklist-name">' + taskListName + '</span><span class="badge badge-sm badge-pill badge-light ms-2">4</span></h6><div class="card-action-wrap"> <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown"><span class="btn-icon-wrap"><span class="feather-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg></span></span></a><div role="menu" class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item edit-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#edit_task_list">Edit</a> <a class="dropdown-item delete-tasklist" href="#">Delete</a> <a class="dropdown-item clear-tasklist" href="#">Clear All</a></div></div></div> <button class="btn btn-soft-primary btn-block btn-add-newtask" data-bs-toggle="modal" data-bs-target="#add_new_card"><span><span class="icon-label"><span class="feather-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></span></span></span></button></div><div data-simplebar class="card-body"><div class="tasklist-cards-wrap"></div></div></div>';
	$(htmlBlock).insertBefore($('.add-new-task'));
	$(this).parents().find('.modal').modal("hide");
});

/*Horizontal Scroll*/
new PerfectScrollbar('#kb_scroll', {
	suppressScrollY: true,
});

/*Radial*/
var options6 = {
	series: [85],
	chart: {
		type: 'radialBar',
		width: 50,
		height: 50,
		sparkline: {
			enabled: true
		}
	},
	colors: ['#007D88'],
	dataLabels: {
		enabled: false
	},
	plotOptions: {
		radialBar: {
			hollow: {
				margin: 0,
				size: '80%'
			},
			track: {
				margin: 0,
				strokeWidth: '97%',
			},
		}
	},
	labels: ['8/12'],

};

var chart6 = new ApexCharts(document.querySelector("#sparkline_chart_7"), options6);
chart6.render();
