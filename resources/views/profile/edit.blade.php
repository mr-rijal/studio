<x-app-layout :page="__('Profile')">
    <div class="row">
        <div class="col-12">
            <!-- Profile Information Card -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <div class="d-flex align-items-center">
                        <div
                            class="avatar avatar-sm bg-primary text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                            <i class="ti ti-user fs-5"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-semibold">{{ __('Profile Information') }}</h5>
                            <small
                                class="text-muted">{{ __('Update your account\'s profile information and email address.') }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Card -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <div class="d-flex align-items-center">
                        <div
                            class="avatar avatar-sm bg-success text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                            <i class="ti ti-lock fs-5"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-semibold">{{ __('Update Password') }}</h5>
                            <small
                                class="text-muted">{{ __('Ensure your account is using a long, random password to stay secure.') }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
