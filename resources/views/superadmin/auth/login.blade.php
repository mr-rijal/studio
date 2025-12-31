<x-guest-layout :page="__('Login')" for="superadmin">
    <form method="POST" action="{{ route('s.login', absolute: false) }}"
        class=" vh-100 d-flex justify-content-between flex-column p-4 pb-0">
        @csrf
        <div class="text-center mb-4 auth-logo">
            <img src="{{ asset('assets/img/logo.svg') }}" class="img-fluid" alt="Logo">
        </div>
        <div>
            <div class="mb-3">
                <h3 class="mb-2">{{ __('Sign In') }}</h3>
                <p class="mb-2">
                    {{ __('Access the Superadmin panel using your email and password.') }}
                </p>
                @if (session('error'))
                    <div class="alert alert-danger">
                        <i class="ti ti-alert-circle"></i>
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        <i class="ti ti-check"></i>
                        {{ session('success') }}
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
                @error('email')
                    <div class="text-danger">
                        <i class="ti ti-alert-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Password') }}</label>
                <div class="input-group input-group-flat pass-group">
                    <input type="password" class="form-control pass-input" name="password">
                    <span class="input-group-text toggle-password ">
                        <i class="ti ti-eye-off"></i>
                    </span>
                </div>
                @error('password')
                    <div class="text-danger">
                        <i class="ti ti-alert-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="form-check form-check-md d-flex align-items-center">
                    <input class="form-check-input mt-0" type="checkbox" id="checkebox-md" name="remember">
                    <label class="form-check-label text-dark ms-1" for="checkebox-md">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <div class="text-end">
                    <a href="{{ route('s.password.request', absolute: false) }}"
                        class="link-danger fw-medium link-hover">{{ __('Forgot Password?') }}</a>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">{{ __('Sign In') }}</button>
            </div>
            @if ($canRegisterSuperadmin)
                <div class="mb-3">
                    <p class="mb-0">
                        {{ __('New on our platform?') }}
                        <a href="{{ route('s.register', absolute: false) }}"
                            class="link-indigo fw-bold link-hover">{{ __('Create an account') }}</a>
                    </p>
                </div>
            @endif
        </div>
        <div class="text-center pb-4">
            <p class="text-dark mb-0">
                Copyright &copy; {{ date('Y') }} - {{ config('app.name') }}
            </p>
        </div>
    </form>
</x-guest-layout>
