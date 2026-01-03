<x-app-layout :page="$branch ? __('Edit Branch') : __('Add New Branch')">
    <div class="content pb-0">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">
                    {{ $branch ? __('Edit Branch') : __('Add New Branch') }}
                </h4>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="{{ $branch ? route('branches.show', $branch) : route('branches.index') }}"
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

        <form action="{{ $branch ? route('branches.update', $branch) : route('branches.store') }}" method="POST"
            id="branchForm">
            @csrf
            @if ($branch)
                @method('PUT')
            @endif

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <div class="d-flex align-items-center">
                        <div
                            class="avatar avatar-sm bg-warning text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                            <i class="ti ti-building-store fs-5"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-semibold">{{ __('Branch Information') }}</h5>
                            <small class="text-muted">{{ __('Basic details about the branch') }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-semibold">
                                {{ __('Name') }} <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ti ti-building-store text-muted"></i>
                                </span>
                                <input type="text"
                                    class="form-control @error('name') is-invalid @enderror border-start-0"
                                    id="name" name="name" value="{{ old('name', $branch->name ?? '') }}"
                                    placeholder="{{ __('Enter branch name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="address_line_1" class="form-label fw-semibold">
                                {{ __('Address Line 1') }} <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ti ti-map-pin text-muted"></i>
                                </span>
                                <input type="text"
                                    class="form-control @error('address_line_1') is-invalid @enderror border-start-0"
                                    id="address_line_1" name="address_line_1"
                                    value="{{ old('address_line_1', $branch->address_line_1 ?? '') }}"
                                    placeholder="{{ __('Enter address line 1') }}" required>
                                @error('address_line_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="address_line_2" class="form-label fw-semibold">
                                {{ __('Address Line 2') }}
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ti ti-map-pin text-muted"></i>
                                </span>
                                <input type="text"
                                    class="form-control @error('address_line_2') is-invalid @enderror border-start-0"
                                    id="address_line_2" name="address_line_2"
                                    value="{{ old('address_line_2', $branch->address_line_2 ?? '') }}"
                                    placeholder="{{ __('Enter address line 2') }}">
                                @error('address_line_2')
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
                                    id="city" name="city" value="{{ old('city', $branch->city ?? '') }}"
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
                                    id="state" name="state" value="{{ old('state', $branch->state ?? '') }}"
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
                                    id="zip" name="zip" value="{{ old('zip', $branch->zip ?? '') }}"
                                    placeholder="{{ __('Enter zip code') }}" required>
                                @error('zip')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label fw-semibold">
                                {{ __('Phone') }} <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ti ti-phone text-muted"></i>
                                </span>
                                <input type="text"
                                    class="form-control @error('phone') is-invalid @enderror border-start-0"
                                    id="phone" name="phone" value="{{ old('phone', $branch->phone ?? '') }}"
                                    placeholder="{{ __('Enter phone number') }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">
                                {{ __('Email') }} <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ti ti-mail text-muted"></i>
                                </span>
                                <input type="email"
                                    class="form-control @error('email') is-invalid @enderror border-start-0"
                                    id="email" name="email" value="{{ old('email', $branch->email ?? '') }}"
                                    placeholder="{{ __('Enter email address') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label fw-semibold">
                                {{ __('Status') }}
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ti ti-toggle-left text-muted"></i>
                                </span>
                                <select class="form-select @error('status') is-invalid @enderror border-start-0"
                                    id="status" name="status">
                                    <option value="1"
                                        {{ old('status', $branch->status ?? 1) == 1 ? 'selected' : '' }}>
                                        {{ __('Active') }}
                                    </option>
                                    <option value="0"
                                        {{ old('status', $branch->status ?? 0) == 0 ? 'selected' : '' }}>
                                        {{ __('Inactive') }}
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between gap-3 pt-3 mb-2 border-top">
                <a href="{{ $branch ? route('branches.show', $branch) : route('branches.index') }}"
                    class="btn btn-outline-secondary">
                    <i class="ti ti-x me-1"></i>{{ __('Cancel') }}
                </a>
                <button type="submit" class="btn btn-primary px-4">
                    <i class="ti ti-{{ $branch ? 'device-floppy' : 'plus' }} me-1"></i>
                    {{ $branch ? __('Update Branch') : __('Create Branch') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
