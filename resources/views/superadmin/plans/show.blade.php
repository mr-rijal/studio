<x-app-layout :page="__('Plan Details')" for="superadmin">
    <div class="content pb-0">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">
                    {{ __('Plan Details') }}
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('s.dashboard', absolute: false) }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('s.plans.index', absolute: false) }}">{{ __('Plans') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $plan->name }}</li>
                    </ol>
                </nav>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="{{ route('s.plans.index', absolute: false) }}" class="btn btn-outline-light">
                    <i class="ti ti-arrow-left me-1"></i>{{ __('Back') }}
                </a>
                <a href="{{ route('s.plans.edit', $plan) }}" class="btn btn-primary">
                    <i class="ti ti-edit me-1"></i>{{ __('Edit') }}
                </a>
                <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#delete_plan_{{ $plan->id }}">
                    <i class="ti ti-trash me-1"></i>{{ __('Delete') }}
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <!-- Plan Overview Card -->
            <div class="col-xl-4 col-lg-5">
                <div class="card border-0 rounded-0 mb-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <div class="avatar avatar-xl rounded-circle bg-soft-primary border border-primary mx-auto">
                                <i class="ti ti-package fs-32 text-primary"></i>
                            </div>
                        </div>
                        <h4 class="mb-1">{{ $plan->name }}</h4>
                        <p class="text-muted mb-3">
                            @if ($plan->status)
                                <span class="badge bg-success">{{ __('Active') }}</span>
                            @else
                                <span class="badge bg-danger">{{ __('Inactive') }}</span>
                            @endif
                        </p>
                        <div class="d-flex align-items-center justify-content-center gap-3">
                            <div>
                                <p class="text-muted mb-1">{{ __('Monthly') }}</p>
                                <h5 class="mb-0">{{ $plan->currency }} {{ number_format($plan->monthly_price, 2) }}</h5>
                            </div>
                            <div class="vr"></div>
                            <div>
                                <p class="text-muted mb-1">{{ __('Yearly') }}</p>
                                <h5 class="mb-0">{{ $plan->currency }} {{ number_format($plan->yearly_price, 2) }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plan Details -->
            <div class="col-xl-8 col-lg-7">
                <div class="card border-0 rounded-0 mb-4">
                    <div class="card-header border-0 bg-transparent">
                        <h5 class="mb-0">{{ __('Plan Information') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Plan Name') }}</label>
                                <p class="mb-0 fw-medium">{{ $plan->name }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Currency') }}</label>
                                <p class="mb-0">
                                    <span class="badge bg-light text-dark">{{ $plan->currency }}</span>
                                </p>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label text-muted">{{ __('Description') }}</label>
                                <p class="mb-0">{{ $plan->description }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Monthly Price') }}</label>
                                <p class="mb-0 fw-medium">{{ $plan->currency }} {{ number_format($plan->monthly_price, 2) }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Yearly Price') }}</label>
                                <p class="mb-0 fw-medium">{{ $plan->currency }} {{ number_format($plan->yearly_price, 2) }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Monthly Stripe Price ID') }}</label>
                                <p class="mb-0">
                                    {{ $plan->monthly_stripe_price_id ?: '—' }}
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Yearly Stripe Price ID') }}</label>
                                <p class="mb-0">
                                    {{ $plan->yearly_stripe_price_id ?: '—' }}
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Status') }}</label>
                                <p class="mb-0">
                                    @if ($plan->status)
                                        <span class="badge bg-success">{{ __('Active') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ __('Inactive') }}</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Created Date') }}</label>
                                <p class="mb-0">{{ $plan->created_at->format('d M Y, h:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features Card -->
                @if ($plan->features && count($plan->features) > 0)
                    <div class="card border-0 rounded-0 mb-4">
                        <div class="card-header border-0 bg-transparent">
                            <h5 class="mb-0">{{ __('Features') }}</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                @foreach ($plan->features as $feature)
                                    <li class="mb-2 d-flex align-items-start">
                                        <i class="ti ti-check text-success me-2 mt-1"></i>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <!-- Permissions Card -->
                @if ($plan->permissions && count($plan->permissions) > 0)
                    <div class="card border-0 rounded-0">
                        <div class="card-header border-0 bg-transparent">
                            <h5 class="mb-0">{{ __('Permissions') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($availablePermissions as $category => $permissions)
                                    @php
                                        $categoryPermissions = array_filter($plan->permissions, function ($perm) use ($permissions) {
                                            return array_key_exists($perm, $permissions);
                                        });
                                    @endphp
                                    @if (count($categoryPermissions) > 0)
                                        <div class="col-md-6 mb-3">
                                            <h6 class="text-capitalize mb-2">{{ str_replace('_', ' ', $category) }}</h6>
                                            <ul class="list-unstyled mb-0">
                                                @foreach ($categoryPermissions as $permissionKey)
                                                    <li class="mb-1 d-flex align-items-start">
                                                        <i class="ti ti-check text-success me-2 mt-1"></i>
                                                        <span>{{ $permissions[$permissionKey] ?? $permissionKey }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="delete_plan_{{ $plan->id }}" tabindex="-1"
        aria-labelledby="delete_plan_{{ $plan->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete_plan_{{ $plan->id }}Label">
                        {{ __('Delete Plan') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are you sure you want to delete this plan?') }}</p>
                    <p class="mb-0"><strong>{{ $plan->name }}</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                        {{ __('Cancel') }}</button>
                    <form action="{{ route('s.plans.destroy', $plan) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

