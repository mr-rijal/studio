<x-guest-layout :page="__('Register')" for="superadmin">
    <form method="POST" action="{{ route('s.register', absolute: false) }}"
        class=" vh-100 d-flex justify-content-between flex-column p-4 pb-0">
        @csrf
        <div class="text-center mb-4 auth-logo">
            <img src="{{ asset('assets/img/logo.svg') }}" class="img-fluid" alt="Logo">
        </div>
        <div>
            <div class="mb-3">
                <h3 class="mb-2">{{ __('Register') }}</h3>
                <p class="mb-0">
                    {{ __('Create a new Superadmin account using your email and password.') }}
                </p>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Name') }}</label>
                <div class="input-group input-group-flat">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    <span class="input-group-text">
                        <i class="ti ti-user"></i>
                    </span>
                </div>
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
                <label class="form-label">{{ __('Password') }}</label>
                <div class="input-group input-group-flat pass-group">
                    <input type="password" class="form-control pass-input" name="password">
                    <span class="input-group-text toggle-password ">
                        <i class="ti ti-eye-off"></i>
                    </span>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Confirm Password') }}</label>
                <div class="input-group input-group-flat pass-group">
                    <input type="password" class="form-control pass-input" name="password_confirmation">
                    <span class="input-group-text toggle-password ">
                        <i class="ti ti-eye-off"></i>
                    </span>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">{{ __('Register') }}</button>
            </div>
        </div>
        <div class="text-center pb-4">
            <p class="text-dark mb-0">
                Copyright &copy; {{ date('Y') }} - {{ config('app.name') }}
            </p>
        </div>
    </form>
</x-guest-layout>
