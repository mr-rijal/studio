<x-app-layout :page="__('Policies')">
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
                    {{ __('Policies') }}
                    <span class="badge badge-soft-primary ms-2">{{ $policies->total() }}</span>
                </h4>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="{{ route('policies.create') }}" class="btn btn-primary">
                    <i class="ti ti-square-rounded-plus-filled me-1"></i>
                    {{ __('Add New Policy') }}
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
                <form method="GET" action="{{ route('policies.index') }}"
                    class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <div class="input-group input-group-flat">
                            <input type="text" name="search" class="form-control"
                                placeholder="{{ __('Search by title or description') }}"
                                value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="ti ti-search"></i>
                            </button>
                        </div>
                        <select name="status" class="form-select" style="width: auto;" id="statusFilter">
                            <option value="">{{ __('All Status') }}</option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>
                                {{ __('Active') }}</option>
                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>
                                {{ __('Inactive') }}</option>
                        </select>
                        @if (request('search') || request('status'))
                            <a href="{{ route('policies.index') }}" class="btn btn-outline-light">
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
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Created Date') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($policies as $policy)
                                <tr class="table-row">
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input policy-checkbox" type="checkbox"
                                                name="policy_ids[]" value="{{ $policy->id }}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('policies.show', $policy) }}"
                                                    class="fw-medium text-decoration-none">
                                                    {{ $policy->title }}
                                                </a>
                                                <div class="row-actions text-muted">
                                                    <span class="edit">
                                                        <a
                                                            href="{{ route('policies.edit', $policy) }}">{{ __('Edit') }}</a>
                                                        |
                                                    </span>
                                                    <span class="delete">
                                                        <a href="#" class="text-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_policy_{{ $policy->id }}">{{ __('Delete') }}</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ Str::limit($policy->description ?? '—', 50) }}
                                    </td>
                                    <td>
                                        @if ($policy->status)
                                            <span class="badge bg-success">{{ __('Active') }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ __('Inactive') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $policy->created_at->format('d M Y, h:i A') }}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="{{ route('policies.show', $policy) }}"
                                                class="btn btn-sm btn-light" title="{{ __('View') }}">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('policies.edit', $policy) }}"
                                                class="btn btn-sm btn-light" title="{{ __('Edit') }}">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-light text-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#delete_policy_{{ $policy->id }}"
                                                title="{{ __('Delete') }}">
                                                <i class="ti ti-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="delete_policy_{{ $policy->id }}" tabindex="-1"
                                    aria-labelledby="delete_policy_{{ $policy->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="delete_policy_{{ $policy->id }}Label">
                                                    {{ __('Delete Policy') }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>{{ __('Are you sure you want to delete this policy?') }}</p>
                                                <p class="mb-0"><strong>{{ $policy->title }}</strong></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-light"
                                                    data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                                <form action="{{ route('policies.destroy', $policy) }}"
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
                                    <td colspan="6" class="text-center py-4">{{ __('No policies found') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($policies->hasPages())
                    <div class="card-footer border-top">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="mb-0 text-muted">
                                    {{ __('Showing') }}
                                    <span>{{ $policies->firstItem() }}</span>
                                    {{ __('to') }}
                                    <span>{{ $policies->lastItem() }}</span>
                                    {{ __('of') }}
                                    <span>{{ $policies->total() }}</span>
                                    {{ __('results') }}
                                </p>
                            </div>
                            <div>
                                {{ $policies->links() }}
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
                    <h5 class="modal-title" id="bulkDeleteModalLabel">{{ __('Delete Policies') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are you sure you want to delete the selected policies?') }}</p>
                    <p class="mb-0 text-muted">
                        <span id="bulkDeleteCount">0</span> {{ __('policy(ies) will be deleted.') }}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                        {{ __('Cancel') }}</button>
                    <form action="{{ route('policies.bulk-destroy') }}" method="POST" id="bulkDeleteForm">
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
                const policyCheckboxes = document.querySelectorAll('.policy-checkbox');
                const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
                const statusFilter = document.getElementById('statusFilter');
                const searchForm = document.querySelector('form[method="GET"]');

                // Handle status filter change
                if (statusFilter && searchForm) {
                    statusFilter.addEventListener('change', function() {
                        searchForm.submit();
                    });
                }

                selectAll?.addEventListener('change', function() {
                    policyCheckboxes.forEach(checkbox => {
                        checkbox.checked = this.checked;
                    });
                    updateBulkDeleteButton();
                });

                policyCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        updateBulkDeleteButton();
                        if (selectAll) {
                            selectAll.checked = Array.from(policyCheckboxes).every(cb => cb.checked);
                        }
                    });
                });

                function updateBulkDeleteButton() {
                    const checked = document.querySelectorAll('.policy-checkbox:checked');
                    if (checked.length > 0) {
                        bulkDeleteBtn.classList.remove('d-none');
                        document.getElementById('bulkDeleteCount').textContent = checked.length;
                    } else {
                        bulkDeleteBtn.classList.add('d-none');
                    }
                }

                document.getElementById('bulkDeleteForm')?.addEventListener('submit', function(e) {
                    const checked = document.querySelectorAll('.policy-checkbox:checked');
                    const ids = Array.from(checked).map(cb => cb.value);

                    if (ids.length === 0) {
                        e.preventDefault();
                        alert('{{ __('Please select at least one policy to delete.') }}');
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
