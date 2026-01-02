<x-guest-layout for="auth" :page="__('Confirm Password')">
    <form action="{{ route('password.confirm', absolute: false) }}" method="POST"
        class="d-flex justify-content-between flex-column p-4 pb-0">
        @csrf
        <div>
            <div class="mb-3">
                <h3 class="mb-2">{{ __('Confirm Password') }}</h3>
                <p class="text-muted mb-0">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </p>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Password') }}</label>
                <div class="input-group input-group-flat pass-group">
                    <input type="password" class="form-control pass-input" name="password" required
                        autocomplete="current-password">
                    <span class="input-group-text toggle-password">
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
            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">{{ __('Confirm') }}</button>
            </div>
        </div>
    </form>
</x-guest-layout>
