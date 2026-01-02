<x-guest-layout for="auth" :page="__('Login')">
    <form action="{{ route('login', absolute: false) }}" method="POST"
        class="d-flex justify-content-between flex-column p-4 pb-0">
        @csrf
        <div>
            <div class="mb-3">
                <h3 class="mb-2">{{ __('Sign In') }}</h3>
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
                    <input class="form-check-input mt-0" type="checkbox" name="remember" id="checkebox-md">
                    <label class="form-check-label text-dark ms-1" for="checkebox-md">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <div class="text-end">
                    <a href="{{ route('password.request', absolute: false) }}"
                        class="link-danger fw-medium link-hover">{{ __('Forgot Password?') }}</a>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">{{ __('Sign In') }}</button>
            </div>
        </div>
    </form>
</x-guest-layout>
