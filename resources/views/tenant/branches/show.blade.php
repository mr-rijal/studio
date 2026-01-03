<x-app-layout :page="__('Branch Details')">
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
                    {{ __('Branch Details') }}
                </h4>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="{{ route('branches.index') }}" class="btn btn-outline-light">
                    <i class="ti ti-arrow-left me-1"></i>{{ __('Back') }}
                </a>
                <a href="{{ route('branches.edit', $branch) }}" class="btn btn-primary">
                    <i class="ti ti-edit me-1"></i>{{ __('Edit') }}
                </a>
                <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#delete_branch_{{ $branch->id }}">
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
                                class="avatar avatar-sm bg-warning text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                                <i class="ti ti-building-store fs-5"></i>
                            </div>
                            <h5 class="mb-0 fw-semibold">{{ __('Branch Information') }}</h5>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-building-store me-1"></i>{{ __('Name') }}
                                </label>
                                <p class="mb-0 fw-medium">{{ $branch->name }}</p>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-map-pin me-1"></i>{{ __('Address Line 1') }}
                                </label>
                                <p class="mb-0">{{ $branch->address_line_1 }}</p>
                            </div>
                            @if ($branch->address_line_2)
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold text-muted small mb-1">
                                        <i class="ti ti-map-pin me-1"></i>{{ __('Address Line 2') }}
                                    </label>
                                    <p class="mb-0">{{ $branch->address_line_2 }}</p>
                                </div>
                            @endif
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-building me-1"></i>{{ __('City') }}
                                </label>
                                <p class="mb-0">{{ $branch->city }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-map me-1"></i>{{ __('State') }}
                                </label>
                                <p class="mb-0">{{ $branch->state }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-mail me-1"></i>{{ __('Zip') }}
                                </label>
                                <p class="mb-0">{{ $branch->zip }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-phone me-1"></i>{{ __('Phone') }}
                                </label>
                                <p class="mb-0">
                                    <a href="tel:{{ $branch->phone }}" class="text-primary text-decoration-none">
                                        {{ $branch->phone }}
                                    </a>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-mail me-1"></i>{{ __('Email') }}
                                </label>
                                <p class="mb-0">
                                    <a href="mailto:{{ $branch->email }}" class="text-primary text-decoration-none">
                                        {{ $branch->email }}
                                    </a>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-toggle-left me-1"></i>{{ __('Status') }}
                                </label>
                                <p class="mb-0">
                                    @if ($branch->status)
                                        <span class="badge bg-success">{{ __('Active') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ __('Inactive') }}</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-calendar me-1"></i>{{ __('Created Date') }}
                                </label>
                                <p class="mb-0">
                                    <i
                                        class="ti ti-clock me-1 text-muted"></i>{{ $branch->created_at->format('d M Y, h:i A') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="delete_branch_{{ $branch->id }}" tabindex="-1"
        aria-labelledby="delete_branch_{{ $branch->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete_branch_{{ $branch->id }}Label">
                        {{ __('Delete Branch') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are you sure you want to delete this branch?') }}</p>
                    <p class="mb-0"><strong>{{ $branch->name }}</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                        {{ __('Cancel') }}</button>
                    <form action="{{ route('branches.destroy', $branch) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
