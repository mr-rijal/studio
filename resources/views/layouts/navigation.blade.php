<div class="sidebar" id="sidebar">

    <!-- Start Logo -->
    <div class="sidebar-logo">
        <div>
            <!-- Logo Normal -->
            <a href="" class="logo logo-normal">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="Logo">
            </a>

            <!-- Logo Small -->
            <a href="" class="logo-small">
                <img src="{{ asset('assets/img/logo-small.svg') }}" alt="Logo">
            </a>

            <!-- Logo Dark -->
            <a href="" class="dark-logo">
                <img src="{{ asset('assets/img/logo-white.svg') }}" alt="Logo">
            </a>
        </div>
        <button class="sidenav-toggle-btn btn border-0 p-0 active" id="toggle_btn">
            <i class="ti ti-arrow-bar-to-left"></i>
        </button>

        <!-- Sidebar Menu Close -->
        <button class="sidebar-close">
            <i class="ti ti-x align-middle"></i>
        </button>
    </div>
    <!-- End Logo -->

    <!-- Sidenav Menu -->
    <div class="sidebar-inner" data-simplebar>
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>{{ __('Main Menu') }}</span>
                </li>
                <li>
                    <ul>
                        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <a href="{{ route('dashboard', absolute: false) }}">
                                <i class="ti ti-dashboard"></i>
                                <span>{{ __('Dashboard') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>{{ __('Families') }}</span>
                </li>
                <li>
                    <ul>
                        <li
                            class="{{ request()->routeIs('families.*') && !request()->routeIs('families.create') ? 'active' : '' }}">
                            <a href="">
                                <i class="ti ti-friends"></i>
                                <span>{{ __('List Families') }}</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('families.create') ? 'active' : '' }}">
                            <a href="">
                                <i class="ti ti-plus"></i>
                                <span>{{ __('Quick Registration') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="ti ti-file-search"></i>
                                <span>{{ __('Reports') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>{{ __('Students') }}</span>
                </li>
                <li>
                    <ul>
                        <li
                            class="{{ request()->routeIs('students.*') && !request()->routeIs('students.create') ? 'active' : '' }}">
                            <a href="">
                                <i class="ti ti-users"></i>
                                <span>{{ __('List Students') }}</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('students.create') ? 'active' : '' }}">
                            <a href="">
                                <i class="ti ti-plus"></i>
                                <span>{{ __('Add Student') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>{{ __('Classes') }}</span>
                </li>
                <li>
                    <ul>
                        <li
                            class="{{ request()->routeIs('classes.*') && !request()->routeIs('classes.create') ? 'active' : '' }}">
                            <a href="">
                                <i class="ti ti-school"></i>
                                <span>{{ __('List Classes') }}</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('classes.create') ? 'active' : '' }}">
                            <a href="">
                                <i class="ti ti-plus"></i>
                                <span>{{ __('Add Class') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>{{ __('Staffs') }}</span>
                </li>
                <li>
                    <ul>
                        <li
                            class="{{ request()->routeIs('staffs.*') && !request()->routeIs('staffs.create') ? 'active' : '' }}">
                            <a href="">
                                <i class="ti ti-tie"></i>
                                <span>{{ __('List Staffs') }}</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('staffs.create') ? 'active' : '' }}">
                            <a href="">
                                <i class="ti ti-plus"></i>
                                <span>{{ __('Add Staff') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>{{ __('Transactions') }}</span>
                </li>
                <li>
                    <ul>
                        <li class="{{ request()->routeIs('transactions.*') ? 'active' : '' }}">
                            <a href="">
                                <i class="ti ti-receipt-dollar"></i>
                                <span>{{ __('All Transactions') }}</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('transactions.petty-cash.*') ? 'active' : '' }}">
                            <a href="">
                                <i class="ti ti-cash"></i>
                                <span>{{ __('Petty Cash') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>{{ __('More') }}</span>
                </li>
                <li>
                    <ul>
                        <li class="{{ request()->routeIs('reports.*') ? 'active' : '' }}">
                            <a href="">
                                <i class="ti ti-file-search"></i>
                                <span>{{ __('Reports') }}</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('communication.*') ? 'active' : '' }}">
                            <a href="">
                                <i class="ti ti-message-circle"></i>
                                <span>{{ __('Communication') }}</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('billing.*') ? 'active' : '' }}">
                            <a href="">
                                <i class="ti ti-credit-card"></i>
                                <span>{{ __('Billing') }}</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('notifications.*') ? 'active' : '' }}">
                            <a href="">
                                <i class="ti ti-bell"></i>
                                <span>{{ __('Notifications') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>{{ __('Settings') }}</span>
                </li>
                <li>
                    <ul>
                        <li {{ request()->routeIs('profile.edit') ? 'active' : '' }}>
                            <a href="{{ route('profile.edit', absolute: false) }}">
                                <i class="ti ti-user"></i>
                                <span>{{ __('My Profile') }}</span>
                            </a>
                        </li>
                        <li {{ request()->routeIs('profile.edit') ? 'active' : '' }}>
                            <a href="">
                                <i class="ti ti-settings"></i>
                                <span>{{ __('General Settings') }}</span>
                            </a>
                        </li>
                        <li {{ request()->routeIs('profile.edit') ? 'active' : '' }}>
                            <a href="">
                                <i class="ti ti-tag"></i>
                                <span>{{ __('Categories') }}</span>
                            </a>
                        </li>
                        <li {{ request()->routeIs('profile.edit') ? 'active' : '' }}>
                            <a href="">
                                <i class="ti ti-discount"></i>
                                <span>{{ __('Tuition & Discounts') }}</span>
                            </a>
                        </li>
                        <li {{ request()->routeIs('profile.edit') ? 'active' : '' }}>
                            <a href="">
                                <i class="ti ti-world-www"></i>
                                <span>{{ __('Domain Settings') }}</span>
                            </a>
                        </li>
                        <li {{ request()->routeIs('profile.edit') ? 'active' : '' }}>
                            <a href="">
                                <i class="ti ti-coin"></i>
                                <span>{{ __('Registration Fee') }}</span>
                            </a>
                        </li>
                        <li {{ request()->routeIs('profile.edit') ? 'active' : '' }}>
                            <a href="">
                                <i class="ti ti-credit-card"></i>
                                <span>{{ __('Payment Settings') }}</span>
                            </a>
                        </li>
                        <li {{ request()->routeIs('profile.edit') ? 'active' : '' }}>
                            <a href="">
                                <i class="ti ti-file-description"></i>
                                <span>{{ __('Policies') }}</span>
                            </a>
                        </li>
                        <li {{ request()->routeIs('profile.edit') ? 'active' : '' }}>
                            <a href="">
                                <i class="ti ti-building-community"></i>
                                <span>{{ __('Branches') }}</span>
                            </a>
                        </li>
                        <li {{ request()->routeIs('profile.edit') ? 'active' : '' }}>
                            <a href="">
                                <i class="ti ti-mail"></i>
                                <span>{{ __('Email Settings') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
