<x-app-layout :page="__('Subscription Reports')" for="superadmin">
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">{{ __('Subscription Reports') }}</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('s.dashboard', absolute: false) }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Subscription Reports') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="ti ti-download me-1"></i>{{ __('Download') }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('s.reports.subscriptions', array_merge(request()->all(), ['export' => 'pdf'])) }}">
                                <i class="ti ti-file-type-pdf me-2"></i>{{ __('PDF') }}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('s.reports.subscriptions', array_merge(request()->all(), ['export' => 'excel'])) }}">
                                <i class="ti ti-file-type-xls me-2"></i>{{ __('Excel') }}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('s.reports.subscriptions', array_merge(request()->all(), ['export' => 'csv'])) }}">
                                <i class="ti ti-file-type-csv me-2"></i>{{ __('CSV') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Filters Card -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom py-3">
                <div class="d-flex align-items-center">
                    <div
                        class="avatar avatar-sm bg-primary text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                        <i class="ti ti-filter fs-5"></i>
                    </div>
                    <h5 class="mb-0 fw-semibold">{{ __('Filters') }}</h5>
                </div>
            </div>
            <div class="card-body p-4">
                <form method="GET" action="{{ route('s.reports.subscriptions') }}" id="filterForm">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">{{ __('Company') }}</label>
                            <select name="company_id" class="form-select">
                                <option value="">{{ __('All Companies') }}</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}"
                                        {{ request('company_id') == $company->id ? 'selected' : '' }}>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">{{ __('Status') }}</label>
                            <select name="status" class="form-select">
                                <option value="">{{ __('All') }}</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>
                                    {{ __('Active') }}</option>
                                <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>
                                    {{ __('Canceled') }}</option>
                                <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>
                                    {{ __('Expired') }}</option>
                                <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>
                                    {{ __('Suspended') }}</option>
                                <option value="trial" {{ request('status') == 'trial' ? 'selected' : '' }}>
                                    {{ __('Trial') }}</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">{{ __('Billing Cycle') }}</label>
                            <select name="billing_cycle" class="form-select">
                                <option value="">{{ __('All') }}</option>
                                <option value="monthly" {{ request('billing_cycle') == 'monthly' ? 'selected' : '' }}>
                                    {{ __('Monthly') }}</option>
                                <option value="yearly" {{ request('billing_cycle') == 'yearly' ? 'selected' : '' }}>
                                    {{ __('Yearly') }}</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">{{ __('Date From') }}</label>
                            <input type="date" name="date_from" class="form-control"
                                value="{{ request('date_from') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">{{ __('Date To') }}</label>
                            <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="ti ti-search me-1"></i>{{ __('Apply Filters') }}
                            </button>
                            <a href="{{ route('s.reports.subscriptions') }}" class="btn btn-outline-secondary">
                                <i class="ti ti-x me-1"></i>{{ __('Clear') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Results Card -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom py-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div
                            class="avatar avatar-sm bg-purple text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                            <i class="ti ti-credit-card fs-5"></i>
                        </div>
                        <h5 class="mb-0 fw-semibold">{{ __('Subscriptions') }} ({{ $subscriptions->count() }})</h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                @if ($subscriptions->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ __('Company') }}</th>
                                    <th>{{ __('Plan') }}</th>
                                    <th>{{ __('Billing Cycle') }}</th>
                                    <th>{{ __('Amount') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Start Date') }}</th>
                                    <th>{{ __('End Date') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscriptions as $subscription)
                                    <tr>
                                        <td>
                                            <a href="{{ route('s.companies.show', $subscription->company) }}"
                                                class="text-primary text-decoration-none">
                                                {{ $subscription->company->name ?? '—' }}
                                            </a>
                                        </td>
                                        <td>{{ $subscription->plan->name ?? '—' }}</td>
                                        <td>
                                            <span class="badge bg-light text-dark text-capitalize">
                                                {{ $subscription->billing_cycle }}
                                            </span>
                                        </td>
                                        <td class="fw-medium">
                                            {{ $subscription->currency }}
                                            {{ number_format($subscription->amount, 2) }}
                                        </td>
                                        <td>
                                            @php
                                                $badgeClass = match ($subscription->status) {
                                                    'active' => 'bg-success',
                                                    'canceled' => 'bg-danger',
                                                    'expired' => 'bg-secondary',
                                                    'suspended' => 'bg-warning',
                                                    'trial' => 'bg-info',
                                                    default => 'bg-secondary',
                                                };
                                            @endphp
                                            <span class="badge {{ $badgeClass }} text-capitalize">
                                                {{ $subscription->status }}
                                            </span>
                                        </td>
                                        <td>{{ $subscription->start_date->format('d M Y') }}</td>
                                        <td>{{ $subscription->end_date ? $subscription->end_date->format('d M Y') : '—' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="ti ti-inbox fs-1 text-muted mb-3 d-block"></i>
                        <p class="text-muted">{{ __('No subscriptions found matching your filters.') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .bg-purple {
                background-color: #6f42c1 !important;
            }
        </style>
    @endpush
</x-app-layout>
