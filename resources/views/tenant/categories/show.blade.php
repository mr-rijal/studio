<x-app-layout :page="__('Category Details')">
    <div class="content pb-0">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">
                    {{ __('Category Details') }}
                </h4>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="{{ route('categories.index') }}" class="btn btn-outline-light">
                    <i class="ti ti-arrow-left me-1"></i>{{ __('Back') }}
                </a>
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">
                    <i class="ti ti-edit me-1"></i>{{ __('Edit') }}
                </a>
                <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#delete_category_{{ $category->id }}">
                    <i class="ti ti-trash me-1"></i>{{ __('Delete') }}
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <div class="d-flex align-items-center">
                            <div
                                class="avatar avatar-sm bg-primary text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                                <i class="ti ti-category fs-5"></i>
                            </div>
                            <h5 class="mb-0 fw-semibold">{{ __('Category Information') }}</h5>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-tag me-1"></i>{{ __('Name') }}
                                </label>
                                <p class="mb-0 fw-medium">{{ $category->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-toggle-left me-1"></i>{{ __('Status') }}
                                </label>
                                <p class="mb-0">
                                    @if ($category->status)
                                        <span class="badge bg-success">{{ __('Active') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ __('Inactive') }}</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-file-text me-1"></i>{{ __('Description') }}
                                </label>
                                <p class="mb-0">{{ $category->description ?? '—' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-calendar me-1"></i>{{ __('Created Date') }}
                                </label>
                                <p class="mb-0">
                                    <i
                                        class="ti ti-clock me-1 text-muted"></i>{{ $category->created_at->format('d M Y, h:i A') }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-calendar me-1"></i>{{ __('Updated Date') }}
                                </label>
                                <p class="mb-0">
                                    <i
                                        class="ti ti-clock me-1 text-muted"></i>{{ $category->updated_at->format('d M Y, h:i A') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="delete_category_{{ $category->id }}" tabindex="-1"
        aria-labelledby="delete_category_{{ $category->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete_category_{{ $category->id }}Label">
                        {{ __('Delete Category') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are you sure you want to delete this category?') }}</p>
                    <p class="mb-0"><strong>{{ $category->name }}</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                        {{ __('Cancel') }}</button>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
