<form method="post" action="{{ route('password.update') }}" class="needs-validation" novalidate>
    @csrf
    @method('put')

    <div class="row g-3">
        <!-- Current Password -->
        <div class="col-12">
            <label for="update_password_current_password" class="form-label fw-semibold">
                {{ __('Current Password') }} <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                    <i class="ti ti-lock text-muted"></i>
                </span>
                <input type="password"
                    class="form-control {{ $errors->updatePassword->has('current_password') ? 'is-invalid' : '' }} border-start-0"
                    id="update_password_current_password" name="current_password"
                    placeholder="{{ __('Enter current password') }}" autocomplete="current-password" required>
                @if ($errors->updatePassword->has('current_password'))
                    <div class="invalid-feedback">{{ $errors->updatePassword->first('current_password') }}</div>
                @endif
            </div>
        </div>

        <!-- New Password -->
        <div class="col-md-6">
            <label for="update_password_password" class="form-label fw-semibold">
                {{ __('New Password') }} <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                    <i class="ti ti-key text-muted"></i>
                </span>
                <input type="password"
                    class="form-control {{ $errors->updatePassword->has('password') ? 'is-invalid' : '' }} border-start-0"
                    id="update_password_password" name="password" placeholder="{{ __('Enter new password') }}"
                    autocomplete="new-password" required>
                @if ($errors->updatePassword->has('password'))
                    <div class="invalid-feedback">{{ $errors->updatePassword->first('password') }}</div>
                @endif
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="col-md-6">
            <label for="update_password_password_confirmation" class="form-label fw-semibold">
                {{ __('Confirm Password') }} <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                    <i class="ti ti-key text-muted"></i>
                </span>
                <input type="password"
                    class="form-control {{ $errors->updatePassword->has('password_confirmation') ? 'is-invalid' : '' }} border-start-0"
                    id="update_password_password_confirmation" name="password_confirmation"
                    placeholder="{{ __('Confirm new password') }}" autocomplete="new-password" required>
                @if ($errors->updatePassword->has('password_confirmation'))
                    <div class="invalid-feedback">{{ $errors->updatePassword->first('password_confirmation') }}</div>
                @endif
            </div>
        </div>

        <!-- Submit Button -->
        <div class="col-12">
            <div class="d-flex align-items-center gap-3">
                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-device-floppy me-1"></i>
                    {{ __('Save') }}
                </button>

                @if (session('status') === 'password-updated')
                    <p class="text-success mb-0 small" id="password-updated-message">
                        <i class="ti ti-check me-1"></i>{{ __('Saved.') }}
                    </p>
                    <script>
                        setTimeout(function() {
                            $('#password-updated-message').fadeOut();
                        }, 3000);
                    </script>
                @endif
            </div>
        </div>
    </div>
</form>
