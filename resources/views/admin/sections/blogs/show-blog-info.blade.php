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

        .card-title {
            font-size: 2rem;
            /* Larger title */
            font-weight: 700;
        }

        .text-muted {
            font-size: 1.1rem;
        }

        .card-body p,
        .card-body div {
            font-size: 1.1rem;
        }

        .card-body strong {
            font-size: 1.1rem;
            color: #33475b;
        }

        .card-body .badge {
            font-size: 0.95rem;
            padding: 6px 12px;
        }

        .bg-light {
            background-color: #f8f9fa !important;
        }

        .border {
            border-color: #dee2e6 !important;
        }

        .card-text {
            font-size: 1.05rem;
            line-height: 1.6;
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

        html,
        body {
            height: auto !important;
            overflow-y: auto !important;
        }

        .hk-pg-wrapper,
        .hk-pg-body,
        .taskboardapp-wrap,
        .taskboardapp-content,
        .taskboardapp-detail-wrap {
            height: auto !important;
            overflow-y: auto !important;
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
                            {{-- @include('admin.sections.blogs.topbar') --}}
                            {{-- Topbar for Add Blog --}}
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
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <rect x="7" y="3" width="14" height="14" rx="2">
                                                        </rect>
                                                        <path
                                                            d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-wrap justify-content-between flex-1">
                                            <div>
                                                <div class="pg-subtitle">Blogs</div>
                                                <h5 class="pg-title fs-5">{{$blog->title}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <ul class="nav nav-tabs nav-line nav-icon nav-light mt-3">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#tab_boards">
                                                <span class="nav-icon-wrap"><span class="svg-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-id" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <rect x="3" y="4" width="18" height="16"
                                                                rx="3"></rect>
                                                            <circle cx="9" cy="10" r="2"></circle>
                                                            <line x1="15" y1="8" x2="17"
                                                                y2="8"></line>
                                                            <line x1="15" y1="12" x2="17"
                                                                y2="12"></line>
                                                            <line x1="7" y1="16" x2="17"
                                                                y2="16"></line>
                                                        </svg>
                                                    </span></span>
                                                <span class="nav-link-text">{{ $blog->title }}</span>
                                            </a>
                                        </li>
                                    </ul> --}}
                                </div>
                            </header>
                            <div class="container py-4">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-lg-12 col-xl-11">
                                        <!-- Blog Card -->
                                        <div class="card shadow-sm border-0">
                                            <div class="card-body p-4">
                                                {{-- @if ($blog->image) --}}
                                                <div class="mb-4 text-center">
                                                    <img src="{{ asset('dist/img/503.png') }}" alt="Blog Image"
                                                        class="img-fluid rounded shadow-sm border"
                                                        style="max-height: 400px; object-fit: cover;">
                                                </div>
                                                {{-- @endif --}}
                                                <h1 class="card-title">{{ $blog->title }}</h1>
                                                <h5 class="text-muted">{{ $blog->sub_title }}</h5>

                                                <hr class="my-3">

                                                <div class="mb-3">
                                                    <span class="badge bg-primary me-2">Slug: {{ $blog->slug }}</span>
                                                    <span class="badge bg-primary me-2">Status:
                                                        @if ($blog->is_active)
                                                            <span class="text-success">Active</span>
                                                        @else
                                                            <span class="text-danger">Inactive</span>
                                                        @endif
                                                    </span>
                                                </div>

                                                <div class="mb-3">
                                                    <strong>Meta Title:</strong>
                                                    <p>{{ $blog->meta_title }}</p>
                                                </div>

                                                <div class="mb-3">
                                                    <strong>Meta Description:</strong>
                                                    <p>{{ $blog->meta_description }}</p>
                                                </div>

                                                <div class="mb-3">
                                                    <strong>Meta Keywords:</strong>
                                                    <p>{{ $blog->meta_keyword }}</p>
                                                </div>

                                                @if ($blog->details)
                                                    <div class="mb-4">
                                                        <strong>Details:</strong>
                                                        <div class="border p-3 rounded bg-light">
                                                            {!! nl2br(e($blog->details)) !!}
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                            <div
                                                class="card-footer bg-white d-flex justify-content-between align-items-center">
                                                <span class="text-muted small">Created at:
                                                    {{ $blog->created_at->format('M d, Y') }}</span>
                                                <a href="{{ route('blog.index') }}"
                                                    class="btn btn-outline-primary btn-sm">← Back to Blogs</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.main.scripts')
</body>

</html>
