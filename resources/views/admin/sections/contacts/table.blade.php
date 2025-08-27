<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="overflow-hidden flex-1 d-flex">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="px-5 pt-3 container-fluid">
            <div class="row">
                <div class="mb-3 col-md-12 mb-md-4">
                    <div class="mb-0 shadow-sm card rounded-8">
                        <div class="card-header card-header-action"
                            style="color: #fff; border-bottom: 2px solid rgba(74,96,156,1);">
                            <h6 class="mb-0">Contacts<span
                                    class="badge bg-light text-dark ms-1">{{ $contacts->count() }}</span></h6>
                        </div>
                        <div class="card-body">
                            <div class="role-list-view">
                                <table id="datable_4c"
                                    class="table table-hover table-striped table-bordered nowrap w-100">
                                    <thead style="background-color: #f8f8f8;">
                                        <tr>
                                            <th class="fw-bold">Name</th>
                                            <th class="fw-bold">Email</th>
                                            <th class="fw-bold">Phone</th>
                                            <th class="fw-bold">Subject</th>
                                            <th class="fw-bold">Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-sm avatar-rounded avatar-info me-2">
                                                            <span
                                                                class="initial-wrap">{{ substr($contact->name, 0, 1) }}</span>
                                                        </div>
                                                        <div>
                                                            <span class="fw-medium">{{ $contact->name }}</span>
                                                            <div class="d-inline-block ms-2">
                                                                <button
                                                                    class="btn btn-icon btn-xs btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret"
                                                                    type="button" data-bs-toggle="dropdown">
                                                                    <span class="icon">
                                                                        <span class="feather-icon"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#deleteModal{{ $contact->id }}"><i
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
                                                        <span>{{ $contact->email }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="info" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $contact->phone }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $contact->subject }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $contact->message }}</span>
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
