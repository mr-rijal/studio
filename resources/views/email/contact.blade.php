<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #2c3e50;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 50%, #3498db 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }

        .field {
            margin-bottom: 20px;
        }

        .field-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
            display: block;
        }

        .field-value {
            background-color: white;
            padding: 12px;
            border-radius: 5px;
            border-left: 4px solid #3498db;
        }

        .message-field {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #3498db;
            white-space: pre-wrap;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #7f8c8d;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>New Contact Form Submission</h1>
    </div>
    <div class="content">
        <div class="field">
            <span class="field-label">Name:</span>
            <div class="field-value">{{ $name }}</div>
        </div>

        <div class="field">
            <span class="field-label">Email:</span>
            <div class="field-value">
                <a href="mailto:{{ $email }}">{{ $email }}</a>
            </div>
        </div>

        @if ($phone)
            <div class="field">
                <span class="field-label">Phone:</span>
                <div class="field-value">{{ $phone }}</div>
            </div>
        @endif

        <div class="field">
            <span class="field-label">Subject:</span>
            <div class="field-value">{{ $subject }}</div>
        </div>

        <div class="field">
            <span class="field-label">Message:</span>
            <div class="message-field">{{ $contactMessage }}</div>
        </div>
    </div>
    <div class="footer">
        <p>This email was sent from the contact form on your website.</p>
    </div>
</body>

</html>
