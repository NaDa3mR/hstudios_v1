<!doctype html>
@include('admin.main.html')

<head>
    <meta charset="utf-8" />
    <title> dashboard template </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.main.meta')
    <style>
        .btn-link {
            color: #33475b;
        }

        .btn-link:hover {
            color: rgba(74, 96, 156, 1);
        }

        #datable_4c_filter {
            float: right;
        }

        .avatar.avatar-info>.initial-wrap {
            background-color: rgba(74, 96, 156, 1) !important;
            color: #fff;
        }

        .feather-search {
            display: none;
        }

        /* Enhanced Table Styling */
        #datable_4c thead th {
            border-bottom: 2px solid rgba(74, 96, 156, 1) !important;
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
            border-color: rgba(74, 96, 156, 1) !important;
        }

        .role-item.active {
            background-color: #f0f0f0;
            font-weight: 500;
        }

        .role-item:hover {
            color: rgba(74, 96, 156, 1);
        }

        /* Loading animation */
        .role-loading {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-left-color: rgba(74, 96, 156, 1);
            border-radius: 50%;
            animation: role-spin 1s linear infinite;
            margin-left: 5px;
            vertical-align: middle;
        }

        @keyframes role-spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active">
        @include('admin.main.sidebar')
        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            @include('admin.sections.careers.topbar')
                            @section('blog-header-action')
                            @endsection

                            @include('admin.sections.careers.table')
                        </div>

                        @include('admin.sections.careers.add_modal')
                        @foreach ($careers as $career)
                            @include('admin.sections.careers.update_modal')
                            @include('admin.sections.careers.delete_modal')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.main.scripts')
    <script>
        $(document).ready(function() {
            // Toggle for is_active
            $('.toggle-active').change(function() {
                let isActive = $(this).prop('checked') ? 1 : 0;
                let id = $(this).data('id');

                $.ajax({
                    url: '/careers/' + id + '/toggle-active',
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        is_active: isActive
                    },
                    success: function(response) {
                        console.log('is_active updated');
                    },
                    error: function() {
                        alert('Error updating active status.');
                    }
                });
            });

            // Toggle for is_published
            $('.toggle-published').change(function() {
                let isPublished = $(this).prop('checked') ? 1 : 0;
                let id = $(this).data('id');

                $.ajax({
                    url: '/careers/' + id + '/toggle-published',
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        is_published: isPublished
                    },
                    success: function(response) {
                        console.log('is_published updated');
                    },
                    error: function() {
                        alert('Error updating publish status.');
                    }
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();
        });
    </script>

</body>

</html>
