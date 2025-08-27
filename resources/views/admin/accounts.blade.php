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
            color: #8b422e;
        }

        #datable_4c_filter {
            float: right;
        }

        .avatar.avatar-info>.initial-wrap {
            background-color: #8b422e !important;
            color: #fff;
        }

        .feather-search {
            display: none;
        }

        /* Enhanced Table Styling */
        #datable_4c thead th {
            border-bottom: 2px solid#8b422e !important;
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
            border-color: #8b422e !important;
        }

        .role-item.active {
            background-color: #f0f0f0;
            font-weight: 500;
        }

        .role-item:hover {
            color: #8b422e;
        }

        /* Loading animation */
        .role-loading {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-left-color: #8b422e;
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

        .btn-primary {
            color: #fff;
            background-color: #8b422e;
            border-color: #8b422e;
        }
        .btn-primary:hover {
            color: #fff;
            background-color: rgba(0, 0, 0);
            border-color: rgba(0, 0, 0);
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
                            @include('admin.sections.accounts.topbar')
                            @section('blog-header-action')
                            @endsection

                            @include('admin.sections.accounts.table')
                        </div>

                        @include('admin.sections.accounts.add_modal')
                        @foreach ($accounts as $account)
                            @include('admin.sections.accounts.update_modal')
                            @include('admin.sections.accounts.delete_modal')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.main.scripts')
    <script>
        $('.toggle-status').on('change', function() {
            let is_active = $(this).is(':checked') ? 1 : 0;
            let id = $(this).data('id');

            $.ajax({
                url: "{{ route('account.toggleStatus') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    is_active: is_active
                },
                success: function(response) {
                    console.log(response.message);
                },
                error: function(xhr) {
                    console.error("Toggle failed:", xhr.responseText);
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();
        });
    </script>

</body>

</html>
