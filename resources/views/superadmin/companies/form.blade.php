<x-app-layout :page="$company ? __('Edit Company') : __('Add New Company')" for="superadmin">
    <div class="content pb-0">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">
                    {{ $company ? __('Edit Company') : __('Add New Company') }}
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('s.dashboard', absolute: false) }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('s.companies.index', absolute: false) }}">{{ __('Companies') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $company ? __('Edit') : __('Create') }}
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="{{ $company ? route('s.companies.show', $company) : route('s.companies.index') }}"
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

        <form action="{{ $company ? route('s.companies.update', $company) : route('s.companies.store') }}"
            method="POST" enctype="multipart/form-data" id="companyForm">
            @csrf
            @if ($company)
                @method('PUT')
            @endif

            @if (!$company)
                <!-- Company Owner Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <div class="d-flex align-items-center">
                            <div
                                class="avatar avatar-sm bg-primary text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                                <i class="ti ti-user fs-5"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-semibold">{{ __('Company Owner Information') }}</h5>
                                <small
                                    class="text-muted">{{ __('An invitation email will be sent to the user') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="user_first_name" class="form-label fw-semibold">
                                    {{ __('First Name') }} <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="ti ti-user text-muted"></i>
                                    </span>
                                    <input type="text"
                                        class="form-control @error('user_first_name') is-invalid @enderror border-start-0"
                                        id="user_first_name" name="user_first_name"
                                        value="{{ old('user_first_name', '') }}"
                                        placeholder="{{ __('Enter first name') }}" required>
                                    @error('user_first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="user_last_name" class="form-label fw-semibold">
                                    {{ __('Last Name') }} <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="ti ti-user text-muted"></i>
                                    </span>
                                    <input type="text"
                                        class="form-control @error('user_last_name') is-invalid @enderror border-start-0"
                                        id="user_last_name" name="user_last_name"
                                        value="{{ old('user_last_name', '') }}"
                                        placeholder="{{ __('Enter last name') }}" required>
                                    @error('user_last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="user_email" class="form-label fw-semibold">
                                    {{ __('Email Address') }} <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="ti ti-mail text-muted"></i>
                                    </span>
                                    <input type="email"
                                        class="form-control @error('user_email') is-invalid @enderror border-start-0"
                                        id="user_email" name="user_email" value="{{ old('user_email', '') }}"
                                        placeholder="{{ __('Enter email address') }}" required>
                                    @error('user_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Company Information Section -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <div class="d-flex align-items-center">
                        <div
                            class="avatar avatar-sm bg-info text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                            <i class="ti ti-building fs-5"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-semibold">{{ __('Company Information') }}</h5>
                            <small class="text-muted">{{ __('Basic details about the company') }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-semibold">
                                {{ __('Company Name') }} <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ti ti-building text-muted"></i>
                                </span>
                                <input type="text"
                                    class="form-control @error('name') is-invalid @enderror border-start-0"
                                    id="name" name="name" value="{{ old('name', $company->name ?? '') }}"
                                    placeholder="{{ __('Enter company name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">
                                {{ __('Company Email') }}
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ti ti-mail text-muted"></i>
                                </span>
                                <input type="email"
                                    class="form-control @error('email') is-invalid @enderror border-start-0"
                                    id="email" name="email" value="{{ old('email', $company->email ?? '') }}"
                                    placeholder="{{ __('Enter company email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number" class="form-label fw-semibold">
                                {{ __('Phone Number') }}
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ti ti-phone text-muted"></i>
                                </span>
                                <input type="text"
                                    class="form-control @error('phone_number') is-invalid @enderror border-start-0"
                                    id="phone_number" name="phone_number"
                                    value="{{ old('phone_number', $company->phone_number ?? '') }}"
                                    placeholder="{{ __('Enter phone number') }}" maxlength="15">
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="logo" class="form-label fw-semibold">
                                {{ __('Company Logo') }}
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ti ti-photo text-muted"></i>
                                </span>
                                <input type="file"
                                    class="form-control @error('logo') is-invalid @enderror border-start-0"
                                    id="logo" name="logo" accept="image/*">
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            @if ($company && $company->logo)
                                <div class="mt-3">
                                    <small class="text-muted d-block mb-2">{{ __('Current logo:') }}</small>
                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo"
                                        class="img-thumbnail" style="max-width: 150px; border-radius: 8px;">
                                </div>
                            @endif
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
                                        {{ old('status', $company->status ?? 1) == 1 ? 'selected' : '' }}>
                                        {{ __('Active') }}
                                    </option>
                                    <option value="0"
                                        {{ old('status', $company->status ?? 0) == 0 ? 'selected' : '' }}>
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

            <!-- Domains Section -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div
                                class="avatar avatar-sm bg-success text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                                <i class="ti ti-world fs-5"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-semibold">{{ __('Domains') }}</h5>
                                <small class="text-muted">{{ __('Configure company domains') }}</small>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-primary" id="addDomainBtn">
                            <i class="ti ti-plus me-1"></i>{{ __('Add Domain') }}
                        </button>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div id="domains_container">
                        @if ($company && $company->domains->count() > 0)
                            @foreach ($company->domains as $index => $domain)
                                <div class="domain-item mb-3 p-3 bg-light rounded border">
                                    <div class="row g-3 align-items-end">
                                        <div class="col-md-6">
                                            <label
                                                class="form-label fw-semibold small mb-1">{{ __('Domain URL') }}</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-white">https://</span>
                                                <input type="text" class="form-control"
                                                    name="domains[{{ $index }}][domain]"
                                                    value="{{ old("domains.{$index}.domain", $domain->domain) }}"
                                                    placeholder="{{ __('example.com') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    name="domains[{{ $index }}][primary]" value="1"
                                                    id="domain_{{ $index }}_primary"
                                                    {{ old("domains.{$index}.primary", $domain->primary) ? 'checked' : '' }}>
                                                <label class="form-check-label fw-semibold small"
                                                    for="domain_{{ $index }}_primary">
                                                    {{ __('Primary') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    name="domains[{{ $index }}][status]" value="1"
                                                    id="domain_{{ $index }}_status"
                                                    {{ old("domains.{$index}.status", $domain->status) ? 'checked' : '' }}>
                                                <label class="form-check-label fw-semibold small"
                                                    for="domain_{{ $index }}_status">
                                                    {{ __('Active') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button"
                                                class="btn btn-sm btn-outline-danger w-100 remove-domain-btn">
                                                <i class="ti ti-trash me-1"></i>{{ __('Remove') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="domain-item mb-3 p-3 bg-light rounded border">
                                <div class="row g-3 align-items-end">
                                    <div class="col-md-6">
                                        <label
                                            class="form-label fw-semibold small mb-1">{{ __('Domain URL') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white">https://</span>
                                            <input type="text" class="form-control" name="domains[0][domain]"
                                                value="{{ old('domains.0.domain', '') }}"
                                                placeholder="{{ __('example.com') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                name="domains[0][primary]" value="1" id="domain_0_primary"
                                                {{ old('domains.0.primary') ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold small" for="domain_0_primary">
                                                {{ __('Primary') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="domains[0][status]"
                                                value="1" id="domain_0_status"
                                                {{ old('domains.0.status', true) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold small" for="domain_0_status">
                                                {{ __('Active') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button"
                                            class="btn btn-sm btn-outline-danger w-100 remove-domain-btn">
                                            <i class="ti ti-trash me-1"></i>{{ __('Remove') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="d-flex align-items-center justify-content-between gap-3 pt-3 mb-2 border-top">
                <a href="{{ $company ? route('s.companies.show', $company) : route('s.companies.index') }}"
                    class="btn btn-outline-secondary">
                    <i class="ti ti-x me-1"></i>{{ __('Cancel') }}
                </a>
                <button type="submit" class="btn btn-primary px-4">
                    <i class="ti ti-{{ $company ? 'device-floppy' : 'plus' }} me-1"></i>
                    {{ $company ? __('Update Company') : __('Create Company') }}
                </button>
            </div>
        </form>
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

            .input-group-text {
                min-width: 45px;
                justify-content: center;
            }

            .domain-item {
                transition: all 0.2s ease;
            }

            .domain-item:hover {
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .form-label {
                font-size: 0.875rem;
                margin-bottom: 0.5rem;
            }

            .form-switch .form-check-input {
                cursor: pointer;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let domainIndex = {{ $company && $company->domains->count() > 0 ? $company->domains->count() : 1 }};

                // Add Domain Button
                const addDomainBtn = document.getElementById('addDomainBtn');
                if (addDomainBtn) {
                    addDomainBtn.addEventListener('click', function() {
                        const container = document.getElementById('domains_container');
                        const domainHtml = `
                            <div class="domain-item mb-3 p-3 bg-light rounded border">
                                <div class="row g-3 align-items-end">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold small mb-1">{{ __('Domain URL') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white">https://</span>
                                            <input type="text" class="form-control" name="domains[${domainIndex}][domain]" placeholder="{{ __('example.com') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input domain-primary-checkbox" type="checkbox" name="domains[${domainIndex}][primary]" value="1" id="domain_${domainIndex}_primary">
                                            <label class="form-check-label fw-semibold small" for="domain_${domainIndex}_primary">{{ __('Primary') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="domains[${domainIndex}][status]" value="1" id="domain_${domainIndex}_status" checked>
                                            <label class="form-check-label fw-semibold small" for="domain_${domainIndex}_status">{{ __('Active') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-sm btn-outline-danger w-100 remove-domain-btn">
                                            <i class="ti ti-trash me-1"></i>{{ __('Remove') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        `;
                        container.insertAdjacentHTML('beforeend', domainHtml);
                        domainIndex++;
                    });
                }

                // Remove Domain Button
                document.addEventListener('click', function(e) {
                    if (e.target.closest('.remove-domain-btn')) {
                        const domainItem = e.target.closest('.domain-item');
                        const domainItems = document.querySelectorAll('.domain-item');
                        if (domainItems.length > 1) {
                            domainItem.remove();
                        } else {
                            alert('{{ __('At least one domain is required.') }}');
                        }
                    }
                });

                // Ensure only one primary domain is selected using event delegation
                const domainsContainer = document.getElementById('domains_container');
                if (domainsContainer) {
                    domainsContainer.addEventListener('change', function(e) {
                        if (e.target.name && e.target.name.includes('[primary]')) {
                            if (e.target.checked) {
                                // Uncheck all other primary checkboxes
                                const allPrimaryCheckboxes = document.querySelectorAll(
                                    'input[name*="[primary]"]');
                                allPrimaryCheckboxes.forEach(cb => {
                                    if (cb !== e.target) {
                                        cb.checked = false;
                                    }
                                });
                            }
                        }
                    });
                }
            });
        </script>
    @endpush
</x-app-layout>
