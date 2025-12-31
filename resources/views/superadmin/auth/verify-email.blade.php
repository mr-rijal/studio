<x-guest-layout :page="__('Verify Email')" for="superadmin">
    <div class=" vh-100 d-flex justify-content-between flex-column p-4 pb-0">
        <div class="text-center mb-4 auth-logo">
            <img src="{{ asset('assets/img/logo.svg') }}" class="img-fluid" alt="Logo">
        </div>
        <div>
            <div class="mb-3">
                <h3 class="mb-2">{{ __('Verify Email') }}</h3>
                <p class="mb-3">
                    {{ __('Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </p>
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success">
                        <i class="ti ti-check"></i>
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <form method="POST" action="{{ route('s.verification.send', absolute: false) }}">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>
            </div>
            <div class="mb-3">
                <form method="POST" action="{{ route('s.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
        <div class="text-center pb-4">
            <p class="text-dark mb-0">
                Copyright &copy; {{ date('Y') }} - {{ config('app.name') }}
            </p>
        </div>
    </div>
</x-guest-layout>
