<x-guest-layout :page="__('Forgot Password')" for="superadmin">
    <form method="POST" action="{{ route('s.password.email', absolute: false) }}"
        class=" vh-100 d-flex justify-content-between flex-column p-4 pb-0">
        @csrf
        <div class="text-center mb-4 auth-logo">
            <img src="{{ asset('assets/img/logo.svg') }}" class="img-fluid" alt="Logo">
        </div>
        <div>
            <div class="mb-3">
                <h3 class="mb-2">{{ __('Forgot Password') }}</h3>
                <p class="mb-2">
                    {{ __('Enter your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>
                @if (session('error'))
                    <div class="alert alert-danger">
                        <i class="ti ti-alert-circle"></i>
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('status') == 'password-reset-link-sent')
                    <div class="alert alert-success">
                        <i class="ti ti-check"></i>
                        {{ __('A password reset link has been sent to your email address.') }}
                    </div>
                @elseif (session('status') == 'password-reset-link-failed')
                    <div class="alert alert-danger">
                        <i class="ti ti-alert-circle"></i>
                        {{ __('Failed to send password reset link. Please try again.') }}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Email Address') }}</label>
                <div class="input-group input-group-flat">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    <span class="input-group-text">
                        <i class="ti ti-mail"></i>
                    </span>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">{{ __('Email Password Reset Link') }}</button>
            </div>
        </div>
        <div class="text-center pb-4">
            <p class="text-dark mb-0">
                Copyright &copy; {{ date('Y') }} - {{ config('app.name') }}
            </p>
        </div>
    </form>
</x-guest-layout>
