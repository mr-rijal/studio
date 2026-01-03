<x-app-layout :page="$category ? __('Edit Category') : __('Add New Category')">
    <div class="content pb-0">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">
                    {{ $category ? __('Edit Category') : __('Add New Category') }}
                </h4>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="{{ $category ? route('categories.show', $category) : route('categories.index') }}"
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

        <form action="{{ $category ? route('categories.update', $category) : route('categories.store') }}"
            method="POST" id="categoryForm">
            @csrf
            @if ($category)
                @method('PUT')
            @endif

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <div class="d-flex align-items-center">
                        <div
                            class="avatar avatar-sm bg-primary text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                            <i class="ti ti-category fs-5"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-semibold">{{ __('Category Information') }}</h5>
                            <small class="text-muted">{{ __('Basic details about the category') }}</small>
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
                                    <i class="ti ti-tag text-muted"></i>
                                </span>
                                <input type="text"
                                    class="form-control @error('name') is-invalid @enderror border-start-0"
                                    id="name" name="name" value="{{ old('name', $category->name ?? '') }}"
                                    placeholder="{{ __('Enter category name') }}" required>
                                @error('name')
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
                                    name="description" rows="4" placeholder="{{ __('Enter category description') }}">{{ old('description', $category->description ?? '') }}</textarea>
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
                                        {{ old('status', $category->status ?? 1) == 1 ? 'selected' : '' }}>
                                        {{ __('Active') }}
                                    </option>
                                    <option value="0"
                                        {{ old('status', $category->status ?? 0) == 0 ? 'selected' : '' }}>
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
                <a href="{{ $category ? route('categories.show', $category) : route('categories.index') }}"
                    class="btn btn-outline-secondary">
                    <i class="ti ti-x me-1"></i>{{ __('Cancel') }}
                </a>
                <button type="submit" class="btn btn-primary px-4">
                    <i class="ti ti-{{ $category ? 'device-floppy' : 'plus' }} me-1"></i>
                    {{ $category ? __('Update Category') : __('Create Category') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
