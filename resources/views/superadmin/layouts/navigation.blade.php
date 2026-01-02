<div class="sidebar" id="sidebar">

    <div class="sidebar-logo">
        <div>
            <a href="" class="logo logo-normal">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="Logo">
            </a>

            <a href="" class="logo-small">
                <img src="{{ asset('assets/img/logo-small.svg') }}" alt="Logo">
            </a>

            <a href="" class="dark-logo">
                <img src="{{ asset('assets/img/logo-white.svg') }}" alt="Logo">
            </a>
        </div>
        <button class="sidenav-toggle-btn btn border-0 p-0 active" id="toggle_btn">
            <i class="ti ti-arrow-bar-to-left"></i>
        </button>

        <button class="sidebar-close">
            <i class="ti ti-x align-middle"></i>
        </button>
    </div>

    <div class="sidebar-inner" data-simplebar>
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>{{ __('Main Menu') }}</span>
                </li>
                <li>
                    <ul>
                        <li class="{{ request()->routeIs('s.dashboard') ? 'active' : '' }}">
                            <a href="{{ route('s.dashboard', absolute: false) }}">
                                <i class="ti ti-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>{{ __('Management') }}</span>
                </li>
                <li>
                    <ul>
                        <li class="{{ request()->routeIs('s.companies.*') ? 'active' : '' }}">
                            <a href="{{ route('s.companies.index', absolute: false) }}">
                                <i class="ti ti-building-community"></i>
                                <span>{{ __('Companies') }}</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('s.plans.*') ? 'active' : '' }}">
                            <a href="{{ route('s.plans.index', absolute: false) }}">
                                <i class="ti ti-package"></i>
                                <span>{{ __('Plans') }}</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('s.subscriptions.*') ? 'active' : '' }}">
                            <a href="{{ route('s.subscriptions.index', absolute: false) }}">
                                <i class="ti ti-credit-card"></i>
                                <span>{{ __('Subscriptions') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>{{ __('Reports') }}</span>
                </li>
                <li>
                    <ul>
                        <li class="{{ request()->routeIs('s.reports.companies') ? 'active' : '' }}">
                            <a href="{{ route('s.reports.companies', absolute: false) }}">
                                <i class="ti ti-report"></i>
                                <span>{{ __('Company Reports') }}</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('s.reports.users') ? 'active' : '' }}">
                            <a href="{{ route('s.reports.users', absolute: false) }}">
                                <i class="ti ti-report-analytics"></i>
                                <span>{{ __('User Reports') }}</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('s.reports.subscriptions') ? 'active' : '' }}">
                            <a href="{{ route('s.reports.subscriptions', absolute: false) }}">
                                <i class="ti ti-report-analytics"></i>
                                <span>{{ __('Subscription Reports') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</div>
