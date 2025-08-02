<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="overflow-hidden flex-1 d-flex">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="px-5 pt-3 container-fluid">
            <div class="row">
                <div class="mb-3 col-md-12 mb-md-4">
                    <div class="mb-0 shadow-sm card rounded-8">
                        <div class="card-header card-header-action"
                            style="color: #fff; border-bottom: 2px solid rgba(74,96,156,1);">
                            <h6 class="mb-0">Careers<span
                                    class="badge bg-light text-dark ms-1">{{ $careers->count() }}</span></h6>
                        </div>
                        <div class="card-body">
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
                            @if (session('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success_message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="role-list-view">
                                <table id="datable_4c"
                                    class="table table-hover table-striped table-bordered nowrap w-200">
                                    <thead style="background-color: #f8f8f8;">
                                        <tr>
                                            <th class="fw-bold">Title</th>
                                            <th class="fw-bold">Currency</th>
                                            <th class="fw-bold">Type</th>
                                            <th class="fw-bold">Experience Level</th>
                                            <th class="fw-bold">Min Salary</th>
                                            <th class="fw-bold">Max Salary</th>
                                            <th class="fw-bold">Details</th>
                                            <th class="fw-bold">Is Active</th>
                                            <th class="fw-bold">Is Published</th>
                                            <th class="fw-bold">Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($careers as $career)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-sm avatar-rounded avatar-info me-2">
                                                            <span
                                                                class="initial-wrap">{{ substr($career->title, 0, 1) }}</span>
                                                        </div>
                                                        <div>
                                                            <span class="fw-medium">{{ $career->title }}</span>
                                                            <div class="d-inline-block ms-2">
                                                                <button
                                                                    class="btn btn-icon btn-xs btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret"
                                                                    type="button" data-bs-toggle="dropdown">
                                                                    <span class="icon">
                                                                        <span class="feather-icon"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#deleteModal{{ $career->id }}"><i
                                                                                data-feather="trash-2"></i></span>
                                                                    </span>
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="info" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $career->currency }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $career->type }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $career->experience_level }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $career->min_salary }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $career->max_salary }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $career->details }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        {{-- <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i> --}}
                                                            <input type="checkbox" class="toggle-active"  data-toggle="toggle" data-id="{{ $career->id }}"
                                                             {{ $career->is_active ? 'checked' : '' }}>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                            <input type="checkbox" class="toggle-published"  data-toggle="toggle" data-id="{{ $career->id }}"
                                                            {{ $career->is_published ? 'checked' : '' }}>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="feather-icon" data-bs-toggle="modal"
                                                        data-bs-target="#updatemodel{{ $career->id }}"><i
                                                            data-feather="edit-2"></i></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
