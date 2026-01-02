<x-guest-layout for="auth" :page="__('Forgot Password')">
    <form action="{{ route('password.email', absolute: false) }}" method="POST"
        class="d-flex justify-content-between flex-column p-4 pb-0">
        @csrf
        <div>
            <div class="mb-3">
                <h3 class="mb-2">{{ __('Forgot Password') }}</h3>
                <p class="text-muted mb-0">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>
            </div>
            @if (session('status'))
                <div class="alert alert-success mb-3">
                    <i class="ti ti-check-circle"></i>
                    {{ session('status') }}
                </div>
            @endif
            <div class="mb-3">
                <label class="form-label">{{ __('Email Address') }}</label>
                <div class="input-group input-group-flat">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required
                        autofocus>
                    <span class="input-group-text">
                        <i class="ti ti-mail"></i>
                    </span>
                </div>
                @error('email')
                    <div class="text-danger">
                        <i class="ti ti-alert-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">{{ __('Email Password Reset Link') }}</button>
            </div>
            <div class="text-center">
                <a href="{{ route('login', absolute: false) }}" class="link-primary fw-medium link-hover">
                    {{ __('Back to Login') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
