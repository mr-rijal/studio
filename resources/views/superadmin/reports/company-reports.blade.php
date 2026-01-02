<x-app-layout :page="__('Company Reports')" for="superadmin">
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">{{ __('Company Reports') }}</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('s.dashboard', absolute: false) }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Company Reports') }}</li>
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
                                href="{{ route('s.reports.companies', array_merge(request()->all(), ['export' => 'pdf'])) }}">
                                <i class="ti ti-file-type-pdf me-2"></i>{{ __('PDF') }}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('s.reports.companies', array_merge(request()->all(), ['export' => 'excel'])) }}">
                                <i class="ti ti-file-type-xls me-2"></i>{{ __('Excel') }}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('s.reports.companies', array_merge(request()->all(), ['export' => 'csv'])) }}">
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
                <form method="GET" action="{{ route('s.reports.companies') }}" id="filterForm">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">{{ __('Search') }}</label>
                            <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                                placeholder="{{ __('Company name, email, phone...') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">{{ __('Status') }}</label>
                            <select name="status" class="form-select">
                                <option value="">{{ __('All') }}</option>
                                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>
                                    {{ __('Active') }}</option>
                                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>
                                    {{ __('Inactive') }}</option>
                            </select>
                        </div>
                        <div class="col-md-3">
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
                            <a href="{{ route('s.reports.companies') }}" class="btn btn-outline-secondary">
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
                            class="avatar avatar-sm bg-info text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                            <i class="ti ti-building fs-5"></i>
                        </div>
                        <h5 class="mb-0 fw-semibold">{{ __('Companies') }} ({{ $companies->count() }})</h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                @if ($companies->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Owner') }}</th>
                                    <th>{{ __('Created At') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if ($company->logo)
                                                    <img src="{{ asset('storage/' . $company->logo) }}"
                                                        alt="{{ $company->name }}" class="rounded-circle me-2"
                                                        style="width: 32px; height: 32px; object-fit: cover;">
                                                @else
                                                    <div
                                                        class="avatar avatar-sm bg-soft-primary rounded-circle me-2 d-flex align-items-center justify-content-center">
                                                        <i class="ti ti-building text-primary"></i>
                                                    </div>
                                                @endif
                                                <span class="fw-medium">{{ $company->name }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $company->email ?? '—' }}</td>
                                        <td>{{ $company->phone_number ?? '—' }}</td>
                                        <td>
                                            @if ($company->status)
                                                <span class="badge bg-success">{{ __('Active') }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ __('Inactive') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $company->user ? $company->user->name : '—' }}</td>
                                        <td>{{ $company->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="ti ti-inbox fs-1 text-muted mb-3 d-block"></i>
                        <p class="text-muted">{{ __('No companies found matching your filters.') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
