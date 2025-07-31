<div class="hk-menu">
    <div class="main-menu">
        <div class="menu-header">
            <a class="navbar-brand" href="/">
                <img class="brand-img" style="width: 6vh" src="{{ URL::asset('icon.png') }}" alt="brand">
            </a>
        </div>
        @php
            $pages = ['blogs','about'];
            $user_arr = ['admin','roles','users'];
            $crm_arr = ['deals','companies','contacts','leads','pipelines','stages','custom-email'];
        @endphp
        <div data-simplebar class="nicescroll-bar">
            <div class="menu-content-wrap">
                <div class="menu-group">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item {{in_array(Request::segment(2), $pages) ? 'active' : '' }} {{Request::segment(2) == NULL ? 'active' : '' }}">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="website pages" data-bs-trigger="hover" data-target="#submenu_3">
                                <i class="bi bi-cash-coin fs-3"></i>
                            </a>
                        </li>
                        <li class="nav-item {{in_array(Request::segment(2), $crm_arr) ? 'active' : '' }} {{Request::segment(2) == NULL ? 'active' : '' }}">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="CRM" data-bs-trigger="hover" data-target="#submenu_2">
                                <i class="bi bi-cash-coin fs-3"></i>
                            </a>
                        </li>
                        <li class="nav-item {{in_array(Request::segment(2) , $user_arr) ? 'active' : '' }}">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="User Mangement" data-bs-trigger="hover" data-target="#submenu_1">
                           <i class="ri-user-settings-line fs-5"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav flex-column d-lg-none">
                        <li class="nav-item nav-link">
                            <a href="javascript:void(0)" class="mx-auto d-block avatar avatar-xs avatar-primary avatar-rounded dropdown-toggle no-caret" data-bs-toggle="dropdown">
                                <span class="initial-wrap">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right w-250p position-fixed">
                                <div class="py-2 dropdown-item rounded-3">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-xs avatar-primary avatar-rounded">
                                                <span class="initial-wrap">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</span>
                                            </div>
                                        </div>
                                        <div class="media-body mw-175p">
                                            <a href="#" class="d-block name">{{auth()->user()->name}} <i class="ri-checkbox-circle-fill fs-7 text-primary"></i></a>
                                            <a href="#" class="d-block fs-7 link-secondary text-truncate">{{auth()->user()->email}}</a>
                                            <div class="dropdown-divider"></div>
                                            <form action="#" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item" href="#">Logout </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bottom-nav d-lg-block d-none">
            <div class="menu-content-wrap">
                <div class="menu-group">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle no-caret" href="#">
                                <span class="nav-icon-wrap">
                                    <span class="svg-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                            <line x1="9" y1="9" x2="10" y2="9" />
                                            <line x1="9" y1="13" x2="15" y2="13" />
                                            <line x1="9" y1="17" x2="15" y2="17" />
                                        </svg>
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle no-caret" href="#" >
                                <span class="nav-icon-wrap">
                                    <span class="svg-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item nav-link">
                            <a href="javascript:void(0)" class="mx-auto d-block avatar avatar-xs avatar-primary avatar-rounded dropdown-toggle no-caret" data-bs-toggle="dropdown">
                                <span class="initial-wrap">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right w-250p">
                                <h6 class="dropdown-header">Logged account</h6>
                                <div class="py-2 dropdown-item rounded-3">
                                    <div class="media align-items-center active-user">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-xs avatar-primary avatar-rounded">
                                                <span class="initial-wrap"> {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</span>
                                            </div>
                                        </div>
                                        <div class="media-body mw-175p">
                                            <a href="#" class="d-block name">{{auth()->user()->name}} <i class="ri-checkbox-circle-fill fs-7 text-primary"></i></a>
                                            <a href="#" class="d-block fs-7 link-secondary text-truncate">{{auth()->user()->email}}</a>
                                            <div class="dropdown-divider"></div>
                                            <form action="#" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item" href="#">Logout </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  @include('admin.main.sub-menu')
<div id="hk_menu_backdrop" class="hk-menu-backdrop"></div>
</div>
