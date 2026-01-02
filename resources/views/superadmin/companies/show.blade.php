<x-app-layout :page="__('Company Details')" for="superadmin">
    <div class="content pb-0">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">
                    {{ __('Company Details') }}
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('s.dashboard', absolute: false) }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('s.companies.index', absolute: false) }}">{{ __('Companies') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $company->name }}</li>
                    </ol>
                </nav>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="{{ route('s.companies.index', absolute: false) }}" class="btn btn-outline-light">
                    <i class="ti ti-arrow-left me-1"></i>{{ __('Back') }}
                </a>
                <a href="{{ route('s.companies.edit', $company) }}" class="btn btn-primary">
                    <i class="ti ti-edit me-1"></i>{{ __('Edit') }}
                </a>
                <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#delete_company_{{ $company->id }}">
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
            <!-- Company Overview Card -->
            <div class="col-xl-4 col-lg-5">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body text-center p-4">
                        <div class="mb-4">
                            @if ($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}"
                                    class="img-fluid rounded-circle border border-3 border-primary"
                                    style="width: 140px; height: 140px; object-fit: cover; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                            @else
                                <div class="avatar avatar-xl rounded-circle bg-primary text-white mx-auto d-flex align-items-center justify-content-center border border-3 border-primary shadow-sm"
                                    style="width: 140px; height: 140px;">
                                    <i class="ti ti-building" style="font-size: 3.5rem;"></i>
                                </div>
                            @endif
                        </div>
                        <h4 class="mb-2 fw-bold">{{ $company->name }}</h4>
                        <p class="mb-4">
                            @if ($company->status)
                                <span class="badge bg-success px-3 py-2 fs-6">
                                    <i class="ti ti-check me-1"></i>{{ __('Active') }}
                                </span>
                            @else
                                <span class="badge bg-danger px-3 py-2 fs-6">
                                    <i class="ti ti-x me-1"></i>{{ __('Inactive') }}
                                </span>
                            @endif
                        </p>
                        <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
                            @if ($company->email)
                                <a href="mailto:{{ $company->email }}" class="btn btn-sm btn-outline-primary">
                                    <i class="ti ti-mail me-1"></i>{{ __('Email') }}
                                </a>
                            @endif
                            @if ($company->phone_number)
                                <a href="tel:{{ $company->phone_number }}" class="btn btn-sm btn-outline-primary">
                                    <i class="ti ti-phone me-1"></i>{{ __('Call') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Owner Information -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <div class="d-flex align-items-center">
                            <div
                                class="avatar avatar-sm bg-primary text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                                <i class="ti ti-user fs-5"></i>
                            </div>
                            <h5 class="mb-0 fw-semibold">{{ __('Owner Information') }}</h5>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        @if ($company->user)
                            <div class="d-flex align-items-center">
                                <div
                                    class="avatar avatar-md rounded-circle bg-soft-primary me-3 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-user fs-5 text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-semibold">{{ $company->user->name }}</h6>
                                    <p class="text-muted mb-0 small">
                                        <i class="ti ti-mail me-1"></i>{{ $company->user->email }}
                                    </p>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-3">
                                <i class="ti ti-user-off fs-1 text-muted mb-2 d-block"></i>
                                <p class="text-muted mb-0">{{ __('No owner assigned') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Company Details -->
            <div class="col-xl-8 col-lg-7">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <div class="d-flex align-items-center">
                            <div
                                class="avatar avatar-sm bg-info text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                                <i class="ti ti-building fs-5"></i>
                            </div>
                            <h5 class="mb-0 fw-semibold">{{ __('Company Information') }}</h5>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-building me-1"></i>{{ __('Company Name') }}
                                </label>
                                <p class="mb-0 fw-medium">{{ $company->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-mail me-1"></i>{{ __('Email') }}
                                </label>
                                <p class="mb-0">
                                    @if ($company->email)
                                        <a href="mailto:{{ $company->email }}"
                                            class="text-primary text-decoration-none">
                                            {{ $company->email }}
                                        </a>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-phone me-1"></i>{{ __('Phone Number') }}
                                </label>
                                <p class="mb-0">
                                    @if ($company->phone_number)
                                        <a href="tel:{{ $company->phone_number }}"
                                            class="text-primary text-decoration-none">
                                            {{ $company->phone_number }}
                                        </a>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-device-mobile me-1"></i>{{ __('Mobile Number') }}
                                </label>
                                <p class="mb-0">
                                    @if ($company->mobile_number)
                                        <a href="tel:{{ $company->mobile_number }}"
                                            class="text-primary text-decoration-none">
                                            {{ $company->mobile_number }}
                                        </a>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-category me-1"></i>{{ __('Organization Type') }}
                                </label>
                                <p class="mb-0">{{ $company->organization_type ?? '—' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-device-fax me-1"></i>{{ __('Fax Number') }}
                                </label>
                                <p class="mb-0">{{ $company->fax_number ?? '—' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-mail-forward me-1"></i>{{ __('Reply To Email') }}
                                </label>
                                <p class="mb-0">
                                    @if ($company->replyto_email)
                                        <a href="mailto:{{ $company->replyto_email }}"
                                            class="text-primary text-decoration-none">
                                            {{ $company->replyto_email }}
                                        </a>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted small mb-1">
                                    <i class="ti ti-calendar me-1"></i>{{ __('Created Date') }}
                                </label>
                                <p class="mb-0">
                                    <i
                                        class="ti ti-clock me-1 text-muted"></i>{{ $company->created_at->format('d M Y, h:i A') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Information -->
                @if ($company->address_line_1 || $company->city || $company->state || $company->zip)
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white border-bottom py-3">
                            <div class="d-flex align-items-center">
                                <div
                                    class="avatar avatar-sm bg-warning text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-map-pin fs-5"></i>
                                </div>
                                <h5 class="mb-0 fw-semibold">{{ __('Address Information') }}</h5>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label text-muted">{{ __('Address Line 1') }}</label>
                                    <p class="mb-0">{{ $company->address_line_1 ?? '—' }}</p>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label text-muted">{{ __('Address Line 2') }}</label>
                                    <p class="mb-0">{{ $company->address_line_2 ?? '—' }}</p>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label text-muted">{{ __('City') }}</label>
                                    <p class="mb-0">{{ $company->city ?? '—' }}</p>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label text-muted">{{ __('State') }}</label>
                                    <p class="mb-0">{{ $company->state ?? '—' }}</p>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label text-muted">{{ __('ZIP Code') }}</label>
                                    <p class="mb-0">{{ $company->zip ?? '—' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Tax Information -->
                @if ($company->tax_number || $company->tax_rate || $company->tax_label)
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white border-bottom py-3">
                            <div class="d-flex align-items-center">
                                <div
                                    class="avatar avatar-sm bg-danger text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-receipt fs-5"></i>
                                </div>
                                <h5 class="mb-0 fw-semibold">{{ __('Tax Information') }}</h5>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">{{ __('Tax ID Label') }}</label>
                                    <p class="mb-0">{{ $company->taxid_label ?? '—' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">{{ __('Tax Number') }}</label>
                                    <p class="mb-0">{{ $company->tax_number ?? '—' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">{{ __('Tax Rate') }}</label>
                                    <p class="mb-0">
                                        @if ($company->tax_rate)
                                            {{ number_format($company->tax_rate, 2) }}%
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">{{ __('Tax Label') }}</label>
                                    <p class="mb-0">{{ $company->tax_label ?? '—' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">{{ __('Tuition Fee Taxable') }}</label>
                                    <p class="mb-0">
                                        @if ($company->tuition_fee_taxable)
                                            <span class="badge bg-success">{{ __('Yes') }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ __('No') }}</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">{{ __('Registration Fee Taxable') }}</label>
                                    <p class="mb-0">
                                        @if ($company->registration_fee_taxable)
                                            <span class="badge bg-success">{{ __('Yes') }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ __('No') }}</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Settings -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <div class="d-flex align-items-center">
                            <div
                                class="avatar avatar-sm bg-secondary text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                                <i class="ti ti-settings fs-5"></i>
                            </div>
                            <h5 class="mb-0 fw-semibold">{{ __('Settings') }}</h5>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Date Format') }}</label>
                                <p class="mb-0">{{ $company->date_format ?? '—' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Min Age of Child') }}</label>
                                <p class="mb-0">{{ $company->min_age_of_child ?? '—' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Email to Receive Notification') }}</label>
                                <p class="mb-0">
                                    @if ($company->email_to_receive_notification)
                                        <a href="mailto:{{ $company->email_to_receive_notification }}">
                                            {{ $company->email_to_receive_notification }}
                                        </a>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label
                                    class="form-label text-muted">{{ __('Send Enrollment Email to Instructor') }}</label>
                                <p class="mb-0">
                                    @if ($company->send_enrollment_email_to_instructor)
                                        <span class="badge bg-success">{{ __('Yes') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ __('No') }}</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Discount for Many Kids') }}</label>
                                <p class="mb-0">
                                    @if ($company->discount_for_many_kids)
                                        <span class="badge bg-success">{{ __('Yes') }}</span>
                                        @if ($company->with_many_kids_discount)
                                            <span
                                                class="ms-2">({{ number_format($company->with_many_kids_discount, 2) }}%)</span>
                                        @endif
                                    @else
                                        <span class="badge bg-danger">{{ __('No') }}</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Can Pay Full Year') }}</label>
                                <p class="mb-0">
                                    @if ($company->can_pay_full_year)
                                        <span class="badge bg-success">{{ __('Yes') }}</span>
                                        @if ($company->full_year_discount)
                                            <span
                                                class="ms-2">({{ number_format($company->full_year_discount, 2) }}%)</span>
                                        @endif
                                    @else
                                        <span class="badge bg-danger">{{ __('No') }}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Domains Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <div class="d-flex align-items-center">
                            <div
                                class="avatar avatar-sm bg-success text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                                <i class="ti ti-world fs-5"></i>
                            </div>
                            <h5 class="mb-0 fw-semibold">{{ __('Domains') }}</h5>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        @if ($company->domains->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Domain') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Verification Token') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($company->domains as $domain)
                                            <tr>
                                                <td>
                                                    <a href="https://{{ $domain->domain }}" target="_blank"
                                                        class="text-primary text-decoration-none">
                                                        {{ $domain->domain }}
                                                    </a>
                                                    @if ($domain->primary)
                                                        <span class="badge bg-primary ms-2">{{ __('Primary') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge domain-status-badge domain-status-{{ $domain->id }} {{ $domain->status ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $domain->status ? __('Active') : __('Inactive') }}
                                                    </span>
                                                </td>
                                                <td>{{ $domain->verification_token ?? '—' }}</td>
                                                <td>
                                                    <form
                                                        action="{{ route('s.companies.domains.toggle', [$company, $domain]) }}"
                                                        method="POST" class="d-inline domain-toggle-form"
                                                        data-domain-id="{{ $domain->id }}">
                                                        @csrf
                                                        @method('PATCH')

                                                        <button type="submit"
                                                            class="btn btn-sm domain-toggle-btn domain-toggle-{{ $domain->id }} {{ $domain->status ? 'btn-danger' : 'btn-success' }} p-1 py-0 text-white">
                                                            @if ($domain->status)
                                                                <i class="ti ti-toggle-left me-1"></i>
                                                                {{ __('Deactivate') }}
                                                            @else
                                                                <i class="ti ti-toggle-right me-1"></i>
                                                                {{ __('Activate') }}
                                                            @endif
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted mb-0">{{ __('No domains configured') }}</p>
                        @endif
                    </div>
                </div>

                <!-- Subscriptions Card -->
                <div class="card border-0 shadow-sm">
                    <div
                        class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div
                                class="avatar avatar-sm bg-purple text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                                <i class="ti ti-credit-card fs-5"></i>
                            </div>
                            <h5 class="mb-0 fw-semibold">{{ __('Subscriptions') }}</h5>
                        </div>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addSubscriptionModal">
                            <i class="ti ti-plus me-1"></i>{{ __('Add Subscription') }}
                        </button>
                    </div>
                    <div class="card-body p-4">
                        @if ($subscriptions->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Plan') }}</th>
                                            <th>{{ __('Billing Cycle') }}</th>
                                            <th>{{ __('Amount') }}</th>
                                            <th>{{ __('Start Date') }}</th>
                                            <th>{{ __('End Date') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subscriptions as $subscription)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('s.plans.show', $subscription->plan) }}"
                                                        class="text-primary text-decoration-none">
                                                        {{ $subscription->plan->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="badge bg-light text-dark text-capitalize">
                                                        {{ $subscription->billing_cycle }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="fw-medium">{{ $subscription->currency }}
                                                        {{ number_format($subscription->amount, 2) }}</span>
                                                </td>
                                                <td>{{ $subscription->start_date->format('d M Y') }}</td>
                                                <td>{{ $subscription->end_date ? $subscription->end_date->format('d M Y') : '—' }}
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
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="{{ route('s.subscriptions.show', $subscription) }}"
                                                            class="btn btn-sm btn-light"
                                                            title="{{ __('View') }}">
                                                            <i class="ti ti-eye"></i>
                                                        </a>
                                                        @if ($subscription->status === 'active')
                                                            <button type="button" class="btn btn-sm btn-warning"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cancelSubscriptionModal_{{ $subscription->id }}"
                                                                title="{{ __('Cancel') }}">
                                                                <i class="ti ti-x"></i>
                                                            </button>
                                                        @endif
                                                        <a href="#" class="btn btn-sm btn-light text-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete_subscription_{{ $subscription->id }}"
                                                            title="{{ __('Delete') }}">
                                                            <i class="ti ti-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Cancel Subscription Modal -->
                                            @if ($subscription->status === 'active')
                                                <div class="modal fade"
                                                    id="cancelSubscriptionModal_{{ $subscription->id }}"
                                                    tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    {{ __('Cancel Subscription') }}</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <form
                                                                action="{{ route('s.subscriptions.cancel', $subscription) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <p>{{ __('Are you sure you want to cancel this subscription?') }}
                                                                    </p>
                                                                    <div class="mb-3">
                                                                        <label
                                                                            for="cancel_reason_{{ $subscription->id }}"
                                                                            class="form-label">{{ __('Reason (optional)') }}</label>
                                                                        <textarea class="form-control" id="cancel_reason_{{ $subscription->id }}" name="cancel_reason" rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-outline-light"
                                                                        data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                                                    <button type="submit"
                                                                        class="btn btn-warning">{{ __('Cancel Subscription') }}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            <!-- Delete Subscription Modal -->
                                            <div class="modal fade" id="delete_subscription_{{ $subscription->id }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">{{ __('Delete Subscription') }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>{{ __('Are you sure you want to delete this subscription?') }}
                                                            </p>
                                                            <p class="mb-0">
                                                                <strong>{{ $subscription->plan->name }}</strong>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-light"
                                                                data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                                            <form
                                                                action="{{ route('s.subscriptions.destroy', $subscription) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">{{ __('Delete') }}</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted mb-0">{{ __('No subscriptions found') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Subscription Modal -->
    <div class="modal fade" id="addSubscriptionModal" tabindex="-1" aria-labelledby="addSubscriptionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSubscriptionModalLabel">{{ __('Add Subscription') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('s.subscriptions.store') }}" method="POST" id="subscriptionForm">
                    @csrf
                    <input type="hidden" name="company_id" value="{{ $company->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="plan_id" class="form-label">{{ __('Plan') }} <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('plan_id') is-invalid @enderror" id="plan_id"
                                    name="plan_id" required>
                                    <option value="">{{ __('Select Plan') }}</option>
                                    @foreach ($plans as $plan)
                                        <option value="{{ $plan->id }}"
                                            data-monthly-price="{{ $plan->monthly_price }}"
                                            data-yearly-price="{{ $plan->yearly_price }}"
                                            data-currency="{{ $plan->currency }}">
                                            {{ $plan->name }} ({{ $plan->currency }}
                                            {{ number_format($plan->monthly_price, 2) }}/mo)
                                        </option>
                                    @endforeach
                                </select>
                                @error('plan_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="billing_cycle" class="form-label">{{ __('Billing Cycle') }} <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('billing_cycle') is-invalid @enderror"
                                    id="billing_cycle" name="billing_cycle" required>
                                    <option value="monthly">{{ __('Monthly') }}</option>
                                    <option value="yearly">{{ __('Yearly') }}</option>
                                </select>
                                @error('billing_cycle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="start_date" class="form-label">{{ __('Start Date') }} <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                    id="start_date" name="start_date"
                                    value="{{ old('start_date', date('Y-m-d')) }}" required>
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="trial_ends_at" class="form-label">{{ __('Trial Ends At') }}</label>
                                <input type="date"
                                    class="form-control @error('trial_ends_at') is-invalid @enderror"
                                    id="trial_ends_at" name="trial_ends_at" value="{{ old('trial_ends_at') }}">
                                @error('trial_ends_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">{{ __('Status') }}</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status"
                                    name="status">
                                    <option value="active">{{ __('Active') }}</option>
                                    <option value="trial">{{ __('Trial') }}</option>
                                    <option value="suspended">{{ __('Suspended') }}</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" id="auto_renew"
                                        name="auto_renew" value="1" checked>
                                    <label class="form-check-label" for="auto_renew">
                                        {{ __('Auto Renew') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light"
                            data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Create Subscription') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="delete_company_{{ $company->id }}" tabindex="-1"
        aria-labelledby="delete_company_{{ $company->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete_company_{{ $company->id }}Label">
                        {{ __('Delete Company') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are you sure you want to delete this company?') }}</p>
                    <p class="mb-0"><strong>{{ $company->name }}</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                        {{ __('Cancel') }}</button>
                    <form action="{{ route('s.companies.destroy', $company) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .avatar {
                width: 2.5rem;
                height: 2.5rem;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .card-header {
                background: linear-gradient(to right, #f8f9fa, #ffffff);
            }

            .bg-purple {
                background-color: #6f42c1 !important;
            }

            .table-hover tbody tr:hover {
                background-color: #f8f9fa;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Handle domain status toggle
                document.querySelectorAll('.domain-toggle-form').forEach(form => {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();

                        const form = this;
                        const domainId = form.dataset.domainId;
                        const submitBtn = form.querySelector('.domain-toggle-btn');
                        const originalText = submitBtn.innerHTML;

                        // Disable button during request
                        submitBtn.disabled = true;
                        submitBtn.innerHTML =
                            '<i class="ti ti-loader"></i> {{ __('Processing...') }}';

                        const formData = new FormData(form);
                        formData.append('_method', 'PATCH');
                        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content ||
                            form.querySelector('input[name="_token"]').value;

                        fetch(form.action, {
                                method: 'POST',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'X-CSRF-TOKEN': csrfToken,
                                    'Accept': 'application/json'
                                },
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Update badge
                                    const badge = document.querySelector(
                                        `.domain-status-${domainId}`);
                                    if (data.status) {
                                        badge.className =
                                            'badge domain-status-badge domain-status-' + domainId +
                                            ' bg-success';
                                        badge.textContent = '{{ __('Active') }}';
                                        submitBtn.className =
                                            'btn btn-sm  domain-toggle-btn domain-toggle-' +
                                            domainId + ' btn-danger p-1 py-0 text-white';
                                        submitBtn.innerHTML =
                                            '<i class="ti ti-toggle-left me-1"></i> {{ __('Deactivate') }}';
                                    } else {
                                        badge.className =
                                            'badge domain-status-badge domain-status-' + domainId +
                                            ' bg-danger';
                                        badge.textContent = '{{ __('Inactive') }}';
                                        submitBtn.className =
                                            'btn btn-sm domain-toggle-btn domain-toggle-' +
                                            domainId + ' btn-success p-1 py-0 text-white';
                                        submitBtn.innerHTML =
                                            '<i class="ti ti-toggle-right me-1"></i> {{ __('Activate') }}';
                                    }
                                } else {
                                    alert(data.message ||
                                        '{{ __('An error occurred. Please try again.') }}');
                                    submitBtn.innerHTML = originalText;
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('{{ __('An error occurred. Please try again.') }}');
                                submitBtn.innerHTML = originalText;
                            })
                            .finally(() => {
                                submitBtn.disabled = false;
                            });
                    });
                });

                // Subscription form handlers
                const planSelect = document.getElementById('plan_id');
                const billingCycleSelect = document.getElementById('billing_cycle');
                const subscriptionForm = document.getElementById('subscriptionForm');

                // Handle plan and billing cycle change to update amount (if needed)
                function updateAmount() {
                    const selectedOption = planSelect?.options[planSelect.selectedIndex];
                    if (selectedOption && billingCycleSelect) {
                        const billingCycle = billingCycleSelect.value;
                        const monthlyPrice = selectedOption.dataset.monthlyPrice;
                        const yearlyPrice = selectedOption.dataset.yearlyPrice;
                        const currency = selectedOption.dataset.currency;
                        // You can update a display element here if needed
                    }
                }

                planSelect?.addEventListener('change', updateAmount);
                billingCycleSelect?.addEventListener('change', updateAmount);
            });
        </script>
    @endpush
</x-app-layout>
