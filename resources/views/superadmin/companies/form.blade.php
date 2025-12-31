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

        <div class="card border-0 rounded-0">
            <div class="card-body">
                <form action="{{ $company ? route('s.companies.update', $company) : route('s.companies.store') }}"
                    method="POST" enctype="multipart/form-data" id="companyForm">
                    @csrf
                    @if ($company)
                        @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">{{ __('Company Name') }} <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name', $company->name ?? '') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_id" class="form-label">{{ __('Owner') }} <span
                                    class="text-danger">*</span></label>
                            <select class="form-select @error('user_id') is-invalid @enderror" id="user_id"
                                name="user_id" required>
                                <option value="">{{ __('Select Owner') }}</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ old('user_id', $company->user_id ?? '') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="logo" class="form-label">{{ __('Logo') }}</label>
                            <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                id="logo" name="logo" accept="image/*">
                            @if ($company && $company->logo)
                                <small class="text-muted d-block mt-1">{{ __('Current logo:') }}</small>
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo"
                                    class="img-thumbnail mt-2" style="max-width: 150px;">
                            @endif
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email', $company->email ?? '') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                id="phone_number" name="phone_number"
                                value="{{ old('phone_number', $company->phone_number ?? '') }}" maxlength="15">
                            @error('phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">{{ __('Status') }}</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status"
                                name="status">
                                <option value="1"
                                    {{ old('status', $company->status ?? 1) == 1 ? 'selected' : '' }}>
                                    {{ __('Active') }}</option>
                                <option value="0"
                                    {{ old('status', $company->status ?? 0) == 0 ? 'selected' : '' }}>
                                    {{ __('Inactive') }}</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">{{ __('Domains') }}</label>
                            <div id="domains_container">
                                @if ($company && $company->domains->count() > 0)
                                    @foreach ($company->domains as $index => $domain)
                                        <div class="domain-item mb-2">
                                            <div class="row g-2">
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text">https://</span>
                                                        <input type="text" class="form-control"
                                                            name="domains[{{ $index }}][domain]"
                                                            value="{{ old("domains.{$index}.domain", $domain->domain) }}"
                                                            placeholder="{{ __('Domain') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="domains[{{ $index }}][primary]"
                                                            value="1" id="domain_{{ $index }}_primary"
                                                            {{ old("domains.{$index}.primary", $domain->primary) ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="domain_{{ $index }}_primary">
                                                            {{ __('Primary') }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="domains[{{ $index }}][status]"
                                                            value="1" id="domain_{{ $index }}_status"
                                                            {{ old("domains.{$index}.status", $domain->status) ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="domain_{{ $index }}_status">
                                                            {{ __('Active') }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button"
                                                        class="btn btn-sm btn-danger mt-2 remove-domain-btn">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="domain-item mb-2">
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-text">https://</span>
                                                    <input type="text" class="form-control"
                                                        name="domains[0][domain]"
                                                        value="{{ old('domains.0.domain', '') }}"
                                                        placeholder="{{ __('Domain') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="domains[0][primary]" value="1"
                                                        id="domain_0_primary"
                                                        {{ old('domains.0.primary') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="domain_0_primary">
                                                        {{ __('Primary') }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="domains[0][status]" value="1" id="domain_0_status"
                                                        {{ old('domains.0.status', true) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="domain_0_status">
                                                        {{ __('Active') }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button"
                                                    class="btn btn-sm btn-danger mt-2 remove-domain-btn">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary" id="addDomainBtn">
                                <i class="ti ti-plus me-1"></i>{{ __('Add Domain') }}
                            </button>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-2 mt-4">
                        <a href="{{ $company ? route('s.companies.show', $company) : route('s.companies.index') }}"
                            class="btn btn-outline-light">{{ __('Cancel') }}</a>
                        <button type="submit" class="btn btn-primary">
                            {{ $company ? __('Update Company') : __('Create Company') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                            <div class="domain-item mb-2">
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text">https://</span>
                                            <input type="text" class="form-control" name="domains[${domainIndex}][domain]" placeholder="{{ __('Domain') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check mt-2">
                                            <input class="form-check-input domain-primary-checkbox" type="checkbox" name="domains[${domainIndex}][primary]" value="1" id="domain_${domainIndex}_primary">
                                            <label class="form-check-label" for="domain_${domainIndex}_primary">{{ __('Primary') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" name="domains[${domainIndex}][status]" value="1" id="domain_${domainIndex}_status" checked>
                                            <label class="form-check-label" for="domain_${domainIndex}_status">{{ __('Active') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-sm btn-danger mt-2 remove-domain-btn">
                                            <i class="ti ti-trash"></i>
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
