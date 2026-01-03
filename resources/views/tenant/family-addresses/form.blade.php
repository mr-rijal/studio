<x-app-layout :page="$familyAddress ? __('Edit Family Address') : __('Add New Family Address')">
    <div class="content pb-0">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">
                    {{ $familyAddress ? __('Edit Family Address') : __('Add New Family Address') }}
                </h4>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="{{ $familyAddress ? route('family-addresses.show', $familyAddress) : route('family-addresses.index') }}"
                    class="btn btn-outline-light">
                    <i class="ti ti-arrow-left me-1"></i>{{ __('Cancel') }}
                </a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ __('Please fix the following errors:') }}</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form
            action="{{ $familyAddress ? route('family-addresses.update', $familyAddress) : route('family-addresses.store') }}"
            method="POST" id="familyAddressForm">
            @csrf
            @if ($familyAddress)
                @method('PUT')
            @endif

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <div class="d-flex align-items-center">
                        <div
                            class="avatar avatar-sm bg-success text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                            <i class="ti ti-home fs-5"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-semibold">{{ __('Family Address Information') }}</h5>
                            <small class="text-muted">{{ __('Address details for the family') }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="family_id" class="form-label fw-semibold">
                                {{ __('Family') }} <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ti ti-users text-muted"></i>
                                </span>
                                <select class="form-select @error('family_id') is-invalid @enderror border-start-0"
                                    id="family_id" name="family_id" required>
                                    <option value="">{{ __('Select Family') }}</option>
                                    @foreach ($families as $family)
                                        <option value="{{ $family->id }}"
                                            {{ old('family_id', $familyAddress->family_id ?? '') == $family->id ? 'selected' : '' }}>
                                            {{ __('Family') }} #{{ $family->id }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('family_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="home_address" class="form-label fw-semibold">
                                {{ __('Home Address') }} <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ti ti-map-pin text-muted"></i>
                                </span>
                                <input type="text"
                                    class="form-control @error('home_address') is-invalid @enderror border-start-0"
                                    id="home_address" name="home_address"
                                    value="{{ old('home_address', $familyAddress->home_address ?? '') }}"
                                    placeholder="{{ __('Enter home address') }}" required>
                                @error('home_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="city" class="form-label fw-semibold">
                                {{ __('City') }} <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ti ti-building text-muted"></i>
                                </span>
                                <input type="text"
                                    class="form-control @error('city') is-invalid @enderror border-start-0"
                                    id="city" name="city" value="{{ old('city', $familyAddress->city ?? '') }}"
                                    placeholder="{{ __('Enter city') }}" required>
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="state" class="form-label fw-semibold">
                                {{ __('State') }} <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ti ti-map text-muted"></i>
                                </span>
                                <input type="text"
                                    class="form-control @error('state') is-invalid @enderror border-start-0"
                                    id="state" name="state"
                                    value="{{ old('state', $familyAddress->state ?? '') }}"
                                    placeholder="{{ __('Enter state') }}" required>
                                @error('state')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="zip" class="form-label fw-semibold">
                                {{ __('Zip') }} <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ti ti-mail text-muted"></i>
                                </span>
                                <input type="text"
                                    class="form-control @error('zip') is-invalid @enderror border-start-0"
                                    id="zip" name="zip" value="{{ old('zip', $familyAddress->zip ?? '') }}"
                                    placeholder="{{ __('Enter zip code') }}" required>
                                @error('zip')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between gap-3 pt-3 mb-2 border-top">
                <a href="{{ $familyAddress ? route('family-addresses.show', $familyAddress) : route('family-addresses.index') }}"
                    class="btn btn-outline-secondary">
                    <i class="ti ti-x me-1"></i>{{ __('Cancel') }}
                </a>
                <button type="submit" class="btn btn-primary px-4">
                    <i class="ti ti-{{ $familyAddress ? 'device-floppy' : 'plus' }} me-1"></i>
                    {{ $familyAddress ? __('Update Family Address') : __('Create Family Address') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
