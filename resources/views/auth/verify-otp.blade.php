<x-guest-layout for="auth" :page="__('Verify Login Code')">
    <form action="{{ route('verify-otp', absolute: false) }}" method="POST"
        class="d-flex justify-content-between flex-column p-4 pb-0">
        @csrf
        <div>
            <div class="mb-3">
                <h3 class="mb-2">{{ __('Verify Your Login') }}</h3>
                <p class="text-muted mb-0">
                    {{ __('We\'ve sent a 6-digit verification code to') }} <strong>{{ $email }}</strong>.
                    {{ __('Please enter the code below to complete your login.') }}
                </p>
            </div>

            @if (session('success'))
                <div class="alert alert-success mb-3">
                    <i class="ti ti-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger mb-3">
                    <i class="ti ti-alert-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label">{{ __('Verification Code') }}</label>
                <div class="input-group input-group-flat">
                    <input type="text" class="form-control text-center" name="otp_code" id="otp_code"
                        value="{{ old('otp_code') }}" maxlength="6" pattern="[0-9]{6}" inputmode="numeric" autofocus
                        required>
                    <span class="input-group-text">
                        <i class="ti ti-key"></i>
                    </span>
                </div>
                @error('otp_code')
                    <div class="text-danger mt-1">
                        <i class="ti ti-alert-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
                <small class="text-muted d-block mt-1">
                    {{ __('Enter the 6-digit code sent to your email.') }}
                </small>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">{{ __('Verify & Continue') }}</button>
            </div>

            <div class="text-center">
                <form method="POST" action="{{ route('verify-otp.resend', absolute: false) }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link text-primary p-0">
                        {{ __('Resend Code') }}
                    </button>
                </form>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('login', absolute: false) }}" class="text-muted small">
                    {{ __('Back to Login') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>

<script>
    // Auto-format OTP input to only accept numbers
    document.getElementById('otp_code').addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
