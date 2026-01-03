<x-app-layout :page="$policy ? __('Edit Policy') : __('Add New Policy')">
    <div class="content pb-0">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">
                    {{ $policy ? __('Edit Policy') : __('Add New Policy') }}
                </h4>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="{{ $policy ? route('policies.show', $policy) : route('policies.index') }}"
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

        <form action="{{ $policy ? route('policies.update', $policy) : route('policies.store') }}" method="POST"
            id="policyForm">
            @csrf
            @if ($policy)
                @method('PUT')
            @endif

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <div class="d-flex align-items-center">
                        <div
                            class="avatar avatar-sm bg-info text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                            <i class="ti ti-file-text fs-5"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-semibold">{{ __('Policy Information') }}</h5>
                            <small class="text-muted">{{ __('Basic details about the policy') }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="title" class="form-label fw-semibold">
                                {{ __('Policy Title') }} <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ti ti-file-text text-muted"></i>
                                </span>
                                <input type="text"
                                    class="form-control @error('title') is-invalid @enderror border-start-0"
                                    id="title" name="title" value="{{ old('title', $policy->title ?? '') }}"
                                    placeholder="{{ __('Enter policy title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label fw-semibold">
                                {{ __('Description') }}
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 align-items-start pt-2">
                                    <i class="ti ti-file-text text-muted"></i>
                                </span>
                                <textarea class="form-control @error('description') is-invalid @enderror border-start-0" id="description"
                                    name="description" rows="4" placeholder="{{ __('Enter policy description') }}">{{ old('description', $policy->description ?? '') }}</textarea>
                                @error('description')
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
                                        {{ old('status', $policy->status ?? 1) == 1 ? 'selected' : '' }}>
                                        {{ __('Active') }}
                                    </option>
                                    <option value="0"
                                        {{ old('status', $policy->status ?? 0) == 0 ? 'selected' : '' }}>
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
                <a href="{{ $policy ? route('policies.show', $policy) : route('policies.index') }}"
                    class="btn btn-outline-secondary">
                    <i class="ti ti-x me-1"></i>{{ __('Cancel') }}
                </a>
                <button type="submit" class="btn btn-primary px-4">
                    <i class="ti ti-{{ $policy ? 'device-floppy' : 'plus' }} me-1"></i>
                    {{ $policy ? __('Update Policy') : __('Create Policy') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
