<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="overflow-hidden flex-1 d-flex">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="px-5 pt-3 container-fluid">
            <div class="row">
                <div class="mb-3 col-md-12 mb-md-4">
                    <div class="mb-0 shadow-sm card rounded-8">
                        <div class="card-header card-header-action"
                            style="color: #fff; border-bottom: 2px solid rgba(74,96,156,1);">
                            <h6 class="mb-0">Candidates<span
                                    class="badge bg-light text-dark ms-1">{{ $candidates->count() }}</span></h6>
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
                                            <th class="fw-bold">Is hired</th>
                                            <th class="fw-bold">Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($candidates as $candidate)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-sm avatar-rounded avatar-info me-2">
                                                            <span
                                                                class="initial-wrap">{{ substr($candidate->first_name, 0, 1) }}</span>
                                                        </div>
                                                        <div>
                                                            <span class="fw-medium">{{ $candidate->first_name.' '.$candidate->last_name }}</span>
                                                            <div class="d-inline-block ms-2">
                                                                <button
                                                                    class="btn btn-icon btn-xs btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret"
                                                                    type="button" data-bs-toggle="dropdown">
                                                                    <span class="icon">
                                                                        <span class="feather-icon"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#deleteModal{{ $candidate->id }}"><i
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
                                                        <span>{{ $candidate->email }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $candidate->phone }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $candidate->career->title }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $candidate->country }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $candidate->city }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $candidate->linkedin }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $candidate->github }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $candidate->behance }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        {{-- <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i> --}}
                                                            <input type="checkbox" class="toggle-hired"  data-toggle="toggle" data-id="{{ $candidate->id }}"
                                                             {{ $candidate->is_hired ? 'checked' : '' }}>

                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="feather-icon" data-bs-toggle="modal"
                                                        data-bs-target="#updatemodel{{ $candidate->id }}"><i
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
