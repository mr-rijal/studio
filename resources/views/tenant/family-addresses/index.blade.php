<x-app-layout :page="__('Family Addresses')">
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
                    {{ __('Family Addresses') }}
                    <span class="badge badge-soft-primary ms-2">{{ $familyAddresses->total() }}</span>
                </h4>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="{{ route('family-addresses.create') }}" class="btn btn-primary">
                    <i class="ti ti-square-rounded-plus-filled me-1"></i>
                    {{ __('Add New Family Address') }}
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
                <form method="GET" action="{{ route('family-addresses.index') }}"
                    class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <div class="input-group input-group-flat">
                            <input type="text" name="search" class="form-control"
                                placeholder="{{ __('Search by address, city, state, or zip') }}"
                                value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="ti ti-search"></i>
                            </button>
                        </div>
                        <select name="family_id" class="form-select" style="width: auto;" id="familyFilter">
                            <option value="">{{ __('All Families') }}</option>
                            @foreach ($families as $family)
                                <option value="{{ $family->id }}"
                                    {{ request('family_id') == $family->id ? 'selected' : '' }}>
                                    {{ __('Family') }} #{{ $family->id }}
                                </option>
                            @endforeach
                        </select>
                        @if (request('search') || request('family_id'))
                            <a href="{{ route('family-addresses.index') }}" class="btn btn-outline-light">
                                <i class="ti ti-x me-1"></i>{{ __('Clear') }}
                            </a>
                        @endif
                    </div>
                </form>

                <div class="table-responsive custom-table">
                    <table class="table table-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th class="no-sort">
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox" id="select-all">
                                    </div>
                                </th>
                                <th>{{ __('Family') }}</th>
                                <th>{{ __('Home Address') }}</th>
                                <th>{{ __('City') }}</th>
                                <th>{{ __('State') }}</th>
                                <th>{{ __('Zip') }}</th>
                                <th>{{ __('Created Date') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($familyAddresses as $familyAddress)
                                <tr class="table-row">
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input family-address-checkbox" type="checkbox"
                                                name="family_address_ids[]" value="{{ $familyAddress->id }}">
                                        </div>
                                    </td>
                                    <td>
                                        {{ __('Family') }} #{{ $familyAddress->family_id }}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('family-addresses.show', $familyAddress) }}"
                                                    class="fw-medium text-decoration-none">
                                                    {{ $familyAddress->home_address }}
                                                </a>
                                                <div class="row-actions text-muted">
                                                    <span class="edit">
                                                        <a
                                                            href="{{ route('family-addresses.edit', $familyAddress) }}">{{ __('Edit') }}</a>
                                                        |
                                                    </span>
                                                    <span class="delete">
                                                        <a href="#" class="text-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_family_address_{{ $familyAddress->id }}">{{ __('Delete') }}</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $familyAddress->city }}</td>
                                    <td>{{ $familyAddress->state }}</td>
                                    <td>{{ $familyAddress->zip }}</td>
                                    <td>
                                        {{ $familyAddress->created_at->format('d M Y, h:i A') }}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="{{ route('family-addresses.show', $familyAddress) }}"
                                                class="btn btn-sm btn-light" title="{{ __('View') }}">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('family-addresses.edit', $familyAddress) }}"
                                                class="btn btn-sm btn-light" title="{{ __('Edit') }}">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-light text-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#delete_family_address_{{ $familyAddress->id }}"
                                                title="{{ __('Delete') }}">
                                                <i class="ti ti-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="delete_family_address_{{ $familyAddress->id }}"
                                    tabindex="-1"
                                    aria-labelledby="delete_family_address_{{ $familyAddress->id }}Label"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="delete_family_address_{{ $familyAddress->id }}Label">
                                                    {{ __('Delete Family Address') }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>{{ __('Are you sure you want to delete this family address?') }}</p>
                                                <p class="mb-0"><strong>{{ $familyAddress->home_address }}</strong>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-light"
                                                    data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                                <form action="{{ route('family-addresses.destroy', $familyAddress) }}"
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
                                    <td colspan="8" class="text-center py-4">{{ __('No family addresses found') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($familyAddresses->hasPages())
                    <div class="card-footer border-top">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="mb-0 text-muted">
                                    {{ __('Showing') }}
                                    <span>{{ $familyAddresses->firstItem() }}</span>
                                    {{ __('to') }}
                                    <span>{{ $familyAddresses->lastItem() }}</span>
                                    {{ __('of') }}
                                    <span>{{ $familyAddresses->total() }}</span>
                                    {{ __('results') }}
                                </p>
                            </div>
                            <div>
                                {{ $familyAddresses->links() }}
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
                    <h5 class="modal-title" id="bulkDeleteModalLabel">{{ __('Delete Family Addresses') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are you sure you want to delete the selected family addresses?') }}</p>
                    <p class="mb-0 text-muted">
                        <span id="bulkDeleteCount">0</span> {{ __('family address(es) will be deleted.') }}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                        {{ __('Cancel') }}</button>
                    <form action="{{ route('family-addresses.bulk-destroy') }}" method="POST" id="bulkDeleteForm">
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
                const selectAll = document.getElementById('select-all');
                const familyAddressCheckboxes = document.querySelectorAll('.family-address-checkbox');
                const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
                const familyFilter = document.getElementById('familyFilter');
                const searchForm = document.querySelector('form[method="GET"]');

                // Handle family filter change
                if (familyFilter && searchForm) {
                    familyFilter.addEventListener('change', function() {
                        searchForm.submit();
                    });
                }

                selectAll?.addEventListener('change', function() {
                    familyAddressCheckboxes.forEach(checkbox => {
                        checkbox.checked = this.checked;
                    });
                    updateBulkDeleteButton();
                });

                familyAddressCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        updateBulkDeleteButton();
                        if (selectAll) {
                            selectAll.checked = Array.from(familyAddressCheckboxes).every(cb => cb
                                .checked);
                        }
                    });
                });

                function updateBulkDeleteButton() {
                    const checked = document.querySelectorAll('.family-address-checkbox:checked');
                    if (checked.length > 0) {
                        bulkDeleteBtn.classList.remove('d-none');
                        document.getElementById('bulkDeleteCount').textContent = checked.length;
                    } else {
                        bulkDeleteBtn.classList.add('d-none');
                    }
                }

                document.getElementById('bulkDeleteForm')?.addEventListener('submit', function(e) {
                    const checked = document.querySelectorAll('.family-address-checkbox:checked');
                    const ids = Array.from(checked).map(cb => cb.value);

                    if (ids.length === 0) {
                        e.preventDefault();
                        alert('{{ __('Please select at least one family address to delete.') }}');
                        return false;
                    }

                    this.querySelectorAll('input[name="ids[]"]').forEach(input => input.remove());

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
