<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="canonical" href="{{ url('/') }}">
    <meta name="theme-color" content="#178d72">

    <!-- Open Graph Tags -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:site_name" content="{{ $title }}" />
    <meta property="og:image" content="" />
    <meta property="og:image:width" content="1180" />
    <meta property="og:image:height" content="600" />
    <meta property="og:image:type" content="image/png" />

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">

    <link rel="canonical" href="{{ url('/') }}" />

    <!-- preload head styles -->
    <link rel="preload" href="{{ asset('assets/landing/css/fonts.css') }}" as="style">
    <link rel="preload" href="{{ asset('assets/landing/css/unicons.min.css') }}" as="style">
    <link rel="preload" href="{{ asset('assets/landing/css/swiper-bundle.min.css') }}" as="style">
    <link rel="preload" href="{{ asset('assets/landing/css/magic-cursor.min.css') }}" as="style">

    <!-- preload footer scripts -->
    <link rel="preload" href="{{ asset('assets/landing/js/libs/jquery.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/libs/scrollmagic.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/libs/swiper-bundle.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/libs/anime.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/libs/typed.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/libs/tilt.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/libs/split-type.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/libs/prettify.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/libs/gsap.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/libs/smooth-scroll.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/core/magic-cursor.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/helpers/data-attr-helper.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/helpers/swiper-helper.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/helpers/splitype-helper.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/helpers/anime-helper.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/helpers/typed-helper.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/helpers/tilt-helper.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/core/marquee.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/uikit-components-bs.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/form.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets/landing/js/app.js') }}" as="script">

    <!-- app head for bootstrap core -->
    <script src="{{ asset('assets/landing/js/app-head-bs.js') }}"></script>

    <!-- include uni-core components -->
    <link rel="stylesheet" href="{{ asset('assets/landing/js/uni-core/css/uni-core.min.css') }}">

    <!-- include styles -->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/unicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/prettify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/magic-cursor.min.css') }}">

    <!-- include main style -->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/theme/main.purge.css') }}">

    <!-- include scripts -->
    <script src="{{ asset('assets/landing/js/uni-core/js/uni-core-bundle.min.js') }}"></script>
</head>

<body
    class="uni-body panel bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 overflow-x-hidden disable-cursor">
    <!--  Menu panel -->
    <div id="uc-menu-panel" data-uc-offcanvas="overlay: true;">
        <div class="uc-offcanvas-bar bg-white text-dark dark:bg-gray-900 dark:text-white">

            <header class="uc-offcanvas-header hstack justify-between items-center pb-2 bg-white dark:bg-gray-900">
                <div class="uc-logo">
                    <a href="" class="h5 text-none text-gray-900 dark:text-white">
                        <img class="w-32px" src="{{ asset('assets/landing/images/common/logo-mark.svg') }}"
                            alt="{{ config('app.name') }}">
                    </a>
                </div>
                <button
                    class="uc-offcanvas-close rtl:end-auto rtl:start-0 m-1 mt-2 icon-3 btn border-0 dark:text-white dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all"
                    type="button">
                    <i class="unicon-close"></i>
                </button>
            </header>

            <div class="panel">
                <form id="search-panel" class="form-icon-group vstack gap-1 mb-2" data-uc-sticky="">
                    <input type="email" class="form-control form-control-sm fs-7 rounded-default"
                        placeholder="Search..">
                    <span class="form-icon text-gray">
                        <i class="unicon-search icon-1"></i>
                    </span>
                </form>
                <ul class="nav-y gap-narrow fw-medium fs-6" data-uc-nav>
                    <li>
                        <a href="">Features</a>
                    </li>
                    <li>
                        <a href="">Pricing</a>
                    </li>
                    <li>
                        <a href="">About</a>
                    </li>
                    <li>
                        <a href="">Career</a>
                    </li>
                    <li>
                        <a href="">Contact</a>
                    </li>
                    <li class="hr opacity-10 my-1"></li>
                    <li>
                        <a href="">Create an account</a>
                    </li>
                    <li>
                        <a href="">Log in</a>
                    </li>
                </ul>
                <ul class="social-icons nav-x mt-4">
                    <li>
                        <a href="#">
                            <i class="unicon-logo-medium icon-2"></i>
                        </a>
                        <a href="#">
                            <i class="unicon-logo-x-filled icon-2"></i>
                        </a>
                        <a href="#">
                            <i class="unicon-logo-instagram icon-2"></i>
                        </a>
                        <a href="#">
                            <i class="unicon-logo-pinterest icon-2"></i>
                        </a>
                    </li>
                </ul>
                <div class="py-2 hstack gap-2 mt-4 bg-white dark:bg-gray-900" data-uc-sticky="position: bottom">
                    <div class="vstack gap-1">
                        <span class="fs-7 opacity-60">Select theme:</span>
                        <div class="darkmode-trigger" data-darkmode-switch="">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider fs-5"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Header start -->
    <header class="uc-header header-default uc-navbar-sticky-wrap z-999 " style="--uc-nav-height: 80px"
        data-uc-sticky="start: 100vh; show-on-up: true; animation: uc-animation-slide-top; sel-target: .uc-navbar-container; cls-active: uc-navbar-sticky; cls-inactive: uc-navbar-transparent; end: !*;">
        <nav class="uc-navbar-container uc-navbar-float ft-tertiary z-1"
            data-anime="translateY: [-40, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 750; delay: 0;">
            <div class="container max-w-xl">
                <div class="uc-navbar min-h-64px lg:min-h-80px text-gray-900 dark:text-white"
                    data-uc-navbar="mode: click; animation: uc-animation-slide-top-small; duration: 150;">
                    <div class="uc-navbar-left">
                        <div class="uc-logo text-dark dark:text-white">
                            <a class="panel text-none" href="" style="width: 140px">
                                <img class="dark:d-none"
                                    src="{{ asset('assets/landing/images/common/logo-light.svg') }}"
                                    alt="{{ config('app.name') }}">
                                <img class="d-none dark:d-block"
                                    src="{{ asset('assets/landing/images/common/logo-dark.svg') }}"
                                    alt="{{ config('app.name') }}">
                            </a>
                        </div>
                        <ul class="uc-navbar-nav gap-3 xl:gap-4 d-none lg:d-flex fw-medium ms-2">
                            <li>
                                <a href="{{ route('home') }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home') }}">
                                    {{ __('About') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home') }}">
                                    {{ __('Pricing') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home') }}">
                                    {{ __('Contact') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="uc-navbar-right">
                        <div class="d-none lg:d-block">
                            <a class="text-none fw-medium" href="">
                                <span>Log in</span>
                            </a>
                        </div>
                        <a class="btn btn-sm btn-primary text-white text-none d-none lg:d-inline-flex" href="">
                            Start free trial
                        </a>
                        <a class="d-block lg:d-none" href="#uc-menu-panel" data-uc-navbar-toggle-icon
                            data-uc-toggle></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    {{ $slot }}

    <footer id="uc-footer" class="uc-footer panel overflow-hidden uc-dark">
        <div class="footer-outer py-4 lg:py-6 xl:py-9 dark:bg-gray-900 dark:text-white">
            <div class="container max-w-xl">
                <div class="footer-inner vstack gap-4 lg:gap-6 xl:gap-8">
                    <div class="uc-footer-widgets panel">
                        <div class="row child-cols-6 md:child-cols col-match g-4">
                            <div class="col-12 lg:col-4">
                                <div class="panel vstack items-start gap-4 ltr:md:pe-8 rtl:md:ps-8">
                                    <div class="vstack gap-2">
                                        <a href="">
                                            <img class="w-32px text-primary"
                                                src="{{ asset('assets/landing/images/common/logo-mark.svg') }}"
                                                alt="{{ config('app.name') }}">
                                        </a>
                                        <p>
                                            LANcraft Studio is an on-demand studio management system built specifically
                                            for dance studios and gym studios. It helps studio owners manage
                                            memberships, class schedules, trainers, and payments from one simple
                                            platform.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <ul class="nav-y gap-1 fw-medium">
                                    <li><a href="">About</a></li>
                                    <li><a href="">Pricing</a></li>
                                    <li><a href="">Features</a></li>
                                    <li><a href="">Integrations</a></li>
                                    <li><a href="">Career</a></li>
                                    <li><a href="">Contact</a></li>
                                    <li><a href="">Contact v2</a></li>
                                </ul>
                            </div>
                            <div>
                                <ul class="nav-y gap-1 fw-medium">
                                    <li><a href="">Shop</a></li>
                                    <li><a href="">With sidebar</a></li>
                                    <li><a href="">Product detail</a></li>
                                    <li><a href="">Product detail v2</a></li>
                                    <li><a href="">Cart</a></li>
                                    <li><a href="">Checkout</a></li>
                                    <li><a href="">Order confirmation</a></li>
                                </ul>
                            </div>
                            <div>
                                <ul class="nav-y gap-1 fw-medium">
                                    <li><a href="">Request a demo</a></li>
                                    <li><a href="">Sign in</a></li>
                                    <li><a href="">Sign in v2</a></li>
                                    <li><a href="">Sign up</a></li>
                                    <li><a href="">Sign up v2</a></li>
                                    <li><a href="">Reset password</a></li>
                                    <li><a href="">Reset password v2</a></li>
                                </ul>
                            </div>
                            <div>
                                <ul class="nav-y gap-1 fw-medium">
                                    <li><a href="">Blog</a></li>
                                    <li><a href="">Blog detail</a></li>
                                    <li><a href="">FAQ</a></li>
                                    <li><a href="">404</a></li>
                                    <li><a href="">Coming Soon</a></li>
                                    <li><a href="">Terms of service</a></li>
                                    <li><a href="">Privacy policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div
                        class="uc-footer-bottom panel vstack lg:hstack gap-4 justify-center lg:justify-between pt-4 lg:pt-6 border-top dark:text-white">
                        <div
                            class="vstack sm:hstack justify-center lg:justify-start items-center lg:items-start gap-1 lg:gap-2">
                            <p class="opacity-60">
                                {{ config('app.name') }} © {{ date('Y') }}, All rights reserved.
                            </p>
                            <ul class="nav-x gap-2 fw-medium">
                                <li>
                                    <a href="#">Privacy notice</a>
                                </li>
                                <li>
                                    <a href="#">Legal</a>
                                </li>
                                <li>
                                    <a href="#">Cookie settings</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hstack justify-center lg:justify-end gap-2 lg:gap-3">
                            <ul class="nav-x gap-2">
                                <li>
                                    <a href="#">
                                        <i class="icon icon-2 unicon-logo-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon icon-2 unicon-logo-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon icon-2 unicon-logo-x-filled"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon icon-2 unicon-logo-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon icon-2 unicon-logo-youtube"></i>
                                    </a>
                                </li>
                            </ul>
                            <div class="vr"></div>
                            <div class="d-inline-block">
                                <a href="#" class="hstack gap-1 text-none fw-medium">
                                    <i class="icon icon-1 unicon-earth-filled"></i>
                                    <span>English</span>
                                    <span data-uc-drop-parent-icon=""></span>
                                </a>
                                <div class="p-2 bg-white dark:bg-gray-800 shadow-xs rounded w-150px"
                                    data-uc-drop="mode: click; offset: 28; pos: top-right; boundary: !.uc-footer-bottom; animation: uc-animation-slide-top-small; duration: 150;">
                                    <ul class="nav-y gap-1 fw-medium items-end">
                                        <li><a href="#en">English</a></li>
                                        <li><a href="#ar">العربية</a></li>
                                        <li><a href="#ch">中文</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script defer src="{{ asset('assets/landing/js/libs/jquery.min.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/libs/bootstrap.min.js') }}"></script>

    <script defer src="{{ asset('assets/landing/js/libs/anime.min.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/libs/swiper-bundle.min.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/libs/scrollmagic.min.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/libs/typed.min.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/libs/tilt.min.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/libs/split-type.min.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/libs/prettify.min.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/libs/gsap.min.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/libs/smooth-scroll.min.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/core/magic-cursor.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/helpers/data-attr-helper.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/helpers/swiper-helper.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/helpers/splitype-helper.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/helpers/anime-helper.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/helpers/typed-helper.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/helpers/tilt-helper.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/core/marquee.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/uikit-components-bs.js') }}"></script>

    <script defer src="{{ asset('assets/landing/js/form.js') }}"></script>
    <script defer src="{{ asset('assets/landing/js/app.js') }}"></script>

    <script>
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const getSchema = urlParams.get('schema');
        if (getSchema === 'dark') {
            setDarkMode(1);
        } else if (getSchema === 'light') {
            setDarkMode(0);
        }
    </script>
</body>

</html>
