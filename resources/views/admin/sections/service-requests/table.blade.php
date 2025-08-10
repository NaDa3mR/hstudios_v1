<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="overflow-hidden flex-1 d-flex">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="px-5 pt-3 container-fluid">
            <div class="row">
                <div class="mb-3 col-md-12 mb-md-4">
                    <div class="mb-0 shadow-sm card rounded-8">
                        <div class="card-header card-header-action"
                            style="color: #fff; border-bottom: 2px solid rgba(74,96,156,1);">
                            <h6 class="mb-0">Services Requests<span
                                    class="badge bg-light text-dark ms-1">{{ $service_requests->count() }}</span></h6>
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
                                    class="table table-hover table-striped table-bordered nowrap w-100">
                                    <thead style="background-color: #f8f8f8;">
                                        <tr>
                                            <th class="fw-bold">Name</th>
                                            <th class="fw-bold">Client Name</th>
                                            <th class="fw-bold">Service</th>
                                            <th class="fw-bold">Details</th>
                                            <th class="fw-bold">Operations</th>
                                            <th class="fw-bold">Approved Request</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($service_requests as $service_request)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-sm avatar-rounded avatar-info me-2">
                                                            <span
                                                                class="initial-wrap">{{ substr($service_request->name, 0, 1) }}</span>
                                                        </div>
                                                        <div>
                                                            <span class="fw-medium">{{ $service_request->name }}</span>
                                                            <div class="d-inline-block ms-2">
                                                                <button
                                                                    class="btn btn-icon btn-xs btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret"
                                                                    type="button" data-bs-toggle="dropdown">
                                                                    <span class="icon">
                                                                        <span class="feather-icon"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#deleteModal{{ $service_request->id }}"><i
                                                                                data-feather="trash-2"></i></span>
                                                                    </span>
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $service_request->client->name }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="info" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        @foreach ($service_request->services as $service)
                                                            <span
                                                                class="badge bg-primary me-1">{{ $service->name }}</span>
                                                        @endforeach
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $service_request->details }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="feather-icon" data-bs-toggle="modal"
                                                        data-bs-target="#updatemodel{{ $service_request->id }}"><i
                                                            data-feather="edit-2"></i></span>
                                                </td>
                                                <td>
                                                    @if (!$service_request->deal)
                                                        <a href="{{ route('deals.create.fromRequest', $service_request->id) }}" class="btn btn-success">
                                                            Approved
                                                        </a>
                                                    @else
                                                        <span class="badge bg-success">✔ Deal Created</span>
                                                    @endif
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
