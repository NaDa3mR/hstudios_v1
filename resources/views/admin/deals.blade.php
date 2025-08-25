<!doctype html>
@include('admin.main.html')

<head>
    <meta charset="utf-8" />
    <title> dashboard template </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.main.meta')
    <style>
        html,
        body {
            height: auto !important;
            min-height: 100%;
            overflow-y: auto !important;
        }

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
            border-bottom: 2px solid #8b422e !important;
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

        .hk-pg-wrapper {
            height: 100%;
            overflow: hidden;
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
                            @include('admin.sections.deals.topbar')
                            @section('blog-header-action')
                            @endsection

                            @include('admin.sections.deals.table')
                        </div>

                        @include('admin.sections.deals.add_modal')
                        @foreach ($deals as $deal)
                            @include('admin.sections.deals.update_modal')
                            @include('admin.sections.deals.delete_modal')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.main.scripts')

    <script>
        document.getElementById('service_request_id').addEventListener('change', function() {
            const requestId = this.value;
            if (!requestId) return;

            fetch(`/get-service-request-data/${requestId}`)
                .then(res => res.json())
                .then(data => {
                    // Show client name
                    document.getElementById('client_name').value = data.client.name;

                    // Populate services
                    const servicesSelect = document.getElementById('services');
                    servicesSelect.innerHTML = '';

                    data.services.forEach(service => {
                        const option = document.createElement('option');
                        option.value = service.id;
                        option.text = service.name;
                        servicesSelect.appendChild(option);
                    });
                });
        });

        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();
        });
    </script>

</body>

</html>
