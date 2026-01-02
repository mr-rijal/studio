<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Login Verification Code') }}</title>
</head>

<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2>{{ __('Your Login Verification Code') }}</h2>

        <p>{{ __('Hello') }} {{ $user->first_name }} {{ $user->last_name }},</p>

        <p>{{ __('You have requested to log in to your account. Please use the following verification code to complete your login:') }}
        </p>

        <div
            style="background-color: #f5f5f5; border: 2px solid #007bff; border-radius: 8px; padding: 20px; text-align: center; margin: 30px 0;">
            <h1 style="margin: 0; font-size: 36px; letter-spacing: 8px; color: #007bff; font-weight: bold;">
                {{ $otpCode }}
            </h1>
        </div>

        <p>{{ __('This code will expire in 10 minutes.') }}</p>

        <p>{{ __('If you did not attempt to log in, please ignore this email or contact support if you have concerns.') }}
        </p>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #eee;">

        <p style="color: #666; font-size: 12px;">
            {{ __('For security reasons, never share this code with anyone.') }}
        </p>
    </div>
</body>

</html>
