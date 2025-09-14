<div class="sub-menu">
    <div class="menu-header">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img class="p-5 brand-img img-fluid" src="{{ asset('website-assets/logo.png') }}" alt="brand">
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
                                    <span class="fs-6 text-dark fw-medium">Finance Management</span>
                                </div>
                            </div>
                            <ul class="nav nav-light navbar-nav flex-column">
                                <hr>
                                <li class="nav-item {{ request()->url() == route('expense.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('expense.index') }}">
                                        <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Expense</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('ex-source.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('ex-source.index') }}">
                                        <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Expense Source</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('income.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('income.index') }}">
                                        <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Income</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('in-source.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('in-source.index') }}">
                                        <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Income Source</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('account.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('account.index') }}">
                                        <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Account</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('transfer.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('transfer.index') }}">
                                        <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Transfer</span>
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
                <div class="menu-content-wrap" style="height: 100vh;">
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
                                <li class="nav-item {{ request()->url() == route('deal.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('deal.index') }}">
                                        <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Deals</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('client.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('client.index') }}">
                                        <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Clients</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('meeting.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('meeting.index') }}">
                                        <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Meeting</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <li
                                    class="nav-item {{ request()->url() == route('meetings.calendar') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('meetings.calendar') }}">
                                        <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Calender</span>
                                    </a>
                                </li>
                                <li
                                    class="nav-item {{ request()->url() == route('candidate.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('candidate.index') }}">
                                        <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Candidates</span>
                                    </a>
                                </li>
                                <li
                                    class="nav-item {{ request()->url() == route('service-request.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('service-request.index') }}">
                                        <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Service Request</span>
                                    </a>
                                </li>
                                <li
                                    class="nav-item {{ request()->url() == route('interview.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('interview.index') }}">
                                        <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Interview</span>
                                    </a>
                                </li>

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
                            <span class="fs-6 text-dark fw-medium">website Management</span>
                        </div>
                    </div>
                    <ul class="nav nav-light navbar-nav flex-column">
                        <li class="nav-item {{ request()->url() == route('blog.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('blog.index') }}">
                                <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                <span class="nav-link-text">blogs</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->url() == route('service.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('service.index') }}">
                                <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                <span class="nav-link-text">services</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->url() == route('career.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('career.index') }}">
                                <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                <span class="nav-link-text">careers</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->url() == route('application.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('application.index') }}">
                                <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                <span class="nav-link-text">job applications</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->url() == route('employee.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('employee.index') }}">
                                <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                <span class="nav-link-text">employees</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->url() == route('contact.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('contact.index') }}">
                                <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                <span class="nav-link-text">contacts</span>
                            </a>
                        </li>
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
