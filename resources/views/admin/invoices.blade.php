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
            color: #8b422e;
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
                            @include('admin.sections.invoices.topbar')
                            @section('blog-header-action')
                            @endsection

                            @include('admin.sections.invoices.table')
                        </div>

                        @include('admin.sections.invoices.add_modal')
                        @foreach ($invoices as $invoice)
                            @include('admin.sections.invoices.update_modal')
                            @include('admin.sections.invoices.delete_modal')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.main.scripts')
    <!-- @push('scripts') -->
   <script>
document.getElementById('client_id').addEventListener('change', function() {
    let clientId = this.value;
    let dealSelect = document.getElementById('deal_id');

    dealSelect.innerHTML = '<option value="">-- Select Deal --</option>';

    if (clientId) {
        let url = "{{ route('clients.deals', ['id' => ':id']) }}".replace(':id', clientId);

        fetch(url)
            .then(response => {
                if (!response.ok) throw new Error(`HTTP error: ${response.status}`);
                return response.json();
            })
            .then(data => {
                console.log("Deals received:", data);

                if (data.length === 0) {
                    let option = document.createElement('option');
                    option.value = "";
                    option.textContent = "No deals found for this client";
                    dealSelect.appendChild(option);
                } else {
                    data.forEach(deal => {
                        let option = document.createElement('option');
                        option.value = deal.id;
                        option.textContent = deal.name;
                        dealSelect.appendChild(option);
                    });
                }
            })
            .catch(err => console.error("Fetch error:", err));
    }
});
</script>


</body>

</html>
