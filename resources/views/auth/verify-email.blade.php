<x-guest-layout for="auth" :page="__('Verify Email')">
    <div class="d-flex justify-content-between flex-column p-4 pb-0">
        <div>
            <div class="mb-3">
                <h3 class="mb-2">{{ __('Verify Your Email') }}</h3>
                <p class="text-muted mb-0">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success mb-3">
                    <i class="ti ti-check-circle"></i>
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mb-3">
                <form method="POST" action="{{ route('verification.send', absolute: false) }}">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>
            </div>

            <div class="text-center">
                <form method="POST" action="{{ route('logout', absolute: false) }}">
                    @csrf
                    <button type="submit" class="btn btn-link text-danger p-0">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
