<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('User Invitation') }}</title>
</head>

<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2>{{ __('You have been invited!') }}</h2>

        <p>{{ __('Hello') }} {{ $user->first_name }} {{ $user->last_name }},</p>

        <p>{{ __('You have been invited to join') }} {{ $user->company->name ?? __('our platform') }}.</p>

        <p>{{ __('Please click the link below to set your password and complete your account setup:') }}</p>

        <p style="margin: 30px 0;">
            <a href="{{ $resetUrl }}"
                style="background-color: #007bff; color: white; padding: 12px 24px; text-decoration: none; border-radius: 4px; display: inline-block;">
                {{ __('Set Password & Complete Setup') }}
            </a>
        </p>

        <p>{{ __('This invitation link will expire in 7 days.') }}</p>

        <p>{{ __('If you did not expect this invitation, please ignore this email.') }}</p>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #eee;">

        <p style="color: #666; font-size: 12px;">
            {{ __('If you\'re having trouble clicking the button, copy and paste this URL into your browser:') }}<br>
            <a href="{{ $resetUrl }}">{{ $resetUrl }}</a>
        </p>
    </div>
</body>

</html>
