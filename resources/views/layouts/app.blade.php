<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LANcraft Technologies">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-icon.png') }}">
    <script src="{{ asset('assets/js/theme-script.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/simplebar/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="app-style">
    <style>
        /* Enhanced Breadcrumb Styles */
        .breadcrumb {
            padding: 0.625rem 1rem;
            margin: 0;
            display: inline-flex;
            align-items: center;
            font-size: 0.875rem;
        }

        .breadcrumb-item {
            display: flex;
            align-items: center;
            color: #6c757d;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .breadcrumb-item a {
            color: #495057;
            text-decoration: none;
            transition: all 0.2s ease;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            display: inline-block;
        }

        .breadcrumb-item a:hover {
            color: var(--bs-primary, #0d6efd);
            background-color: rgba(13, 110, 253, 0.1);
            transform: translateY(-1px);
        }

        .breadcrumb-item.active {
            color: #212529;
            font-weight: 600;
            padding: 0.25rem 0.5rem;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            content: "\ea65";
            font-family: "tabler-icons";
            color: #adb5bd;
            padding: 0 0.75rem;
            font-size: 0.75rem;
            opacity: 0.7;
        }

        /* Dark mode support */
        [data-bs-theme="dark"] .breadcrumb {
            background: #1a1d29;
            border-color: #2d3142;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        [data-bs-theme="dark"] .breadcrumb-item {
            color: #adb5bd;
        }

        [data-bs-theme="dark"] .breadcrumb-item a {
            color: #ced4da;
        }

        [data-bs-theme="dark"] .breadcrumb-item a:hover {
            background-color: rgba(13, 110, 253, 0.2);
        }

        [data-bs-theme="dark"] .breadcrumb-item.active {
            color: #ffffff;
        }

        [data-bs-theme="dark"] .breadcrumb-item+.breadcrumb-item::before {
            color: #6c757d;
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="main-wrapper">
        @include('layouts.header')
        @include('layouts.navigation')
        <div class="page-wrapper">
            <div class="content pb-0">
                <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
                    <div>
                        <h4 class="mb-1">{{ $page }}</h4>
                    </div>
                    <div class="gap-2 d-flex align-items-center flex-wrap">
                        {{-- breadcrumb --}}
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{ $page }}</li>
                        </ul>
                    </div>
                </div>

                {{ $slot }}

            </div>

            <footer class="footer d-block d-md-flex justify-content-between text-md-start text-center">
                <p class="mb-md-0 mb-1">
                    Copyright &copy; {{ date('Y') }} -
                    <a href="javascript:void(0);"
                        class="link-primary text-decoration-underline">{{ config('app.name') }}</a>
                </p>
                <div class="d-flex align-items-center gap-2 footer-links justify-content-center justify-content-md-end">
                    <a href="{{ route('t.about') }}">About</a>
                    <a href="{{ route('t.terms') }}">Terms</a>
                    <a href="{{ route('t.contact') }}">Contact Us</a>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/peity/chart-data.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/jsonscript.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @stack('scripts')
</body>

</html>
