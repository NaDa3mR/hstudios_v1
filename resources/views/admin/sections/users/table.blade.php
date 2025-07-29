<div class="overflow-hidden flex-1 d-flex">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="px-5 pt-3 container-fluid">
            <div class="row">
                <div class="mb-3 col-md-12 mb-md-4">
                    <div class="mb-0 shadow-sm card rounded-8">
                        <div class="card-header card-header-action" style="color: #fff; border-bottom: 2px solid rgba(74,96,156,1);">
                            <h6 class="mb-0">Users And Roles <span class="badge bg-light text-dark ms-1">{{$users->count()}}</span></h6>
                        </div>
                        <div class="card-body">
                            <div class="role-list-view">
                                <table id="datable_4c" class="table table-hover table-striped table-bordered nowrap w-100">
                                    <thead style="background-color: #f8f8f8;">
                                        <tr>
                                            <th class="fw-bold">Name</th>
                                            <th class="fw-bold">Email</th>
                                            <th class="fw-bold">Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-sm avatar-rounded avatar-info me-2">
                                                            <span class="initial-wrap">{{ substr($user->name, 0, 1) }}</span>
                                                        </div>
                                                        <div>
                                                            <span class="fw-medium">{{ $user->name }}</span>
                                                            <div class="d-inline-block ms-2">
                                                                <button class="btn btn-icon btn-xs btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown">
                                                                    <span class="icon">
                                                                        <span class="feather-icon" data-bs-toggle="modal" data-bs-target="#deleteModal{{$user->id}}"><i data-feather="trash-2"></i></span>
                                                                    </span>
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2" style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $user->email }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="role-dropdown btn btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #f8f9fa; border: 1px solid #dee2e6; color: #000;">
                                                            <span class="role-label">{{ $user->getRoleNames()->first() ?? 'N/A' }}</span>
                                                            <i data-feather="chevron-down" style="width: 16px; height: 16px; margin-left: 5px;"></i>
                                                        </button>
                                                        <ul class="dropdown-menu role-menu" data-user-id="{{ $user->id }}">
                                                            @foreach($roles as $role)
                                                                <li>
                                                                    <a class="dropdown-item role-item {{ $user->hasRole($role) ? 'active' : '' }}" href="javascript:void(0);" data-role="{{ $role->name }}">
                                                                        {{ $role->name }}
                                                                        {{-- @if($user->hasRole($role))
                                                                            <i data-feather="check" class="float-end" style="width: 16px; height: 16px;"></i>
                                                                        @endif --}}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
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

<!-- Role Update Success Toast -->
<div class="bottom-0 p-3 position-fixed end-0" style="z-index: 11">
    <div id="roleUpdateToast" class="text-white border-0 toast align-items-center bg-success" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i data-feather="check-circle" style="width: 18px; height: 18px;"></i> Role updated successfully!
            </div>
            <button type="button" class="m-auto btn-close btn-close-white me-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
