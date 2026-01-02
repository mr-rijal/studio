<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        :root {
            --primary-color: #2c3e50;
            --accent-color: #3498db;
            --text-color: #2c3e50;
            --light-bg: #ecf0f1;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
        }

        /* Navbar Styling */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            letter-spacing: 0.5px;
        }

        .navbar-brand span {
            color: var(--accent-color);
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: white !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: var(--accent-color);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .btn-login {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 5px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-left: 0.5rem;
        }

        .btn-login:hover {
            background-color: #2980b9;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 50%, var(--accent-color) 100%);
            color: white;
            padding: 120px 0;
            text-align: center;
            min-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .hero-content p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.95;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-primary-custom {
            background-color: white;
            color: var(--primary-color);
            padding: 12px 40px;
            font-weight: 600;
            border-radius: 50px;
            border: none;
            transition: all 0.3s ease;
            margin: 0 0.5rem;
            font-size: 1rem;
            display: inline-block;
            cursor: pointer;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            color: var(--accent-color);
        }

        .btn-secondary-custom {
            background-color: transparent;
            color: white;
            padding: 12px 40px;
            font-weight: 600;
            border-radius: 50px;
            border: 2px solid white;
            transition: all 0.3s ease;
            margin: 0 0.5rem;
            font-size: 1rem;
            display: inline-block;
            cursor: pointer;
        }

        .btn-secondary-custom:hover {
            background-color: white;
            color: var(--primary-color);
            transform: translateY(-3px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .hero {
                padding: 80px 0;
                min-height: auto;
            }

            .btn-login {
                margin-top: 1rem;
                margin-left: 0;
            }

            .navbar-nav {
                padding-top: 1rem;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('t.home') }}">
                {{ company(request())->name }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('t.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('t.about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('t.terms') }}">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('t.privacy-policy') }}">Policies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('t.contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-login" href="{{ route('t.family-registration') }}">Family Registration</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{ $slot }}

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
