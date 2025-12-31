<x-app-layout :page="$plan ? __('Edit Plan') : __('Add New Plan')" for="superadmin">
    <div class="content pb-0">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">
                    {{ $plan ? __('Edit Plan') : __('Add New Plan') }}
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('s.dashboard', absolute: false) }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('s.plans.index', absolute: false) }}">{{ __('Plans') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $plan ? __('Edit') : __('Create') }}
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="{{ $plan ? route('s.plans.show', $plan) : route('s.plans.index') }}"
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

        <div class="card border-0 rounded-0">
            <div class="card-body">
                <form action="{{ $plan ? route('s.plans.update', $plan) : route('s.plans.store') }}" method="POST"
                    id="planForm">
                    @csrf
                    @if ($plan)
                        @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">{{ __('Plan Name') }} <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name', $plan->name ?? '') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="currency" class="form-label">{{ __('Currency') }} <span
                                    class="text-danger">*</span></label>
                            <select class="form-select @error('currency') is-invalid @enderror" id="currency" name="currency" required>
                                <option value="USD" selected>USD</option>
                            </select>
                            @error('currency')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description" class="form-label">{{ __('Description') }} <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="3" required>{{ old('description', $plan->description ?? '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="monthly_price" class="form-label">{{ __('Monthly Price') }} <span
                                    class="text-danger">*</span></label>
                            <input type="number" step="0.01" min="0"
                                class="form-control @error('monthly_price') is-invalid @enderror" id="monthly_price"
                                name="monthly_price" value="{{ old('monthly_price', $plan->monthly_price ?? '0') }}"
                                required>
                            @error('monthly_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="yearly_price" class="form-label">{{ __('Yearly Price') }} <span
                                    class="text-danger">*</span></label>
                            <input type="number" step="0.01" min="0"
                                class="form-control @error('yearly_price') is-invalid @enderror" id="yearly_price"
                                name="yearly_price" value="{{ old('yearly_price', $plan->yearly_price ?? '0') }}"
                                required>
                            @error('yearly_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="monthly_stripe_price_id"
                                class="form-label">{{ __('Monthly Stripe Price ID') }}</label>
                            <input type="text"
                                class="form-control @error('monthly_stripe_price_id') is-invalid @enderror"
                                id="monthly_stripe_price_id" name="monthly_stripe_price_id"
                                value="{{ old('monthly_stripe_price_id', $plan->monthly_stripe_price_id ?? '') }}">
                            @error('monthly_stripe_price_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="yearly_stripe_price_id"
                                class="form-label">{{ __('Yearly Stripe Price ID') }}</label>
                            <input type="text"
                                class="form-control @error('yearly_stripe_price_id') is-invalid @enderror"
                                id="yearly_stripe_price_id" name="yearly_stripe_price_id"
                                value="{{ old('yearly_stripe_price_id', $plan->yearly_stripe_price_id ?? '') }}">
                            @error('yearly_stripe_price_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">{{ __('Status') }}</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status"
                                name="status">
                                <option value="1" {{ old('status', $plan->status ?? 1) == 1 ? 'selected' : '' }}>
                                    {{ __('Active') }}</option>
                                <option value="0" {{ old('status', $plan->status ?? 0) == 0 ? 'selected' : '' }}>
                                    {{ __('Inactive') }}</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">{{ __('Features') }}</label>
                            <p class="text-muted small mb-2">{{ __('Features are shown to users on the frontend') }}
                            </p>
                            <div id="features_container">
                                @if ($plan && $plan->features && count($plan->features) > 0)
                                    @foreach ($plan->features as $index => $feature)
                                        <div class="feature-item mb-2">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="features[]"
                                                    value="{{ old("features.{$index}", $feature) }}"
                                                    placeholder="{{ __('Feature description') }}">
                                                <button type="button" class="btn btn-danger remove-feature-btn">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="feature-item mb-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="features[]"
                                                value="{{ old('features.0', '') }}"
                                                placeholder="{{ __('Feature description') }}">
                                            <button type="button" class="btn btn-danger remove-feature-btn">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary" id="addFeatureBtn">
                                <i class="ti ti-plus me-1"></i>{{ __('Add Feature') }}
                            </button>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">{{ __('Permissions') }}</label>
                            <p class="text-muted small mb-2">{{ __('Select permissions allowed for this plan') }}</p>
                            <div class="row">
                                @foreach ($availablePermissions as $category => $permissions)
                                    <div class="col-md-6 mb-3">
                                        <div class="card border">
                                            <div class="card-header bg-light">
                                                <h6 class="mb-0 text-capitalize">
                                                    {{ str_replace('_', ' ', $category) }}</h6>
                                            </div>
                                            <div class="card-body">
                                                @foreach ($permissions as $permissionKey => $permissionLabel)
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="permissions[]" value="{{ $permissionKey }}"
                                                            id="permission_{{ $permissionKey }}"
                                                            {{ $plan && $plan->permissions && in_array($permissionKey, $plan->permissions) ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="permission_{{ $permissionKey }}">
                                                            {{ $permissionLabel }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-2 mt-4">
                        <a href="{{ $plan ? route('s.plans.show', $plan) : route('s.plans.index') }}"
                            class="btn btn-outline-light">{{ __('Cancel') }}</a>
                        <button type="submit" class="btn btn-primary">
                            {{ $plan ? __('Update Plan') : __('Create Plan') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Add Feature Button
                document.getElementById('addFeatureBtn')?.addEventListener('click', function() {
                    const container = document.getElementById('features_container');
                    const featureHtml = `
                        <div class="feature-item mb-2">
                            <div class="input-group">
                                <input type="text" class="form-control" name="features[]" placeholder="{{ __('Feature description') }}">
                                <button type="button" class="btn btn-danger remove-feature-btn">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </div>
                        </div>
                    `;
                    container.insertAdjacentHTML('beforeend', featureHtml);
                });

                // Remove Feature Button
                document.addEventListener('click', function(e) {
                    if (e.target.closest('.remove-feature-btn')) {
                        const featureItem = e.target.closest('.feature-item');
                        const featureItems = document.querySelectorAll('.feature-item');
                        if (featureItems.length > 1) {
                            featureItem.remove();
                        } else {
                            // Clear the input instead of removing
                            const input = featureItem.querySelector('input');
                            if (input) input.value = '';
                        }
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
