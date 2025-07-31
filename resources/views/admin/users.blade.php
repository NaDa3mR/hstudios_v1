<!doctype html>
@include('admin.main.html')

<head>
    <meta charset="utf-8" />
    <title> dashboard template </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.main.meta')
    <style>
    .btn-link{
        color: #33475b;
    }
    .btn-link:hover{
        color: rgba(74,96,156,1);
    }
    #datable_4c_filter{
        float: right;
    }
    .avatar.avatar-info > .initial-wrap {
        background-color: rgba(74,96,156,1) !important;
        color: #fff;
    }
    .feather-search {
      display: none;
    }
    /* Enhanced Table Styling */
    #datable_4c thead th {
        border-bottom: 2px solid rgba(74,96,156,1) !important;
        font-weight: 600;
        padding: 12px 15px;
    }

    #datable_4c tbody td {
        padding: 12px 15px;
        vertical-align: middle;
    }

    .role-dropdown {
        min-width: 120px;
        text-align: left;
        position: relative;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .role-dropdown:hover {
        border-color: rgba(74,96,156,1) !important;
    }

    .role-item.active {
        background-color: #f0f0f0;
        font-weight: 500;
    }

    .role-item:hover {
        color: rgba(74,96,156,1);
    }

    /* Loading animation */
    .role-loading {
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 2px solid rgba(0, 0, 0, 0.1);
        border-left-color: rgba(74,96,156,1);
        border-radius: 50%;
        animation: role-spin 1s linear infinite;
        margin-left: 5px;
        vertical-align: middle;
    }

    @keyframes role-spin {
        to { transform: rotate(360deg); }
    }
    </style>
</head>

<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active" >
        @include('admin.main.sidebar')
        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            <!-- @include('admin.sections.users.topbar')
                            @include('admin.sections.users.table') -->
                        </div>
                        <!-- @include('admin.sections.users.add_modal')
                        @foreach ($users as $user)
                            @include('admin.sections.users.delete_modal')
                        @endforeach -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.main.scripts')

    <script>
        // Set up CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize role dropdown functionality
            initRoleDropdowns();

            // Initialize toast
            var roleUpdateToast = new bootstrap.Toast(document.getElementById('roleUpdateToast'), {
                delay: 3000
            });

            function initRoleDropdowns() {
                // Initialize all role-item click handlers
                document.querySelectorAll('.role-item').forEach(function(item) {
                    item.addEventListener('click', function(e) {
                        e.preventDefault();

                        const roleItem = this;
                        const roleMenu = roleItem.closest('.role-menu');
                        const userId = roleMenu.dataset.userId;
                        const roleName = roleItem.dataset.role;
                        const dropdownButton = roleItem.closest('.dropdown').querySelector('.role-dropdown');
                        const currentRoleLabel = dropdownButton.querySelector('.role-label');

                        // Don't do anything if this is already the active role
                        if (roleItem.classList.contains('active')) {
                            return;
                        }

                        // Show loading spinner
                        currentRoleLabel.innerHTML = `
                            <span>${roleName}</span>
                            <span class="role-loading"></span>
                        `;

                        // Send AJAX request to update role
                        updateUserRole(userId, roleName)
                            .then(function(response) {
                                if (response.success) {
                                    // Update UI
                                    currentRoleLabel.textContent = roleName;

                                    // Clear all dropdown items first
                                    roleMenu.querySelectorAll('.role-item').forEach(function(ri) {
                                        // Remove active class
                                        ri.classList.remove('active');

                                        // Remove ALL existing check icons completely
                                        const icons = ri.querySelectorAll('i[data-feather="check"]');
                                        icons.forEach(icon => icon.parentNode.removeChild(icon));
                                    });

                                    // Mark the selected role as active
                                    roleItem.classList.add('active');

                                    // Add a new check icon (completely replacing any previous ones)
                                    // const checkIcon = document.createElement('i');
                                    // checkIcon.setAttribute('data-feather', 'check');
                                    // checkIcon.classList.add('float-end');
                                    // checkIcon.style.width = '16px';
                                    // checkIcon.style.height = '16px';
                                    // roleItem.appendChild(checkIcon);

                                    // Re-initialize feather icons
                                    if (typeof feather !== 'undefined') {
                                        feather.replace();
                                    }

                                    // Show success toast
                                    roleUpdateToast.show();
                                } else {
                                    // Reset label and show error
                                    currentRoleLabel.textContent = document.querySelector('.role-item.active').dataset.role || 'N/A';
                                    alert('Error updating role: ' + (response.message || 'Unknown error'));
                                }
                            })
                            .catch(function(error) {
                                console.error('Error:', error);
                                currentRoleLabel.textContent = document.querySelector('.role-item.active').dataset.role || 'N/A';
                                alert('An error occurred while updating the role. Please try again.');
                            });
                    });
                });
            }

            function updateUserRole(userId, roleName) {
                return new Promise(function(resolve, reject) {
                    $.ajax({
                        url: '/admin/users/update-role',
                        type: 'POST',
                        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                        data: {
                            user_id: userId,
                            role: roleName,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            resolve(data);
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', xhr);
                            console.log('Status:', status);
                            console.log('Error:', error);
                            console.log('Response:', xhr.responseText);
                            reject(error);
                        }
                    });
                });
            }

            // Re-initialize feather icons to ensure all icons are properly rendered
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>
</body>

</html>
