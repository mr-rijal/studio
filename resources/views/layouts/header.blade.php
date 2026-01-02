<header class="navbar-header">
    <div class="page-container topbar-menu">
        <div class="d-flex align-items-center gap-2">
            <a href="" class="logo">
                <span class="logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('assets/img/logo.svg') }}" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/img/logo-small.svg') }}" alt="small logo">
                    </span>
                </span>

                <span class="logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('assets/img/logo-white.svg') }}" alt="dark logo">
                    </span>
                </span>
            </a>

            <a id="mobile_btn" class="mobile-btn" href="#sidebar">
                <i class="ti ti-menu-deep fs-24"></i>
            </a>

            <button class="sidenav-toggle-btn btn border-0 p-0" id="toggle_btn2">
                <i class="ti ti-arrow-bar-to-right"></i>
            </button>

            <div class="me-auto d-flex align-items-center header-search d-lg-flex d-none">
                {{-- add menu here --}}
            </div>

        </div>

        <div class="d-flex align-items-center">
            <div class="header-item">
                <div class="dropdown me-2">
                    <a href="javascript:void(0);" class="btn topbar-link btnFullscreen">
                        <i class="ti ti-maximize"></i>
                    </a>
                </div>
            </div>
            <div class="header-item d-none d-sm-flex me-2">
                <button class="topbar-link btn topbar-link" id="light-dark-mode" type="button">
                    <i class="ti ti-moon fs-16"></i>
                </button>
            </div>
            <div class="header-item d-none d-sm-flex">
                <div class="dropdown me-2">
                    <a href="javascript:void(0);" class="btn topbar-link topbar-teal-link" data-bs-toggle="dropdown">
                        <i class="ti ti-layout-grid-add"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-2">
                        <a href="" class="dropdown-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-flex mb-1 fw-semibold text-dark">Contacts</span>
                                    <span class="fs-13">View All the Contacts</span>
                                </div>
                                <i class="ti ti-chevron-right-pipe text-dark"></i>
                            </div>
                        </a>
                        <a href="" class="dropdown-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-flex mb-1 fw-semibold text-dark">Pipeline</span>
                                    <span class="fs-13">View All the Pipeline</span>
                                </div>
                                <i class="ti ti-chevron-right-pipe text-dark"></i>
                            </div>
                        </a>
                        <a href="" class="dropdown-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-flex mb-1 fw-semibold text-dark">Activities</span>
                                    <span class="fs-13">Activities</span>
                                </div>
                                <i class="ti ti-chevron-right-pipe text-dark"></i>
                            </div>
                        </a>
                        <a href="" class="dropdown-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-flex mb-1 fw-semibold text-dark">Analytics</span>
                                    <span class="fs-13">Analytics</span>
                                </div>
                                <i class="ti ti-chevron-right-pipe text-dark"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header-item d-none d-sm-flex">
                <div class="dropdown me-2">
                    <a href="" class="btn topbar-link topbar-indigo-link">
                        <i class="ti ti-help-hexagon"></i>
                    </a>
                </div>
            </div>
            <div class="header-item d-none d-sm-flex">
                <div class="dropdown me-2">
                    <a href="lead-reports.html" class="btn topbar-link topbar-warning-link">
                        <i class="ti ti-chart-pie"></i>
                    </a>
                </div>
            </div>
            <div class="header-line"></div>
            <div class="header-item">
                <div class="dropdown me-2">
                    <a href="" class="btn topbar-link">
                        <i class="ti ti-message-circle-exclamation"></i>
                        <span class="badge rounded-pill">14</span>
                    </a>
                </div>
            </div>
            <div class="header-item">
                <div class="dropdown me-2">
                    <button class="topbar-link btn topbar-link dropdown-toggle drop-arrow-none"
                        data-bs-toggle="dropdown" data-bs-offset="0,24" type="button" aria-haspopup="false"
                        aria-expanded="false">
                        <i class="ti ti-bell-check fs-16 animate-ring"></i>
                        <span class="badge rounded-pill">10</span>
                    </button>
                    <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg" style="min-height: 300px;">
                        <div class="p-2 border-bottom">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fs-16 fw-semibold"> Notifications</h6>
                                </div>
                            </div>
                        </div>
                        <div class="notification-body position-relative z-2 rounded-0" data-simplebar>
                            <div class="dropdown-item notification-item py-3 text-wrap border-bottom"
                                id="notification-1">
                                <div class="d-flex">
                                    <div class="me-2 position-relative flex-shrink-0">
                                        <img src="assets/img/users/user-01.jpg" class="avatar-md rounded-circle"
                                            alt="Img">
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0 fw-medium text-dark">John Doe</p>
                                        <p class="mb-1 text-wrap">
                                            left 6 comments on <span class="fw-medium text-dark">Isla Nublar
                                                SOC2 compliance report</span>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fs-12"><i class="ti ti-clock me-1"></i>4 min
                                                ago</span>
                                            <div class="notification-action d-flex align-items-center float-end gap-2">
                                                <a href="javascript:void(0);"
                                                    class="notification-read rounded-circle bg-danger"
                                                    data-bs-toggle="tooltip" title=""
                                                    data-bs-original-title="Make as Read"
                                                    aria-label="Make as Read"></a>
                                                <button class="btn rounded-circle p-0"
                                                    data-dismissible="#notification-1">
                                                    <i class="ti ti-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item-->
                            <div class="dropdown-item notification-item py-3 text-wrap border-bottom"
                                id="notification-2">
                                <div class="d-flex">
                                    <div class="me-2 position-relative flex-shrink-0">
                                        <img src="assets/img/users/user-12.jpg" class="avatar-md rounded-circle"
                                            alt="Img">
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0 fw-medium text-dark">Thomas William</p>
                                        <p class="mb-1 text-wrap">
                                            “Oh, I finished de-bugging the phones, but the system's compiling
                                            for eighteen minutes, or twenty...”
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fs-12"><i class="ti ti-clock me-1"></i>8 min
                                                ago</span>
                                            <div class="notification-action d-flex align-items-center float-end gap-2">
                                                <a href="javascript:void(0);"
                                                    class="notification-read rounded-circle bg-danger"
                                                    data-bs-toggle="tooltip" title=""
                                                    data-bs-original-title="Make as Read"
                                                    aria-label="Make as Read"></a>
                                                <button class="btn rounded-circle p-0"
                                                    data-dismissible="#notification-2">
                                                    <i class="ti ti-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item-->
                            <div class="dropdown-item notification-item py-3 text-wrap border-bottom"
                                id="notification-3">
                                <div class="d-flex">
                                    <div class="me-2 position-relative flex-shrink-0">
                                        <img src="assets/img/profiles/avatar-12.jpg" class="avatar-md rounded-circle"
                                            alt="Img">
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0 fw-medium text-dark">Sarah Anderson</p>
                                        <p class="mb-1 text-wrap">
                                            attached a file to <span class="fw-medium text-dark">Isla Nublar
                                                SOC2 compliance report</span>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fs-12"><i class="ti ti-clock me-1"></i>15 min
                                                ago</span>
                                            <div class="notification-action d-flex align-items-center float-end gap-2">
                                                <a href="javascript:void(0);"
                                                    class="notification-read rounded-circle bg-danger"
                                                    data-bs-toggle="tooltip" title=""
                                                    data-bs-original-title="Make as Read"
                                                    aria-label="Make as Read"></a>
                                                <button class="btn rounded-circle p-0"
                                                    data-dismissible="#notification-3">
                                                    <i class="ti ti-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item-->
                            <div class="dropdown-item notification-item py-3 text-wrap" id="notification-4">
                                <div class="d-flex">
                                    <div class="me-2 position-relative flex-shrink-0">
                                        <img src="assets/img/profiles/avatar-08.jpg" class="avatar-md rounded-circle"
                                            alt="Img">
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0 fw-medium text-dark">Ann McClure</p>
                                        <p class="mb-1 text-wrap">
                                            mentioned you in <span class="fw-medium text-dark">Bug Fix Review -
                                                Task #432</span>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fs-12"><i class="ti ti-clock me-1"></i>20 min
                                                ago</span>
                                            <div class="notification-action d-flex align-items-center float-end gap-2">
                                                <a href="javascript:void(0);"
                                                    class="notification-read rounded-circle bg-danger"
                                                    data-bs-toggle="tooltip" title=""
                                                    data-bs-original-title="Make as Read"
                                                    aria-label="Make as Read"></a>
                                                <button class="btn rounded-circle p-0"
                                                    data-dismissible="#notification-4">
                                                    <i class="ti ti-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="p-2 rounded-bottom border-top text-center">
                            <a href="" class="text-center text-decoration-underline fs-14 mb-0">
                                {{ __('View All Notifications') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown profile-dropdown d-flex align-items-center justify-content-center">
                <a href="javascript:void(0);" class="topbar-link dropdown-toggle drop-arrow-none position-relative"
                    data-bs-toggle="dropdown" data-bs-offset="0,22" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('assets/img/users/user-40.jpg') }}" width="38" class="rounded-1 d-flex"
                        alt="user-image">
                    <span class="online text-success">
                        <i class="ti ti-circle-filled d-flex bg-white rounded-circle border border-1 border-white"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-2">

                    <div class="d-flex align-items-center bg-light rounded-3 p-2 mb-2">
                        <img src="{{ asset('assets/img/users/user-40.jpg') }}" class="rounded-circle" width="42"
                            height="42" alt="Img">
                        <div class="ms-2">
                            <p class="fw-medium text-dark mb-0">{{ auth()->user()->name }}</p>
                            <span class="d-block fs-13">{{ auth()->user()->role->name }}</span>
                        </div>
                    </div>

                    <a href="" class="dropdown-item">
                        <i class="ti ti-user-circle me-1 align-middle"></i>
                        <span class="align-middle">{{ __('Profile') }}</span>
                    </a>

                    <a href="" class="dropdown-item">
                        <i class="ti ti-settings me-1 align-middle"></i>
                        <span class="align-middle">{{ __('Settings') }}</span>
                    </a>

                    <div class="pt-2 mt-2 border-top">
                        <a href="javascript:void(0);" class="dropdown-item text-danger" data-bs-toggle="modal"
                            data-bs-target="#logoutModal">
                            <i class="ti ti-logout me-1 fs-17 align-middle"></i>
                            <span class="align-middle">{{ __('Sign Out') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">{{ __('Are you sure you want to logout?') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('You will be logged out of your account and need to login again to access your account.') }}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Yes, Logout') }}
                </button>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
