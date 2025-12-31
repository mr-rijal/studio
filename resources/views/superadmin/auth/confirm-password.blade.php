<x-guest-layout :page="__('Confirm Password')" for="superadmin">
    <form method="POST" action="{{ route('s.password.confirm', absolute: false) }}"
        class=" vh-100 d-flex justify-content-between flex-column p-4 pb-0">
        @csrf
        <div class="text-center mb-4 auth-logo">
            <img src="{{ asset('assets/img/logo.svg') }}" class="img-fluid" alt="Logo">
        </div>
        <div>
            <div class="mb-3">
                <h3 class="mb-2">{{ __('Confirm Password') }}</h3>
                <p class="mb-0">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </p>
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
                <button type="submit" class="btn btn-primary w-100">{{ __('Confirm') }}</button>
            </div>
        </div>
        <div class="text-center pb-4">
            <p class="text-dark mb-0">
                Copyright &copy; {{ date('Y') }} - {{ config('app.name') }}
            </p>
        </div>
    </form>
</x-guest-layout>
