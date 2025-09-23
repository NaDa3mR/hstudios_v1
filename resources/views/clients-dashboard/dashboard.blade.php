<!doctype html>
@include('clients-dashboard.main.html')

<head>
    <meta charset="utf-8" />
    <title> Hossam X Studios | Digital Agency - Web Design & Development </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('clients-dashboard.main.meta')
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

        .avatar.avatar-violet>.initial-wrap {
            background-color: #8b422e;
            color: #fff;
        }

        .small-box {
            width: 286.2px;
            height: 155.51px;
            border-radius: 0.5rem;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            background-color: #8b422e !important;
        }

        .small-box .inner {
            flex: 1;
        }

        .row {
            margin-top: 30px;
            margin-left: 20px;
        }

        .small-box-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 50px;
            height: 50px;
            opacity: 0.3;
        }

        .text-muted {
            color: #000000 !important;
        }

        hr {
            border-color: #111212;
        }

        .app-content .row a,
        .app-content .row i {
            color: white !important;
        }

        .small-box-icon {
            fill: #fff;
            opacity: 1;
        }

        .gradient-custom {
            background: #8b422e;

        }

        .fc .fc-button-group button {
            background-color: #8b422e;
        }

        .fc .fc-button-group button:hover {
            background-color: #ffffff;
            color: #000000
        }

        .fc .fc-button-group button:active {
            background-color: #ffffff;
            color: #000000
        }

       .small-box {
    width: 100%;           /* responsive width */
    height: 155.51px;      /* keep your height */
    border-radius: 10px;   /* optional rounded corners */
    padding: 15px;
    position: relative;
    overflow: hidden;
}

.small-box .inner h3 {
    font-size: 2rem;
    margin: 0;
    font-weight: bold;
    color: #fff;
}

.small-box .inner p {
    margin: 0;
    font-size: 1.1rem;
}

.small-box .icon {
    position: absolute;
    right: 15px;
    bottom: 15px;
    font-size: 2.5rem;
    fill: #fff; 
    opacity: 1; ;
}

        .card-body .p-4 {
           height: 550px;
        }

        .hk-wrapper,
        .taskboardapp-wrap,
        .container {
            height: auto !important;
            overflow: visible !important;
        }
    </style>
</head>

<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active">
        @include('clients-dashboard.main.sidebar')
        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            <header class="hk-pg-header pg-header-wth-tab">
                                <div class="px-5">
                                    <div class="d-flex align-items-center">
                                        <button
                                            class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle me-2 d-xl-none"><span
                                                class="icon"><span class="feather-icon"><i
                                                        data-feather="align-left"></i></span></span></button>
                                        <div class="avatar avatar-icon avatar-sm  avatar-violet me-3">
                                            <span class="initial-wrap rounded-8"><span class="feather-icon"><i
                                                        data-feather="bar-chart-2"></i></span></span>
                                        </div>
                                        <div class="d-flex flex-wrap justify-content-between flex-1">
                                            <div>
                                                <div class="pg-subtitle">
                                                    Client Dashboard
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs nav-icon nav-icon nav-light mt-3">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#tab_1">
                                                <span class="nav-icon-wrap"><span class="svg-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-chart-bar"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <rect x="3" y="12" width="6" height="8"
                                                                rx="1"></rect>
                                                            <rect x="9" y="8" width="6" height="12"
                                                                rx="1"></rect>
                                                            <rect x="15" y="4" width="6" height="16"
                                                                rx="1"></rect>
                                                            <line x1="4" y1="20" x2="18"
                                                                y2="20">
                                                            </line>
                                                        </svg>
                                                    </span></span>
                                                <span class="nav-link-text">Overview</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </header>
                            <div class="app-content"> <!--begin::Container-->
                                <div class="container-fluid"> <!-- Small Box (Stat card) -->
                                    <div class="row g-3 d-flex justify-content-center align-items-start h-100">
                                        <div class="col col-lg-6 mb-4 mb-lg-0">
                                            <div class="card mb-3" style="border-radius: .5rem;">
                                                <div class="row g-0">
                                                    <div class="col-md-4 gradient-custom text-white d-flex flex-column justify-content-center align-items-center text-center"
                                                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                                        <h5 style="color: #fff">{{ $client->name }}</h5>
                                                        <p>{{ $client->company_field }}</p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body p-4">
                                                            <h6>Information</h6>
                                                            <hr class="mt-0 mb-4">
                                                            <div class="row pt-1">
                                                                <div class="col-6 mb-3">
                                                                    <h6>Email</h6>
                                                                    <p class="text-muted">{{ $client->email }}</p>
                                                                </div>
                                                                <div class="col-6 mb-3">
                                                                    <h6>Company</h6>
                                                                    <p class="text-muted">{{ $client->company_name }}
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <h6>Business Field</h6>
                                                            <hr class="mt-0 mb-4">
                                                            <div class="row pt-1">
                                                                <div class="col-12 mb-3">
                                                                    <p class="text-muted">{{ $client->company_field }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            {{-- put a card --}}
                                           <div class="row g-3">
    <div class="col-lg-6 col-6">
        <div class="small-box bg-success text-white">
            <div class="inner">
                <h3>{{ number_format($totalUnpaid, 2) }} EGP</h3>
                <p>Total Unpaid Invoices</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-6">
        <div class="small-box bg-warning text-white">
            <div class="inner">
                <h3>{{ $countPending }} invoices</h3>
                <p>Pending Invoices</p>
            </div>
            <div class="icon">
                <i class="fas fa-briefcase"></i>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mt-3">
    <div class="col-lg-6 col-6">
        <div class="small-box bg-info text-white">
            <div class="inner">
                <h3>{{ number_format($totalPending, 2) }} EGP</h3>
                <p>Total Pending Invoices</p>
            </div>
            <div class="icon">
                <i class="fas fa-tasks"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-6">
        <div class="small-box bg-danger text-white">
            <div class="inner">
                <h3>{{ $countUnpaid }} invoices</h3>
                <p>Unpaid Invoices</p>
            </div>
            <div class="icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
        </div>
    </div>
</div>

                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <div class="card mb-3" style="border-radius: .5rem;">
                                                <div class="card-body p-4">
                                                    <h5 class="fw-bold">Calendar</h5>
                                                    <div id="client-calendar"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col lg-6 mb-4">
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <h3 class="card-title text-black">Deals</h3>
                                                </div> <!-- /.card-header -->
                                                <div class="card-body p-0">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Deal</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($deals as $deal)
                                                                <tr class="align-middle">
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $deal->name }}</td>
                                                                    @php
                                                                        $statusColors = [
                                                                            'pending' => 'text-bg-warning',
                                                                            'in_progress' => 'text-bg-info',
                                                                            'completed' => 'text-bg-success',
                                                                            'won' => 'text-bg-primary',
                                                                            'lost' => 'text-bg-danger',
                                                                        ];
                                                                    @endphp

                                                                    <td>
                                                                        <span
                                                                            class="badge {{ $statusColors[$deal->status] ?? 'text-bg-secondary' }}">
                                                                            {{ ucwords(str_replace('_', ' ', $deal->status)) }}
                                                                        </span>
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div> <!-- /.card-body -->
                                            </div>
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <h3 class="card-title text-black">Service Requests</h3>
                                                </div> <!-- /.card-header -->
                                                <div class="card-body p-0">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Requests</th>
                                                                <th>Services</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($requests as $request)
                                                                <tr class="align-middle">
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $request->name }}</td>
                                                                    <td>
                                                                        @foreach ($request->services as $service)
                                                                            {{ $service->name }}<br>
                                                                        @endforeach
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div> <!-- /.card-body -->
                                            </div>
                                            <!--begin::invoice card-->
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <h3 class="card-title text-black">Invoices</h3>
                                                </div> <!-- /.card-header -->
                                                <div class="card-body p-0">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Invoice Number</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($invoices as $invoice)
                                                                <tr class="align-middle">
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $invoice->invoice_number }}</td>
                                                                    <td>{{ number_format($invoice->amount, 2) }} EGP
                                                                    </td>
                                                                    <td>
                                                                        @php
                                                                            $statusColors = [
                                                                                'unpaid' => 'text-bg-danger',
                                                                                'paid' => 'text-bg-success',
                                                                                'pending' => 'text-bg-warning',
                                                                            ];
                                                                        @endphp
                                                                        <span
                                                                            class="badge {{ $statusColors[$invoice->status] ?? 'text-bg-secondary' }}">
                                                                            {{ ucfirst($invoice->status) }}
                                                                        </span>
                                                                    </td>
                                                                    <td>{{ $invoice->created_at->format('d M Y') }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div> <!-- /.card-body -->
                                            </div>

                                        </div>

                                    </div>


                                </div> <!--end::Container-->
                            </div>
                        </div>
                    </div>
                    @include('clients-dashboard.main.scripts')
                    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.45.2"></script>
                    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.45.2"></script>
                    <!-- FullCalendar JS -->
                    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
                    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let meetings = @json($meetings);
        let calendarEl = document.getElementById('client-calendar');

        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            editable: false,
            events: meetings.map(m => ({
                id: m.id,
                title: m.subject,
                start: m.meet_date,
                allDay: true
            })),
            eventClick: function(info) {
                let meeting = meetings.find(m => m.id == info.event.id);
                if (!meeting) return;

                document.getElementById('modalSubject').innerText = meeting.subject;
                document.getElementById('modalDeal').innerText = meeting.deal?.name || 'N/A';
                document.getElementById('modalType').innerText = meeting.type;
                document.getElementById('modalAddress').innerText = meeting.address;
                document.getElementById('modalDate').innerText = meeting.meet_date;
                document.getElementById('modalDetails').innerText = meeting.details || '';

                let modal = new bootstrap.Modal(document.getElementById('meetingModal'));
                modal.show();
            }
        });

        calendar.render();
    });
</script>





</body>

</html>
