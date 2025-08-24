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

        .hk-pg-header.pg-header-wth-tab {
            
            margin-top: -62px;
        }
    </style>
</head>

<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple">

        {{-- Sidebar --}}
        @include('admin.main.sidebar')

        {{-- Page Wrapper --}}
        <div class="hk-pg-wrapper">

            {{-- Page Body --}}

            <div class="taskboardapp-detail-wrap">
                <header class="hk-pg-header pg-header-wth-tab">
                    <div>
                        <div class="d-flex align-items-center">
                            <button
                                class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle me-2 d-xl-none"><span
                                    class="icon"><span class="feather-icon"><i
                                            data-feather="align-left"></i></span></span></button>
                            <div class="avatar avatar-sm avatar-icon avatar-info me-3">
                                <span class="initial-wrap rounded-8">
                                    <span class="svg-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-box-multiple" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="7" y="3" width="14" height="14" rx="2"></rect>
                                            <path d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2">
                                            </path>
                                        </svg>
                                    </span>
                                </span>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between flex-1">
                                <div>
                                    <h5 class="pg-title fs-5">Profile</h5>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs nav-line nav-icon nav-light mt-3">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tab_boards">
                                    <span class="nav-icon-wrap"><span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-id" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <rect x="3" y="4" width="18" height="16" rx="3"></rect>
                                                <circle cx="9" cy="10" r="2"></circle>
                                                <line x1="15" y1="8" x2="17" y2="8">
                                                </line>
                                                <line x1="15" y1="12" x2="17" y2="12">
                                                </line>
                                                <line x1="7" y1="16" x2="17" y2="16">
                                                </line>
                                            </svg>
                                        </span></span>
                                    <span class="nav-link-text">Your Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </header>

            </div>
            <div class="card shadow-sm rounded-3">
                <div class="card-body text-center">
                    <div class="avatar avatar-lg avatar-rounded mb-3">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}"
                            alt="{{ $user->name }}">
                    </div>
                    <h4>{{ $user->name }}</h4>
                    <p class="text-muted">{{ $user->email }}</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>

            {{-- End Page Body --}}

        </div>
        {{-- End Page Wrapper --}}

    </div>

    @include('admin.main.scripts')
</body>




{{-- <body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active">
        @include('admin.main.sidebar')
        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            <header class="hk-pg-header pg-header-wth-tab">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle me-2 d-xl-none"><span class="icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span></button>
                                        <div class="avatar avatar-sm avatar-icon avatar-info me-3">
                                            <span class="initial-wrap rounded-8">
                                                <span class="svg-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box-multiple" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <rect x="7" y="3" width="14" height="14" rx="2"></rect>
                                                        <path d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2"></path>
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-wrap justify-content-between flex-1">
                                            <div>
                                                <h5 class="pg-title fs-5">Profile</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs nav-line nav-icon nav-light mt-3">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#tab_boards">
                                                <span class="nav-icon-wrap"><span class="svg-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-id" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <rect x="3" y="4" width="18" height="16" rx="3"></rect>
                                                        <circle cx="9" cy="10" r="2"></circle>
                                                        <line x1="15" y1="8" x2="17" y2="8"></line>
                                                        <line x1="15" y1="12" x2="17" y2="12"></line>
                                                        <line x1="7" y1="16" x2="17" y2="16"></line>
                                                    </svg>
                                                </span></span>
                                                <span class="nav-link-text">Your Profile</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </header>

                        </div>

                        <div class="hk-pg-body">
                            <div class="container mt-4">
                                <header class="hk-pg-header pg-header-wth-tab mb-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm avatar-icon avatar-info me-3">
                                            <span class="initial-wrap rounded-8">
                                                <span class="svg-icon">
                                                    <!-- SVG ICON -->
                                                </span>
                                            </span>
                                        </div>
                                        <h5 class="pg-title fs-5 mb-0">Profile</h5>
                                    </div>
                                </header>

                                <div class="card shadow rounded-3">
                                    <div class="card-body text-center">
                                        <h4>{{ $user->name }}</h4>
                                        <p class="text-muted">{{ $user->email }}</p>

                                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                                            Edit Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.main.scripts')


</body> --}}

</html>
