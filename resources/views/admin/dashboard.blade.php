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

        .row{
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
                                                            class="icon icon-tabler icon-tabler-chart-bar" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <rect x="3" y="12" width="6" height="8" rx="1"></rect>
                                                            <rect x="9" y="8" width="6" height="12" rx="1"></rect>
                                                            <rect x="15" y="4" width="6" height="16" rx="1"></rect>
                                                            <line x1="4" y1="20" x2="18" y2="20">
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
                                                    <h3>150</h3>
                                                    <p>New Orders</p>
                                                </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path
                                                        d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z">
                                                    </path>
                                                </svg> <a href="#"
                                                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                                    More info <i class="bi bi-link-45deg"></i> </a>
                                            </div>
                                        </div> <!-- ./col -->
                                        <div class="col-lg-3 col-6"> <!-- small box -->
                                            <div class="small-box text-bg-success">
                                                <div class="inner">
                                                    <h3>53<sup class="fs-5">%</sup></h3>
                                                    <p>Bounce Rate</p>
                                                </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path
                                                        d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                                                    </path>
                                                </svg> <a href="#"
                                                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                                    More info <i class="bi bi-link-45deg"></i> </a>
                                            </div>
                                        </div> <!-- ./col -->
                                        <div class="col-lg-3 col-6"> <!-- small box -->
                                            <div class="small-box text-bg-warning">
                                                <div class="inner">
                                                    <h3>44</h3>
                                                    <p>User Registrations</p>
                                                </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path
                                                        d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                                                    </path>
                                                </svg> <a href="#"
                                                    class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                                                    More info <i class="bi bi-link-45deg"></i> </a>
                                            </div>
                                        </div> <!-- ./col -->
                                        <div class="col-lg-3 col-6"> <!-- small box -->
                                            <div class="small-box text-bg-danger">
                                                <div class="inner">
                                                    <h3>65</h3>
                                                    <p>Unique Visitors</p>
                                                </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z">
                                                    </path>
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z">
                                                    </path>
                                                </svg> <a href="#"
                                                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                                    More info <i class="bi bi-link-45deg"></i> </a>
                                            </div>
                                        </div> <!-- ./col -->
                                    </div> <!-- /.row -->
                                </div> <!--end::Container-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.main.scripts')
</body>

</html>
