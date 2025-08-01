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
                                                <h5 class="pg-title fs-5">Add New Blog</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs nav-line nav-icon nav-light mt-3">
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
                                                <span class="nav-link-text">Add New Blog</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </header>
                            {{-- main part --}}
                            {{-- Alert Messages --}}
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('blog.update', $blog->id) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{ $blog->id }}">

                                <div class="container py-4">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                value="{{ $blog->title }}" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="sub_title" class="form-label">Subtitle</label>
                                            <input type="text" name="sub_title" id="sub_title"
                                                class="form-control" value="{{ $blog->sub_title }}" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input type="text" name="slug" id="slug" class="form-control"
                                                value="{{ $blog->slug }}" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="meta_keyword" class="form-label">Meta Keyword</label>
                                            <input type="text" name="meta_keyword" id="meta_keyword"
                                                class="form-control" value="{{ $blog->meta_keyword }}" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="meta_description" class="form-label">Meta Description</label>
                                            <input type="text" name="meta_description" id="meta_description"
                                                class="form-control" value="{{ $blog->meta_description }}" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="meta_title" class="form-label">Meta Title</label>
                                            <input type="text" name="meta_title" id="meta_title"
                                                class="form-control" value="{{ $blog->meta_title }}" required>
                                        </div>

                                        <div class="col-12">
                                            <label for="details" class="form-label">Details</label>
                                            <textarea name="details" id="details" class="form-control" rows="4" required>{{ $blog->details }}</textarea>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" name="image" id="image" class="form-control"
                                                accept="image/*">
                                        </div>

                                    </div>
                                    <div class="text-end mt-4">
                                        <button type="submit" class="btn btn-lg btn-primary">Edit Blog</button>
                                    </div>
                                </div>
                            </form>

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
<script>
    function slugify(text) {
        return text
            .toString()
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '') // Remove non-alphanumeric chars
            .replace(/\s+/g, '-') // Replace spaces with -
            .replace(/-+/g, '-'); // Replace multiple - with single -
    }

    document.addEventListener('DOMContentLoaded', function() {
        const title = document.getElementById('title');
        const slug = document.getElementById('slug');

        title.addEventListener('input', function() {
            slug.value = slugify(title.value);
        });
    });
</script>
