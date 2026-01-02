<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 - Page Expired</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --accent-color: #f39c12;
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
            margin-bottom: 1.5rem;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .instructions {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            text-align: left;
        }

        .instructions h3 {
            font-size: 1.1rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .instructions ol {
            padding-left: 1.5rem;
            margin-bottom: 0;
        }

        .instructions li {
            margin-bottom: 0.5rem;
            line-height: 1.6;
        }

        .btn-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-home,
        .btn-back {
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

        .btn-home:hover,
        .btn-back:hover {
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
        <div class="error-code">419</div>
        <h1 class="error-title">Page Expired</h1>
        <p class="error-message">
            Your security token has expired. This usually happens when a form was left open for too long or you
            navigated back in your browser.
        </p>
        <div class="instructions">
            <h3>What to do next:</h3>
            <ol>
                <li><strong>Go back</strong> to the previous page using your browser's back button</li>
                <li><strong>Refresh the page</strong> to get a new security token</li>
                <li><strong>Fill out the form again</strong> and submit it</li>
                <li>If the problem persists, try clearing your browser cache or use a different browser</li>
            </ol>
        </div>
        <div class="btn-group">
            <a href="javascript:history.back()" class="btn-back">Go Back</a>
            <a href="{{ url('/') }}" class="btn-home">Go Home</a>
        </div>
    </div>
</body>

</html>
