<x-app-layout :page="__('Companies')" for="superadmin">
    <div class="content pb-0">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">
                    {{ __('Companies') }}
                    <span class="badge badge-soft-primary ms-2">{{ $companies->total() }}</span>
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('s.dashboard', absolute: false) }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Companies') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <div class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-light px-2 shadow"
                        data-bs-toggle="dropdown">
                        <i class="ti ti-package-export me-2"></i>
                        {{ __('Export') }}
                    </a>
                    <div class="dropdown-menu  dropdown-menu-end">
                        <ul>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="ti ti-file-type-pdf me-1"></i>
                                    {{ __('Export as PDF') }}
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="ti ti-file-type-xls me-1"></i>
                                    {{ __('Export as Excel') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="{{ route('s.companies.create', absolute: false) }}" class="btn btn-primary">
                    <i class="ti ti-square-rounded-plus-filled me-1"></i>
                    {{ __('Add New Company') }}
                </a>
                <button type="button" class="btn btn-danger d-none" id="bulkDeleteBtn" data-bs-toggle="modal"
                    data-bs-target="#bulkDeleteModal">
                    <i class="ti ti-trash me-1"></i>
                    {{ __('Delete Selected') }}
                </button>
            </div>
        </div>

        <div class="card border-0 rounded-0">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn btn-outline-light shadow px-2"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <i class="ti ti-filter me-2"></i>
                                {{ __('Filter') }}
                                <i class="ti ti-chevron-down ms-2"></i>
                            </a>
                            <div class="filter-dropdown-menu dropdown-menu dropdown-menu-lg p-0">
                                <div
                                    class="filter-header d-flex align-items-center justify-content-between border-bottom">
                                    <h6 class="mb-0"><i class="ti ti-filter me-1"></i>Filter</h6>
                                    <button type="button" class="btn-close close-filter-btn"
                                        data-bs-dismiss="dropdown-menu" aria-label="Close"></button>
                                </div>
                                <div class="filter-set-view p-3">
                                    <div class="accordion" id="accordionExample">
                                        <div class="filter-set-content">
                                            <div class="filter-set-content-head">
                                                <a href="#" class="collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#country" aria-expanded="false"
                                                    aria-controls="country">Country</a>
                                            </div>
                                            <div class="filter-set-contents accordion-collapse collapse" id="country"
                                                data-bs-parent="#accordionExample">
                                                <div
                                                    class="filter-content-list bg-light rounded border p-2 shadow mt-2">
                                                    <div class="mb-1">
                                                        <div class="input-icon-start input-icon position-relative">
                                                            <span class="input-icon-addon fs-12">
                                                                <i class="ti ti-search"></i>
                                                            </span>
                                                            <input type="text" class="form-control form-control-md"
                                                                placeholder="Search">
                                                        </div>
                                                    </div>
                                                    <ul class="mb-0">
                                                        <li class="mb-1">
                                                            <label class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                USA
                                                            </label>
                                                        </li>
                                                        <li class="mb-1">
                                                            <label class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                France
                                                            </label>
                                                        </li>
                                                        <li class="mb-1">
                                                            <label class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                Italy
                                                            </label>
                                                        </li>
                                                        <li class="mb-1">
                                                            <label class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                Germany
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="link-primary text-decoration-underline p-2 pt-0 d-flex">Load
                                                                More</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="filter-set-content">
                                            <div class="filter-set-content-head">
                                                <a href="#" class="collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#owner" aria-expanded="false"
                                                    aria-controls="owner">Owner</a>
                                            </div>
                                            <div class="filter-set-contents accordion-collapse collapse"
                                                id="owner" data-bs-parent="#accordionExample">
                                                <div
                                                    class="filter-content-list bg-light rounded border p-2 shadow mt-2">
                                                    <div class="mb-1">
                                                        <div class="input-icon-start input-icon position-relative">
                                                            <span class="input-icon-addon fs-12">
                                                                <i class="ti ti-search"></i>
                                                            </span>
                                                            <input type="text" class="form-control form-control-md"
                                                                placeholder="Search">
                                                        </div>
                                                    </div>
                                                    <ul class="mb-0">
                                                        <li class="mb-1">
                                                            <label
                                                                class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                Hendry Milner
                                                            </label>
                                                        </li>
                                                        <li class="mb-1">
                                                            <label
                                                                class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                Guilory Berggren
                                                            </label>
                                                        </li>
                                                        <li class="mb-1">
                                                            <label
                                                                class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                Jami Carlile
                                                            </label>
                                                        </li>
                                                        <li class="mb-1">
                                                            <label
                                                                class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                Theresa Nelson
                                                            </label>
                                                        </li>
                                                        <li class="mb-1">
                                                            <label
                                                                class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                Smith Cooper
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="link-primary text-decoration-underline p-2 pt-0 d-flex">Load
                                                                More</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="filter-set-content">
                                            <div class="filter-set-content-head">
                                                <a href="#" class="collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">Tags</a>
                                            </div>
                                            <div class="filter-set-contents accordion-collapse collapse"
                                                id="collapseThree" data-bs-parent="#accordionExample">
                                                <div
                                                    class="filter-content-list bg-light rounded border p-2 shadow mt-2">
                                                    <ul>
                                                        <li>
                                                            <label
                                                                class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                Collab
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label
                                                                class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                Promotion
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label
                                                                class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                VIP
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="filter-set-content">
                                            <div class="filter-set-content-head">
                                                <a href="#" class="collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne" aria-expanded="false"
                                                    aria-controls="collapseOne">Rating</a>
                                            </div>
                                            <div class="filter-set-contents accordion-collapse collapse"
                                                id="collapseOne" data-bs-parent="#accordionExample">
                                                <div
                                                    class="filter-content-list bg-light rounded border p-2 shadow mt-2">
                                                    <ul>
                                                        <li>
                                                            <label
                                                                class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                <span class="rating">
                                                                    <i class="ti ti-star-filled text-warning"></i>
                                                                    <i class="ti ti-star-filled text-warning"></i>
                                                                    <i class="ti ti-star-filled text-warning"></i>
                                                                    <i class="ti ti-star-filled text-warning"></i>
                                                                    <i class="ti ti-star-filled text-warning"></i>
                                                                    <span class="ms-1">5.0</span>
                                                                </span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label
                                                                class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                <span class="rating">
                                                                    <i class="ti ti-star-filled text-warning"></i>
                                                                    <i class="ti ti-star-filled text-warning"></i>
                                                                    <i class="ti ti-star-filled text-warning"></i>
                                                                    <i class="ti ti-star-filled text-warning"></i>
                                                                    <i class="ti ti-star-filled"></i>
                                                                    <span class="ms-1">4.0</span>
                                                                </span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label
                                                                class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                <span class="rating">
                                                                    <i class="ti ti-star-filled text-warning"></i>
                                                                    <i class="ti ti-star-filled text-warning"></i>
                                                                    <i class="ti ti-star-filled text-warning"></i>
                                                                    <i class="ti ti-star-filled"></i>
                                                                    <i class="ti ti-star-filled"></i>
                                                                    <span class="ms-1">3.0</span>
                                                                </span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label
                                                                class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                <span class="rating">
                                                                    <i class="ti ti-star-filled text-warning"></i>
                                                                    <i class="ti ti-star-filled text-warning"></i>
                                                                    <i class="ti ti-star-filled"></i>
                                                                    <i class="ti ti-star-filled"></i>
                                                                    <i class="ti ti-star-filled"></i>
                                                                    <span class="ms-1">2.0</span>
                                                                </span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label
                                                                class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                <span class="rating">
                                                                    <i class="ti ti-star-filled text-warning"></i>
                                                                    <i class="ti ti-star-filled"></i>
                                                                    <i class="ti ti-star-filled"></i>
                                                                    <i class="ti ti-star-filled"></i>
                                                                    <i class="ti ti-star-filled"></i>
                                                                    <span class="ms-1">1.0</span>
                                                                </span>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="filter-set-content">
                                            <div class="filter-set-content-head">
                                                <a href="#" class="collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#Status" aria-expanded="false"
                                                    aria-controls="Status">Status</a>
                                            </div>
                                            <div class="filter-set-contents accordion-collapse collapse"
                                                id="Status" data-bs-parent="#accordionExample">
                                                <div
                                                    class="filter-content-list bg-light rounded border p-2 shadow mt-2">
                                                    <ul>
                                                        <li>
                                                            <label
                                                                class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                Active
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label
                                                                class="dropdown-item px-2 d-flex align-items-center">
                                                                <input class="form-check-input m-0 me-1"
                                                                    type="checkbox">
                                                                Inactive
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="javascript:void(0);" class="btn btn-outline-light w-100">Reset</a>
                                        <a href="company.html" class="btn btn-primary w-100">Filter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <div class="input-group input-group-flat">
                            <input type="text" class="form-control" placeholder="{{ __('Search') }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="ti ti-search"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive custom-table">
                    <table class="table table-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th class="no-sort">
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox" id="select-all">
                                    </div>
                                </th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Account URL') }}</th>
                                <th>{{ __('Owner') }}</th>
                                <th>{{ __('Created Date') }}</th>
                                <th>{{ __('Status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companies as $company)
                                <tr class="table-row">
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input company-checkbox" type="checkbox"
                                                name="company_ids[]" value="{{ $company->id }}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="javascript:void(0);"
                                                class="avatar rounded-circle border p-1 me-2">
                                                @if ($company->logo)
                                                    <img class="w-auto h-auto rounded-circle table-avatar"
                                                        src="{{ asset('storage/' . $company->logo) }}"
                                                        alt="{{ $company->name }}">
                                                @else
                                                    <img class="w-auto h-auto"
                                                        src="{{ asset('assets/img/icons/company-icon-01.svg') }}"
                                                        alt="{{ $company->name }}">
                                                @endif
                                            </a>
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('s.companies.show', $company) }}"
                                                    class="fw-medium text-decoration-none">
                                                    {{ $company->name }}
                                                </a>
                                                <div class="row-actions text-muted">
                                                    <span class="edit">
                                                        <a
                                                            href="{{ route('s.companies.edit', $company) }}">{{ __('Edit') }}</a>
                                                        |
                                                    </span>
                                                    <span class="delete">
                                                        <a href="#" class="text-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_company_{{ $company->id }}">{{ __('Delete') }}</a>
                                                        |
                                                    </span>
                                                    <span class="view">
                                                        <a
                                                            href="{{ route('s.companies.show', $company) }}">{{ __('View') }}</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $company->email ?? '—' }}
                                    </td>
                                    <td>
                                        @if ($company->domain)
                                            <a href="https://{{ $company->domain->domain }}" target="_blank"
                                                class="text-primary">
                                                {{ $company->domain->domain }}
                                            </a>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($company->user)
                                            {{ $company->user->name }}
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $company->created_at->format('d M Y, h:i A') }}
                                    </td>
                                    <td>
                                        @if ($company->status)
                                            <span class="badge bg-success">{{ __('Active') }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ __('Inactive') }}</span>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="delete_company_{{ $company->id }}" tabindex="-1"
                                    aria-labelledby="delete_company_{{ $company->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="delete_company_{{ $company->id }}Label">
                                                    {{ __('Delete Company') }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>{{ __('Are you sure you want to delete this company?') }}</p>
                                                <p class="mb-0"><strong>{{ $company->name }}</strong></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-light"
                                                    data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                                <form action="{{ route('s.companies.destroy', $company) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">{{ __('No companies found') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($companies->hasPages())
                    <div class="card-footer border-top">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="mb-0 text-muted">
                                    {{ __('Showing') }}
                                    <span>{{ $companies->firstItem() }}</span>
                                    {{ __('to') }}
                                    <span>{{ $companies->lastItem() }}</span>
                                    {{ __('of') }}
                                    <span>{{ $companies->total() }}</span>
                                    {{ __('results') }}
                                </p>
                            </div>
                            <div>
                                {{ $companies->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Bulk Delete Modal -->
    <div class="modal fade" id="bulkDeleteModal" tabindex="-1" aria-labelledby="bulkDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bulkDeleteModalLabel">{{ __('Delete Companies') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are you sure you want to delete the selected companies?') }}</p>
                    <p class="mb-0 text-muted">
                        <span id="bulkDeleteCount">0</span> {{ __('company(ies) will be deleted.') }}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                        {{ __('Cancel') }}</button>
                    <form action="{{ route('s.companies.bulk-destroy') }}" method="POST" id="bulkDeleteForm">
                        @csrf
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Select All Checkbox
                const selectAll = document.getElementById('select-all');
                const companyCheckboxes = document.querySelectorAll('.company-checkbox');
                const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');

                selectAll?.addEventListener('change', function() {
                    companyCheckboxes.forEach(checkbox => {
                        checkbox.checked = this.checked;
                    });
                    updateBulkDeleteButton();
                });

                companyCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        updateBulkDeleteButton();
                        selectAll.checked = Array.from(companyCheckboxes).every(cb => cb.checked);
                    });
                });

                function updateBulkDeleteButton() {
                    const checked = document.querySelectorAll('.company-checkbox:checked');
                    if (checked.length > 0) {
                        bulkDeleteBtn.classList.remove('d-none');
                        document.getElementById('bulkDeleteCount').textContent = checked.length;
                    } else {
                        bulkDeleteBtn.classList.add('d-none');
                    }
                }

                // Bulk Delete Form
                document.getElementById('bulkDeleteForm')?.addEventListener('submit', function(e) {
                    const checked = document.querySelectorAll('.company-checkbox:checked');
                    const ids = Array.from(checked).map(cb => cb.value);

                    if (ids.length === 0) {
                        e.preventDefault();
                        alert('{{ __('Please select at least one company to delete.') }}');
                        return false;
                    }

                    // Remove any existing hidden inputs
                    this.querySelectorAll('input[name="ids[]"]').forEach(input => input.remove());

                    // Add new hidden inputs for each selected ID
                    ids.forEach(id => {
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = 'ids[]';
                        hiddenInput.value = id;
                        this.appendChild(hiddenInput);
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
