<!doctype html>
@include('admin.main.html')

<head>
    <meta charset="utf-8" />
    <title> Hossam X Studios | Digital Agency - Web Design & Development </title>
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

        avatar.avatar-violet>.initial-wrap {
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

        .app-content .row a,
        .app-content .row h3,
        .app-content .row p,
        .app-content .row i {
            color: white !important;
        }

        .small-box-icon {
            fill: #fff;
            opacity: 1;
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
        @include('admin.main.sidebar')
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
                                                    Analytics
                                                </div>
                                            </div>
                                            {{-- <div class="pg-header-action-wrap position-relative">
                                                            <form action="/" method="GET" id="dateFilterForm">
                                                                <div class="input-group w-300p d-md-flex d-none">
                                                                    <span class="input-affix-wrapper">
                                                                        <span class="input-prefix"><span class="feather-icon"><i data-feather="calendar"></i></span></span>
                                                                        <input class="form-control form-wth-icon" name="datetimes" >
                                                                        <input type="hidden" name="start_date" id="start_date">
                                                                        <input type="hidden" name="end_date" id="end_date">
                                                                    </span>
                                                                </div>
                                                            </form>
                                                        </div> --}}
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
                                        {{-- <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#">
                                                            <span class="nav-icon-wrap"><span class="svg-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-chart-bubble"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                        </path>
                                                                        <circle cx="6" cy="16" r="3"></circle>
                                                                        <circle cx="16" cy="19" r="2"></circle>
                                                                        <circle cx="14.5" cy="7.5" r="4.5"></circle>
                                                                    </svg>
                                                                </span></span>
                                                            <span class="nav-link-text">Analytics</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#">
                                                            <span class="nav-icon-wrap"><span class="svg-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-affiliate"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                        </path>
                                                                        <path d="M5.931 6.936l1.275 4.249m5.607 5.609l4.251 1.275">
                                                                        </path>
                                                                        <path d="M11.683 12.317l5.759 -5.759"></path>
                                                                        <circle cx="5.5" cy="5.5" r="1.5"></circle>
                                                                        <circle cx="18.5" cy="5.5" r="1.5"></circle>
                                                                        <circle cx="18.5" cy="18.5" r="1.5"></circle>
                                                                        <circle cx="8.5" cy="15.5" r="4.5"></circle>
                                                                    </svg>
                                                                </span></span>
                                                            <span class="nav-link-text">Operations</span>
                                                        </a>
                                                    </li> --}}
                                    </ul>
                                </div>
                            </header>
                            <div class="app-content"> <!--begin::Container-->
                                <div class="container-fluid"> <!-- Small Box (Stat card) -->
                                    <div class="row">
                                        <div class="col-lg-3 col-6"> <!-- small box -->
                                            <div class="small-box text-bg-primary">
                                                <div class="inner">
                                                    <h3 class="color-white">{{ $clients->count() }}</h3>
                                                    <p class="color-white">Number Of Clients</p>
                                                </div>
                                                <svg class="small-box-icon" fill="#fff" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path
                                                        d="M16 11c1.657 0 3-1.567 3-3.5S17.657 4 16 4s-3 1.567-3 3.5 1.343 3.5 3 3.5zM8 11c1.657 0 3-1.567 3-3.5S9.657 4 8 4 5 5.567 5 7.5 6.343 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V19a1 1 0 001 1h12a1 1 0 001-1v-2.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.06 1.16.84 1.97 2.06 1.97 3.44V19c0 .34-.04.67-.1.99H22a1 1 0 001-1v-2.5C23 14.17 18.33 13 16 13z" />
                                                </svg>
                                                <a href="{{ route('client.index') }}"
                                                    class=" small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover color-white">
                                                    More info <i class="bi bi-link-45deg"></i> </a>
                                            </div>
                                        </div> <!-- ./col -->
                                        <div class="col-lg-3 col-6"> <!-- small box -->
                                            <div class="small-box text-bg-success">
                                                <div class="inner">
                                                    <h3>{{ $requests->count() }}</h3>
                                                    <p>Service Requests</p>
                                                </div> <svg class="small-box-icon" fill="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                    aria-hidden="true">
                                                    <path
                                                        d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                                                    </path>
                                                </svg> <a href="{{ route('service-request.index') }}"
                                                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                                    More info <i class="bi bi-link-45deg"></i> </a>
                                            </div>
                                        </div> <!-- ./col -->
                                        <div class="col-lg-3 col-6"> <!-- small box -->
                                            <div class="small-box text-bg-warning">
                                                <div class="inner">
                                                    <h3>{{ $deals->count() }}</h3>
                                                    <p>Deals</p>
                                                </div> <svg class="small-box-icon" fill="#fff" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path
                                                        d="M6 2a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6H6zm7 1.5L18.5 9H13V3.5zM10 17.5l-3.5-3.5 1.41-1.41L10 14.67l6.09-6.09L17.5 10 10 17.5z" />
                                                </svg>

                                                <a href="{{ route('deal.index') }}"
                                                    class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                                                    More info <i class="bi bi-link-45deg"></i> </a>
                                            </div>
                                        </div> <!-- ./col -->
                                        <div class="col-lg-3 col-6"> <!-- small box -->
                                            <div class="small-box text-bg-danger">
                                                <div class="inner">
                                                    <h3>{{ $contacts->count() }}</h3>
                                                    <p>Contacts</p>
                                                </div> <svg class="small-box-icon" fill="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                    aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z">
                                                    </path>
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z">
                                                    </path>
                                                </svg> <a href="{{ route('contact.index') }}"
                                                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                                    More info <i class="bi bi-link-45deg"></i> </a>
                                            </div>
                                        </div> <!-- ./col -->
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <div class="card card-flush rounded-8 mb-0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <!-- Stats Section -->
                                                        <div class="col-md-6 mb-4 mb-md-0">
                                                            <div class="row gx-0">

                                                                <div class="col-sm-6 p-3 border">
                                                                    <h6>Total Deals</h6>
                                                                    <span class="fs-3 fw-medium">{{ $totalDeals }}</span>
                                                                    <span>Deals</span>
                                                                </div>

                                                                <div class="col-sm-6 p-3 border">
                                                                    <h6>Pending Deals</h6>
                                                                    <span class="fs-3 fw-medium">{{ $pendingDeals }}</span>
                                                                    <span>Deals</span>
                                                                </div>

                                                                <div class="col-sm-6 p-3 border">
                                                                    <h6>In Progress Deals</h6>
                                                                    <span class="fs-3 fw-medium">{{ $inProgressDeals }}</span>
                                                                    <span>Deals</span>
                                                                </div>

                                                                <div class="col-sm-6 p-3 border">
                                                                    <h6>Completed Deals</h6>
                                                                    <span class="fs-3 fw-medium">{{ $completedDeals }}</span>
                                                                    <span>Deals</span>
                                                                </div>

                                                                <div class="col-sm-6 p-3 border">
                                                                    <h6>Won Deals</h6>
                                                                    <span class="fs-3 fw-medium">{{ $wonDeals }}</span>
                                                                    <span>Deals</span>
                                                                </div>

                                                                <div class="col-sm-6 p-3 border">
                                                                    <h6>Lost Deals</h6>
                                                                    <span class="fs-3 fw-medium">{{ $lostDeals }}</span>
                                                                    <span>Deals</span>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <!-- Chart Section -->
                                                        <div class="col-md-6">
                                                            <h6 class="mb-3">Overview</h6>
                                                            <div id="pie_chart_1" style="width:100%; min-height: 350px;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-bottom: 50px;">
                                        <div class="col-lg-3 col-6"> <!-- small box -->
                                            <div class="small-box text-bg-success">
                                                <div class="inner">
                                                    <h3 style="font-size:large">{{ $totalIncome }} EGP</h3>
                                                    <p>Total Incomes</p>
                                                </div> <svg class="small-box-icon" fill="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                    aria-hidden="true">
                                                    <path
                                                        d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                                                    </path>
                                                </svg> <a href="{{ route('income.index') }}"
                                                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                                    More info <i class="bi bi-link-45deg"></i> </a>
                                            </div>
                                        </div> <!-- ./col -->
                                        <div class="col-lg-3 col-6"> <!-- small box -->
                                            <div class="small-box text-bg-warning">
                                                <div class="inner">
                                                    <h3 style="font-size:large">{{ $totalExpense }} EGP</h3>
                                                    <p>Total Expenses</p>
                                                </div> <svg class="small-box-icon" fill="#fff" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path
                                                        d="M6 2a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6H6zm7 1.5L18.5 9H13V3.5zM10 17.5l-3.5-3.5 1.41-1.41L10 14.67l6.09-6.09L17.5 10 10 17.5z" />
                                                </svg>

                                                <a href="{{ route('expense.index') }}"
                                                    class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                                                    More info <i class="bi bi-link-45deg"></i> </a>
                                            </div>
                                        </div> <!-- ./col -->
                                        <div class="col-lg-3 col-6"> <!-- small box -->
                                            <div class="small-box text-bg-danger">
                                                <div class="inner">
                                                    <h3 style="font-size:large">{{ $totaldealprice }} EGP</h3>
                                                    <p>Total of Deals</p>
                                                </div> <svg class="small-box-icon" fill="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                    aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z">
                                                    </path>
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z">
                                                    </path>
                                                </svg> <a href="{{ route('deal.index') }}"
                                                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                                    More info <i class="bi bi-link-45deg"></i> </a>
                                            </div>
                                        </div> <!-- ./col -->
                                        <div class="col-lg-3 col-6"> <!-- small box -->
                                            <div class="small-box text-bg-primary">
                                                <div class="inner">
                                                    <h3 class="color-white">{{ $InsourcesCount }}</h3>
                                                    <p class="color-white">Income Source</p>
                                                </div>
                                                <svg class="small-box-icon" fill="#fff" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path
                                                        d="M16 11c1.657 0 3-1.567 3-3.5S17.657 4 16 4s-3 1.567-3 3.5 1.343 3.5 3 3.5zM8 11c1.657 0 3-1.567 3-3.5S9.657 4 8 4 5 5.567 5 7.5 6.343 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V19a1 1 0 001 1h12a1 1 0 001-1v-2.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.06 1.16.84 1.97 2.06 1.97 3.44V19c0 .34-.04.67-.1.99H22a1 1 0 001-1v-2.5C23 14.17 18.33 13 16 13z" />
                                                </svg>
                                                <a href="{{ route('in-source.index') }}"
                                                    class=" small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover color-white">
                                                    More info <i class="bi bi-link-45deg"></i> </a>
                                            </div>
                                        </div> <!-- ./col -->
                                    </div>
                                    <!-- /.row -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            {{-- <div class="card mb-4">
                                                <div class="card-header border-0">
                                                    <div class="d-flex justify-content-between">
                                                        <h3 class="card-title">Online Store Visitors</h3> <a
                                                            href="javascript:void(0);"
                                                            class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">View
                                                            Report</a>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <p class="d-flex flex-column"> <span
                                                                class="fw-bold fs-5">820</span> <span>Visitors Over
                                                                Time</span>
                                                        </p>
                                                        <p class="ms-auto d-flex flex-column text-end"> <span
                                                                class="text-success"> <i class="bi bi-arrow-up"></i>
                                                                12.5%
                                                            </span> <span class="text-secondary">Since last week</span>
                                                        </p>
                                                    </div> <!-- /.d-flex -->
                                                    <div class="position-relative mb-4">
                                                        <div id="visitors-chart"></div>
                                                    </div>
                                                    <div class="d-flex flex-row justify-content-end"> <span
                                                            class="me-2"> <i
                                                                class="bi bi-square-fill text-primary"></i> This Week
                                                        </span> <span> <i class="bi bi-square-fill text-secondary"></i>
                                                            Last Week
                                                        </span> </div>
                                                </div>
                                            </div> <!-- /.card --> --}}
                                            <div class="card mb-4">
                                                {{-- <div class="card-header border-0">
                                                    <h3 class="card-title">Deals</h3>
                                                    <div class="card-tools"> <a href="{{route('deal.index')}}"
                                                            class="btn btn-tool btn-sm"> <i
                                                                class="bi bi-download"></i> </a>
                                                        <a href="{{route('deal.index')}}" class="btn btn-tool btn-sm"> <i
                                                                class="bi bi-list"></i> </a>
                                                    </div>
                                                </div> --}}
                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-striped align-middle">
                                                        <thead>
                                                            <tr>
                                                                <th>Deal</th>
                                                                <th>Client</th>
                                                                <th>Service</th>
                                                                <th>Price</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($deals as $deal)
                                                                <tr>
                                                                    <td>
                                                                        {{ $deal->name ?? 'Deleted' }}
                                                                    </td>
                                                                    <td>{{ $deal->client->name ?? 'N/A' }}</td>
                                                                    <td>
                                                                        @foreach ($deal->services as $service)
                                                                            {{ $service->name }}<br>
                                                                        @endforeach
                                                                    </td>
                                                                    <td>{{ $deal->price }}</td>
                                                                    <td>{{ $deal->status }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> <!-- /.card -->
                                        </div> <!-- /.col-md-6 -->
                                        <div class="col-lg-6">
                                            <div class="card mb-4">
                                                {{-- <div class="card-header border-0">
                                                <h3 class="card-title">Deals</h3>
                                                <div class="card-tools"> <a href="{{route('deal.index')}}"
                                                        class="btn btn-tool btn-sm"> <i
                                                            class="bi bi-download"></i> </a>
                                                    <a href="{{route('deal.index')}}" class="btn btn-tool btn-sm"> <i
                                                            class="bi bi-list"></i> </a>
                                                </div>
                                            </div> --}}
                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-striped align-middle">
                                                        <thead>
                                                            <tr>
                                                                <th>Service Request</th>
                                                                <th>Client</th>
                                                                <th>Services</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($requests as $request)
                                                                <tr>
                                                                    <td>
                                                                        {{ $request->name ?? 'Deleted' }}
                                                                    </td>
                                                                    <td>{{ $request->client->name ?? 'N/A' }}</td>
                                                                    <td>
                                                                        @foreach ($request->services as $service)
                                                                            {{ $service->name }}<br>
                                                                        @endforeach
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-6">
                                            <div class="card mb-4">
                                                <div class="card-header border-0">
                                                    <div class="d-flex justify-content-between">
                                                        <h3 class="card-title">Sales</h3> <a
                                                            href="javascript:void(0);"
                                                            class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">View
                                                            Report</a>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <p class="d-flex flex-column"> <span
                                                                class="fw-bold fs-5">$18,230.00</span> <span>Sales Over
                                                                Time</span> </p>
                                                        <p class="ms-auto d-flex flex-column text-end"> <span
                                                                class="text-success"> <i class="bi bi-arrow-up"></i>
                                                                33.1%
                                                            </span> <span class="text-secondary">Since Past Year</span>
                                                        </p>
                                                    </div> <!-- /.d-flex -->
                                                    <div class="position-relative mb-4">
                                                        <div id="sales-chart"></div>
                                                    </div>
                                                    <div class="d-flex flex-row justify-content-end"> <span
                                                            class="me-2"> <i
                                                                class="bi bi-square-fill text-primary"></i> This year
                                                        </span> <span> <i class="bi bi-square-fill text-secondary"></i>
                                                            Last year
                                                        </span> </div>
                                                </div>
                                            </div> <!-- /.card -->
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <h3 class="card-title">Online Store Overview</h3>
                                                    <div class="card-tools"> <a href="#"
                                                            class="btn btn-sm btn-tool"> <i
                                                                class="bi bi-download"></i> </a>
                                                        <a href="#" class="btn btn-sm btn-tool"> <i
                                                                class="bi bi-list"></i> </a>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                                        <p class="text-success fs-2"> <svg height="32"
                                                                fill="none" stroke="currentColor"
                                                                stroke-width="1.5" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3">
                                                                </path>
                                                            </svg> </p>
                                                        <p class="d-flex flex-column text-end"> <span class="fw-bold">
                                                                <i class="bi bi-graph-up-arrow text-success"></i> 12%
                                                            </span> <span class="text-secondary">CONVERSION RATE</span>
                                                        </p>
                                                    </div> <!-- /.d-flex -->
                                                    <div
                                                        class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                                        <p class="text-info fs-2"> <svg height="32" fill="none"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                                aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
                                                                </path>
                                                            </svg> </p>
                                                        <p class="d-flex flex-column text-end"> <span class="fw-bold">
                                                                <i class="bi bi-graph-up-arrow text-info"></i> 0.8%
                                                            </span> <span class="text-secondary">SALES RATE</span> </p>
                                                    </div> <!-- /.d-flex -->
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mb-0">
                                                        <p class="text-danger fs-2"> <svg height="32"
                                                                fill="none" stroke="currentColor"
                                                                stroke-width="1.5" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z">
                                                                </path>
                                                            </svg> </p>
                                                        <p class="d-flex flex-column text-end"> <span class="fw-bold">
                                                                <i class="bi bi-graph-down-arrow text-danger"></i>
                                                                1%
                                                            </span> <span class="text-secondary">REGISTRATION
                                                                RATE</span> </p>
                                                    </div> <!-- /.d-flex -->
                                                </div>
                                            </div>
                                        </div> <!-- /.col-md-6 --> --}}
                                    </div>


                                    {{-- <div class="row">
                                        <div class="col-lg-6">
                                            <!-- /.card -->
                                            <div class="card mb-4">
                                                <div class="card-header border-0">
                                                    <h3 class="card-title">Products</h3>
                                                    <div class="card-tools"> <a href="#"
                                                            class="btn btn-tool btn-sm">
                                                            <i class="bi bi-download"></i> </a>
                                                        <a href="#" class="btn btn-tool btn-sm"> <i
                                                                class="bi bi-list"></i> </a>
                                                    </div>
                                                </div>
                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-striped align-middle">
                                                        <thead>
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Price</th>
                                                                <th>Sales</th>
                                                                <th>More</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td> <img src="/assets/img/default-150x150.png"
                                                                        alt="Product 1"
                                                                        class="rounded-circle img-size-32 me-2">
                                                                    Some Product
                                                                </td>
                                                                <td>$13 USD</td>
                                                                <td> <small class="text-success me-1"> <i
                                                                            class="bi bi-arrow-up"></i>
                                                                        12%
                                                                    </small>
                                                                    12,000 Sold
                                                                </td>
                                                                <td> <a href="#" class="text-secondary"> <i
                                                                            class="bi bi-search"></i> </a> </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <img src="/assets/img/default-150x150.png"
                                                                        alt="Product 1"
                                                                        class="rounded-circle img-size-32 me-2">
                                                                    Another Product
                                                                </td>
                                                                <td>$29 USD</td>
                                                                <td> <small class="text-info me-1"> <i
                                                                            class="bi bi-arrow-down"></i>
                                                                        0.5%
                                                                    </small>
                                                                    123,234 Sold
                                                                </td>
                                                                <td> <a href="#" class="text-secondary"> <i
                                                                            class="bi bi-search"></i> </a> </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <img src="/assets/img/default-150x150.png"
                                                                        alt="Product 1"
                                                                        class="rounded-circle img-size-32 me-2">
                                                                    Amazing Product
                                                                </td>
                                                                <td>$1,230 USD</td>
                                                                <td> <small class="text-danger me-1"> <i
                                                                            class="bi bi-arrow-down"></i>
                                                                        3%
                                                                    </small>
                                                                    198 Sold
                                                                </td>
                                                                <td> <a href="#" class="text-secondary"> <i
                                                                            class="bi bi-search"></i> </a> </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <img src="/assets/img/default-150x150.png"
                                                                        alt="Product 1"
                                                                        class="rounded-circle img-size-32 me-2">
                                                                    Perfect Item
                                                                    <span class="badge text-bg-danger">NEW</span>
                                                                </td>
                                                                <td>$199 USD</td>
                                                                <td> <small class="text-success me-1"> <i
                                                                            class="bi bi-arrow-up"></i>
                                                                        63%
                                                                    </small>
                                                                    87 Sold
                                                                </td>
                                                                <td> <a href="#" class="text-secondary"> <i
                                                                            class="bi bi-search"></i> </a> </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> <!-- /.card -->
                                            <div class="card mb-4">
                                                <div class="card-header border-0">
                                                    <div class="d-flex justify-content-between">
                                                        <h3 class="card-title">Online Store Visitors</h3> <a
                                                            href="javascript:void(0);"
                                                            class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">View
                                                            Report</a>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <p class="d-flex flex-column"> <span
                                                                class="fw-bold fs-5">820</span>
                                                            <span>Visitors Over Time</span>
                                                        </p>
                                                        <p class="ms-auto d-flex flex-column text-end"> <span
                                                                class="text-success"> <i class="bi bi-arrow-up"></i>
                                                                12.5%
                                                            </span> <span class="text-secondary">Since last week</span>
                                                        </p>
                                                    </div> <!-- /.d-flex -->
                                                    <div class="position-relative mb-4">
                                                        <div id="visitors-chart"></div>
                                                    </div>
                                                    <div class="d-flex flex-row justify-content-end"> <span
                                                            class="me-2"> <i
                                                                class="bi bi-square-fill text-primary"></i> This Week
                                                        </span> <span> <i class="bi bi-square-fill text-secondary"></i>
                                                            Last
                                                            Week
                                                        </span> </div>
                                                </div>
                                            </div>
                                        </div> <!-- /.col-md-6 -->
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                                        <p class="text-success fs-2"> <svg height="32"
                                                                fill="none" stroke="currentColor"
                                                                stroke-width="1.5" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3">
                                                                </path>
                                                            </svg> </p>
                                                        <p class="d-flex flex-column text-end"> <span class="fw-bold">
                                                                <i class="bi bi-graph-up-arrow text-success"></i> 12%
                                                            </span> <span class="text-secondary">CONVERSION RATE</span>
                                                        </p>
                                                    </div> <!-- /.d-flex -->
                                                    <div
                                                        class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                                        <p class="text-info fs-2"> <svg height="32" fill="none"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                                aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
                                                                </path>
                                                            </svg> </p>
                                                        <p class="d-flex flex-column text-end"> <span class="fw-bold">
                                                                <i class="bi bi-graph-up-arrow text-info"></i> 0.8%
                                                            </span> <span class="text-secondary">SALES RATE</span> </p>
                                                    </div> <!-- /.d-flex -->
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mb-0">
                                                        <p class="text-danger fs-2"> <svg height="32"
                                                                fill="none" stroke="currentColor"
                                                                stroke-width="1.5" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z">
                                                                </path>
                                                            </svg> </p>
                                                        <p class="d-flex flex-column text-end"> <span class="fw-bold">
                                                                <i class="bi bi-graph-down-arrow text-danger"></i>
                                                                1%
                                                            </span> <span class="text-secondary">REGISTRATION
                                                                RATE</span> </p>
                                                    </div> <!-- /.d-flex -->
                                                </div>
                                            </div>
                                            <div class="card-header border-0">
                                                <div class="card mb-4">
                                                    <div class="card-header border-0">
                                                        <div class="d-flex justify-content-between">
                                                            <h3 class="card-title">Sales</h3> <a
                                                                href="javascript:void(0);"
                                                                class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">View
                                                                Report</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <p class="d-flex flex-column"> <span
                                                                    class="fw-bold fs-5">$18,230.00</span> <span>Sales
                                                                    Over
                                                                    Time</span> </p>
                                                            <p class="ms-auto d-flex flex-column text-end"> <span
                                                                    class="text-success"> <i
                                                                        class="bi bi-arrow-up"></i> 33.1%
                                                                </span> <span class="text-secondary">Since Past
                                                                    Year</span> </p>
                                                        </div> <!-- /.d-flex -->
                                                        <div class="position-relative mb-4">
                                                            <div id="sales-chart"></div>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-end"> <span
                                                                class="me-2"> <i
                                                                    class="bi bi-square-fill text-primary"></i> This
                                                                year
                                                            </span> <span> <i
                                                                    class="bi bi-square-fill text-secondary"></i> Last
                                                                year
                                                            </span> </div>
                                                    </div>
                                                </div> <!-- /.card -->
                                                <h3 class="card-title">Online Store Overview</h3>
                                                <div class="card-tools"> <a href="#"
                                                        class="btn btn-sm btn-tool">
                                                        <i class="bi bi-download"></i> </a>
                                                    <a href="#" class="btn btn-sm btn-tool"> <i
                                                            class="bi bi-list"></i> </a>
                                                </div>
                                            </div>
                                        </div> <!-- /.col-md-6 -->


                                    </div> --}}
                                </div> <!--end::Container-->
                            </div>
                        </div>
                    </div>
                    @include('admin.main.scripts')
                    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.45.2"></script>
                    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.45.2"></script>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var options = {
                                series: [
                                    {{ (int) $pendingDeals }},
                                    {{ (int) $inProgressDeals }},
                                    {{ (int) $completedDeals }},
                                    {{ (int) $wonDeals }},
                                    {{ (int) $lostDeals }}
                                ],
                                chart: {
                                    type: 'pie',
                                    height: 350
                                },
                                labels: ['Pending', 'In Progress', 'Completed', 'Won', 'Lost'],
                                colors: [
                                    '#8b422e', // أصلي
                                    '#a94f39', // أفتح درجة
                                    '#c65c45', // أفتح أكتر
                                    '#6f3424', // أغمق درجة
                                    '#53271a' // أغمق قوي
                                ],
                                legend: {
                                    position: 'bottom'
                                }
                            };

                            var chartElement = document.querySelector("#pie_chart_1");
                            if (chartElement) {
                                var chart = new ApexCharts(chartElement, options);
                                chart.render();
                            }
                        });
                    </script>

</body>

</html>
