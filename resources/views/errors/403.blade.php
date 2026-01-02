<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Forbidden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --accent-color: #e74c3c;
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
            background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 50%, var(--accent-color) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-container {
            text-align: center;
            color: white;
            padding: 2rem;
        }

        .error-code {
            font-size: 8rem;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .error-title {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .error-message {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-home {
            background-color: white;
            color: var(--primary-color);
            padding: 12px 40px;
            font-weight: 600;
            border-radius: 50px;
            border: none;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            color: var(--accent-color);
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 5rem;
            }

            .error-title {
                font-size: 1.8rem;
            }

            .error-message {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="error-container">
        <div class="error-code">403</div>
        <h1 class="error-title">Access Forbidden</h1>
        <p class="error-message">
            You don't have permission to access this resource.
            Please contact the administrator if you believe this is an error.
        </p>
        <a href="{{ url('/') }}" class="btn-home">Go Home</a>
    </div>
</body>

</html>
