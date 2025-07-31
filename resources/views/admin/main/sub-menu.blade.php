<div class="sub-menu">
    <div class="menu-header">
        <a class="navbar-brand" href="#">
            <img class="p-5 brand-img img-fluid" src="{{ URL::asset('logo.png') }}" alt="brand">
        </a>
    </div>
    <div data-simplebar class="nicescroll-bar">
        <ul id="submenu_1" class="nav subnav-list flex-column d-flex">
            <li class="nav-item">
                <div class="menu-content-wrap">
                    <div class="menu-group">
                        <div class="nav-header header-wth-search">
                            <div class="mb-5 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-icon avatar-xxs avatar-soft-pink me-2">
                                        <span class="initial-wrap">
                                            <i class="bi bi-person-badge fs-6"></i>
                                        </span>
                                    </div>
                                    <span class="fs-6 text-dark fw-medium">Users Management</span>
                                </div>
                            </div>
                            <ul class="nav nav-light navbar-nav flex-column">
                                <hr>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="ri-team-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Users</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#">
                                        <i class="ri-list-check-2 fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Roles</span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <ul id="submenu_2" class="nav subnav-list flex-column d-flex">
            <li class="nav-item">
                <div class="menu-content-wrap"  style="height: 100vh;">
                    <div class="menu-group">
                        <div class="nav-header header-wth-search">
                            <div class="mb-5 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-icon avatar-xxs avatar-soft-pink me-2">
                                        <span class="initial-wrap">
                                            <span class="feather-icon"><i data-feather="briefcase"></i></span>
                                        </span>
                                    </div>
                                    <span class="fs-6 text-dark fw-medium">CRM Management</span>
                                </div>
                            </div>
                            <ul class="nav nav-light navbar-nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="ri-dashboard-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="ri-building-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Companies</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Contacts</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="ri-archive-drawer-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Leads</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="ri-award-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Deals</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="ri-filter-2-line fs-5" style="margin-right: 15px;"></i>

                                        <span class="nav-link-text">Pipelines</span>
                                    </a>
                                </li>
                                <hr>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="ri-filter-2-line fs-5" style="margin-right: 15px;"></i>

                                        <span class="nav-link-text">Custom Email</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <ul id="submenu_3" class="nav subnav-list flex-column d-flex">
            <li class="nav-item">
                <div class="menu-content-wrap">
                    <div class="menu-group">
                        <div class="nav-header header-wth-search">
                            <div class="mb-5 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-icon avatar-xxs avatar-soft-pink me-2">
                                        <span class="initial-wrap">
                                            <span class="feather-icon"><i data-feather="briefcase"></i></span>
                                        </span>
                                    </div>
                                    <span class="fs-6 text-dark fw-medium">Clinic Management</span>
                                </div>
                            </div>
                            <ul class="nav nav-light navbar-nav flex-column">
                                {{-- <li class="nav-item {{ request()->url() == route('contacts.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('contacts.index') }}">
                                        <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Contacts</span>
                                    </a>
                                </li> --}}
                                {{-- <li class="nav-item {{ request()->url() == route('deals.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('deals.index') }}">
                                        <i class="ri-award-line fs-5" style="margin-right: 15px;"></i>

                                        <span class="nav-link-text">Deals</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('pipelines.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('pipelines.index') }}">
                                        <i class="ri-filter-2-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Pipelines</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
