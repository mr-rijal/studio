<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" id="profileForm">
    @csrf
    @method('put')

    <div class="row g-3">
        <!-- Avatar Upload -->
        <div class="col-12 mb-3">
            <label class="form-label fw-semibold">{{ __('Profile Picture') }}</label>
            <div class="profile-upload d-flex align-items-center gap-3">
                <div class="profile-upload-img position-relative">
                    @if ($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}"
                            class="preview1 it rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                        <button type="button"
                            class="profile-remove profile-remove-btn position-absolute top-0 start-0 bg-danger text-white border-0 rounded-circle"
                            style="width: 24px; height: 24px;" title="Remove">
                            <i class="ti ti-x fs-6"></i>
                        </button>
                    @else
                        <img src="" alt="{{ $user->name }}" class="preview1 rounded-circle"
                            style="width: 100px; height: 100px; object-fit: cover; display: none;">
                        <div class="avatar avatar-xl bg-primary text-white rounded-circle d-flex align-items-center justify-content-center default-avatar"
                            style="width: 100px; height: 100px;">
                            <span
                                class="fs-2">{{ strtoupper(substr($user->first_name ?? 'U', 0, 1) . substr($user->last_name ?? 'S', 0, 1)) }}</span>
                        </div>
                        <button type="button"
                            class="profile-remove position-absolute top-0 start-0 bg-danger text-white border-0 rounded-circle"
                            style="width: 24px; height: 24px; display: none;" title="Remove">
                            <i class="ti ti-x fs-6"></i>
                        </button>
                    @endif
                </div>
                <div class="profile-upload-content">
                    <label for="avatar" class="profile-upload-btn" style="cursor: pointer;">
                        <i class="ti ti-upload"></i>
                        {{ __('Upload Avatar') }}
                    </label>
                    <input type="file" class="input-img d-none" id="avatar" name="avatar" accept="image/*">
                    <p class="text-muted mb-0 small">{{ __('JPG, PNG or GIF. Max size 2MB') }}</p>
                </div>
            </div>
            @error('avatar')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- First Name -->
        <div class="col-md-6">
            <label for="first_name" class="form-label fw-semibold">
                {{ __('First Name') }} <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                    <i class="ti ti-user text-muted"></i>
                </span>
                <input type="text" class="form-control @error('first_name') is-invalid @enderror border-start-0"
                    id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}"
                    placeholder="{{ __('Enter first name') }}" required autofocus>
                @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Last Name -->
        <div class="col-md-6">
            <label for="last_name" class="form-label fw-semibold">
                {{ __('Last Name') }} <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                    <i class="ti ti-user text-muted"></i>
                </span>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror border-start-0"
                    id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                    placeholder="{{ __('Enter last name') }}" required>
                @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Email -->
        <div class="col-md-6">
            <label for="email" class="form-label fw-semibold">
                {{ __('Email Address') }} <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                    <i class="ti ti-mail text-muted"></i>
                </span>
                <input type="email" class="form-control @error('email') is-invalid @enderror border-start-0"
                    id="email" name="email" value="{{ old('email', $user->email) }}"
                    placeholder="{{ __('Enter email address') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-body mb-2">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification"
                            class="btn btn-link p-0 text-primary text-decoration-underline">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success small mb-0">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Phone -->
        <div class="col-md-6">
            <label for="phone" class="form-label fw-semibold">
                {{ __('Phone Number') }}
            </label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                    <i class="ti ti-phone text-muted"></i>
                </span>
                <input type="text" class="form-control @error('phone') is-invalid @enderror border-start-0"
                    id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                    placeholder="{{ __('Enter phone number') }}" maxlength="20">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="col-12">
            <div class="d-flex align-items-center gap-3">
                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-device-floppy me-1"></i>
                    {{ __('Save') }}
                </button>

                @if (session('status') === 'profile-updated')
                    <p class="text-success mb-0 small" id="profile-updated-message">
                        <i class="ti ti-check me-1"></i>{{ __('Saved.') }}
                    </p>
                    <script>
                        setTimeout(function() {
                            $('#profile-updated-message').fadeOut();
                        }, 3000);
                    </script>
                @endif
            </div>
        </div>
    </div>
</form>

@push('scripts')
    <script>
        $(document).ready(function() {
            // Handle avatar preview when file is selected
            $("#avatar").on('change', function() {
                var $input = $(this);
                var $profileUpload = $input.closest('.profile-upload');

                if (this.files && this.files[0]) {
                    // Validate file type
                    var fileType = this.files[0].type;
                    if (!fileType.match('image.*')) {
                        alert('{{ __('Please select an image file') }}');
                        $input.val('');
                        return;
                    }

                    // Validate file size (2MB = 2097152 bytes)
                    if (this.files[0].size > 2097152) {
                        alert('{{ __('Image size should be less than 2MB') }}');
                        $input.val('');
                        return;
                    }

                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Find elements fresh inside callback
                        var $imgControl = $profileUpload.find('.preview1');
                        var $defaultAvatar = $profileUpload.find('.default-avatar');
                        var $removeBtn = $profileUpload.find('.profile-remove');

                        // Set image source and show it
                        $imgControl.attr('src', e.target.result);
                        $imgControl.addClass('it').css({
                            'display': 'block',
                            'width': '100px',
                            'height': '100px',
                            'object-fit': 'cover'
                        });

                        // Hide default avatar if it exists
                        if ($defaultAvatar.length > 0) {
                            $defaultAvatar.attr('style', 'display: none !important;');
                        }

                        // Show and style remove button
                        $removeBtn.addClass('profile-remove-btn');
                        $removeBtn.css('display', 'block');
                    };
                    reader.onerror = function() {
                        alert('{{ __('Error reading file') }}');
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // Handle remove avatar button
            $(".profile-remove").on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var profileUpload = $(this).closest('.profile-upload');
                var imgControl = profileUpload.find(".preview1");
                var defaultAvatar = profileUpload.find('.default-avatar');
                var input = profileUpload.find("#avatar");
                var removeBtn = $(this);

                input.val("");

                // If there's a default avatar, show it; otherwise hide the image
                if (defaultAvatar.length) {
                    imgControl.removeClass('it').hide();
                    defaultAvatar.show();
                } else {
                    // If there was an existing avatar, just hide the preview
                    imgControl.removeClass('it').hide();
                }
                removeBtn.removeClass('profile-remove-btn').hide();
            });

            // Ensure label click triggers file input (backup in case for attribute doesn't work)
            $(".profile-upload-btn").on('click', function(e) {
                e.preventDefault();
                $("#avatar").trigger('click');
            });
        });
    </script>
@endpush
