<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="overflow-hidden flex-1 d-flex">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="px-5 pt-3 container-fluid">
            <div class="row">
                <div class="mb-3 col-md-12 mb-md-4">
                    <div class="mb-0 shadow-sm card rounded-8">
                        <div class="card-header card-header-action"
                            style="color: #fff; border-bottom: 2px solid rgba(74,96,156,1);">
                            <h6 class="mb-0">Job Applications<span
                                    class="badge bg-light text-dark ms-1">{{ $applications->count() }}</span></h6>
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
                                            <th class="fw-bold">Name</th>
                                            <th class="fw-bold">Email</th>
                                            <th class="fw-bold">Phone</th>
                                            <th class="fw-bold">Career</th>
                                            <th class="fw-bold">Country</th>
                                            <th class="fw-bold">City</th>
                                            <th class="fw-bold">LinkedIn</th>
                                            <th class="fw-bold">GitHub</th>
                                            <th class="fw-bold">Behance</th>
                                            <th class="fw-bold">Image</th>
                                            <th class="fw-bold">CV</th>
                                            <th class="fw-bold">Candidate Approved</th>
                                            <th class="fw-bold">Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($applications as $application)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-sm avatar-rounded avatar-info me-2">
                                                            <span
                                                                class="initial-wrap">{{ substr($application->first_name, 0, 1) }}</span>
                                                        </div>
                                                        <div>
                                                            <span
                                                                class="fw-medium">{{ $application->first_name . ' ' . $application->last_name }}</span>
                                                            <div class="d-inline-block ms-2">
                                                                <button
                                                                    class="btn btn-icon btn-xs btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret"
                                                                    type="button" data-bs-toggle="dropdown">
                                                                    <span class="icon">
                                                                        <span class="feather-icon"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#deleteModal{{ $application->id }}"><i
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
                                                        <span>{{ $application->email }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $application->phone }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $application->career->title }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $application->country }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $application->city }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $application->linkedin }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $application->github }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $application->behance }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mt-2">
                                                            @if ($application->hasMedia('application_images'))
                                                                <a href="{{ $application->getFirstMediaUrl('application_images') }}"
                                                                    target="_blank"
                                                                    class="btn btn-outline-primary btn-sm">
                                                                    View Applicant Image
                                                                </a>
                                                            @else
                                                                <span class="text-muted">No image available</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mt-2">
                                                            @if ($application->hasMedia('application_cv'))
                                                                <a href="{{ $application->getFirstMediaUrl('application_cv') }}"
                                                                    target="_blank"
                                                                    class="btn btn-outline-primary btn-sm">
                                                                    View Applicant CV
                                                                </a>
                                                            @else
                                                                <span class="text-muted">No CV available</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn btn-sm btn-success promote-btn"
                                                            data-id="{{ $application->id }}">
                                                            Promote to Candidate
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="feather-icon" data-bs-toggle="modal"
                                                            data-bs-target="#updatemodel{{ $application->id }}"><i
                                                                data-feather="edit-2"></i></span>
                                                    </div>
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
