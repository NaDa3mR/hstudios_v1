<!doctype html>
@include('clients-dashboard.main.html')

<head>
    <meta charset="utf-8" />
    <title>Client Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('clients-dashboard.main.meta')

    <style>
        html,
        body {
            height: auto !important;
            min-height: 100%;
            overflow-y: auto !important;
        }

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
        {{-- Sidebar --}}
        @include('clients-dashboard.main.sidebar')

        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">

                            {{-- Topbar --}}
                            @include('clients-dashboard.deals.topbar')

                            {{-- Deals Section --}}
                            <section class="text-center">
                                {{-- <div class="p-5 bg-image"
                                    style="background-image: url('{{ asset('website-assets/img/innerpages/team-page-banner-img.jpg') }}');
                                           height: 300px;">
                                </div> --}}

                                <div class="card mx-4 mx-md-5 shadow-5-strong bg-body-tertiary"
                                    style="margin-top: 30px; backdrop-filter: blur(30px); background-color: #f0f0f0;">
                                    <div class="card-body py-5 px-md-5">

                                        <h2 class="fw-bold mb-4">My Deals</h2>

                                        @forelse($deals as $deal)
                                            <div class="card mb-4 p-3 text-start">
                                                <h4 class="fw-bold">{{ $deal->name ?? 'Unnamed Deal' }}</h4>
                                                <p><strong>Status:</strong> {{ $deal->status }}</p>
                                                <p><strong>Price:</strong> {{ $deal->price }}</p>

                                                <p><strong>Services:</strong></p>
                                                <ul>
                                                    @forelse($deal->services as $service)
                                                        <li>{{ $service->name }}</li>
                                                    @empty
                                                        <li>No services linked.</li>
                                                    @endforelse
                                                </ul>

                                                {{-- <a href="{{ route('client.deal.show', $deal->id) }}"
                                                   class="btn btn-sm btn-primary mt-2">
                                                    View Details
                                                </a> --}}
                                            </div>
                                        @empty
                                            <p>No deals found.</p>
                                        @endforelse

                                    </div>
                                </div>
                            </section>
                            {{-- /Deals Section --}}

                        </div>

                        {{-- Add / Update / Delete Modals --}}
                        {{-- @include('clients-dashboard.sections.deals.add_modal')
                        @foreach ($deals as $deal)
                            @include('clients-dashboard.sections.deals.update_modal')
                            @include('clients-dashboard.sections.deals.delete_modal')
                        @endforeach --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    @include('clients-dashboard.main.scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();
        });
    </script>
</body>
</html>
