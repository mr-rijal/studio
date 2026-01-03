<x-app-layout :page="__('Family Address Details')">
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
                    {{ __('Family Address Details') }}
                </h4>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="{{ route('family-addresses.index') }}" class="btn btn-outline-light">
                    <i class="ti ti-arrow-left me-1"></i>{{ __('Back') }}
                </a>
                <a href="{{ route('family-addresses.edit', $familyAddress) }}" class="btn btn-primary">
                    <i class="ti ti-edit me-1"></i>{{ __('Edit') }}
                </a>
                <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#delete_family_address_{{ $familyAddress->id }}">
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
                                class="avatar avatar-sm bg-success text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                                <i class="ti ti-home fs-5"></i>
                            </div>
                            <h5 class="mb-0 fw-semibold">{{ __('Family Address Information') }}</h5>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-users me-1"></i>{{ __('Family') }}
                                </label>
                                <p class="mb-0 fw-medium">{{ __('Family') }} #{{ $familyAddress->family_id }}</p>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-map-pin me-1"></i>{{ __('Home Address') }}
                                </label>
                                <p class="mb-0">{{ $familyAddress->home_address }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-building me-1"></i>{{ __('City') }}
                                </label>
                                <p class="mb-0">{{ $familyAddress->city }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-map me-1"></i>{{ __('State') }}
                                </label>
                                <p class="mb-0">{{ $familyAddress->state }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-mail me-1"></i>{{ __('Zip') }}
                                </label>
                                <p class="mb-0">{{ $familyAddress->zip }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-calendar me-1"></i>{{ __('Created Date') }}
                                </label>
                                <p class="mb-0">
                                    <i class="ti ti-clock me-1 text-muted"></i>{{ $familyAddress->created_at->format('d M Y, h:i A') }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-calendar me-1"></i>{{ __('Updated Date') }}
                                </label>
                                <p class="mb-0">
                                    <i class="ti ti-clock me-1 text-muted"></i>{{ $familyAddress->updated_at->format('d M Y, h:i A') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="delete_family_address_{{ $familyAddress->id }}" tabindex="-1"
        aria-labelledby="delete_family_address_{{ $familyAddress->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete_family_address_{{ $familyAddress->id }}Label">
                        {{ __('Delete Family Address') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are you sure you want to delete this family address?') }}</p>
                    <p class="mb-0"><strong>{{ $familyAddress->home_address }}</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                        {{ __('Cancel') }}</button>
                    <form action="{{ route('family-addresses.destroy', $familyAddress) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

