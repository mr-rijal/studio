<x-guest-layout for="auth" :page="__('Reset Password')">
    <form action="{{ route('password.store', absolute: false) }}" method="POST"
        class="d-flex justify-content-between flex-column p-4 pb-0">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div>
            <div class="mb-3">
                <h3 class="mb-2">{{ __('Reset Password') }}</h3>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Email Address') }}</label>
                <div class="input-group input-group-flat">
                    <input type="email" class="form-control" name="email"
                        value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
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
                    <input type="password" class="form-control pass-input" name="password" required
                        autocomplete="new-password">
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
                <label class="form-label">{{ __('Confirm Password') }}</label>
                <div class="input-group input-group-flat pass-group">
                    <input type="password" class="form-control pass-input" name="password_confirmation" required
                        autocomplete="new-password">
                    <span class="input-group-text toggle-password">
                        <i class="ti ti-eye-off"></i>
                    </span>
                </div>
                @error('password_confirmation')
                    <div class="text-danger">
                        <i class="ti ti-alert-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">{{ __('Reset Password') }}</button>
            </div>
        </div>
    </form>
</x-guest-layout>
