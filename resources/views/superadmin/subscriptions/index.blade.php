<x-app-layout :page="__('Subscriptions')" for="superadmin">
    <div class="content pb-0">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">
                    {{ __('Subscriptions') }}
                    <span class="badge badge-soft-primary ms-2">{{ $subscriptions->total() }}</span>
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('s.dashboard', absolute: false) }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Subscriptions') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 rounded-0">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        {{-- Filter dropdown can be added here if needed --}}
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
                                <th>{{ __('Company') }}</th>
                                <th>{{ __('Plan') }}</th>
                                <th>{{ __('Billing Cycle') }}</th>
                                <th>{{ __('Amount') }}</th>
                                <th>{{ __('Start Date') }}</th>
                                <th>{{ __('End Date') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th width="150">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subscriptions as $subscription)
                                <tr class="table-row">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('s.companies.show', $subscription->company) }}"
                                                    class="fw-medium text-decoration-none">
                                                    {{ $subscription->company->name }}
                                                </a>
                                                <div class="row-actions text-muted">
                                                    <span class="view">
                                                        <a
                                                            href="{{ route('s.companies.show', $subscription->company) }}">{{ __('View Company') }}</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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
                                                class="btn btn-sm btn-light" title="{{ __('View') }}">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            @if ($subscription->status === 'active')
                                                <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#cancelSubscriptionModal_{{ $subscription->id }}"
                                                    title="{{ __('Cancel') }}">
                                                    <i class="ti ti-x"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <!-- Cancel Subscription Modal -->
                                @if ($subscription->status === 'active')
                                    <div class="modal fade" id="cancelSubscriptionModal_{{ $subscription->id }}"
                                        tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ __('Cancel Subscription') }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('s.subscriptions.cancel', $subscription) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <p>{{ __('Are you sure you want to cancel this subscription?') }}
                                                        </p>
                                                        <div class="mb-3">
                                                            <label for="cancel_reason_{{ $subscription->id }}"
                                                                class="form-label">{{ __('Reason (optional)') }}</label>
                                                            <textarea class="form-control" id="cancel_reason_{{ $subscription->id }}" name="cancel_reason" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-light"
                                                            data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-warning">{{ __('Cancel Subscription') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">{{ __('No subscriptions found') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($subscriptions->hasPages())
                    <div class="card-footer border-top">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="mb-0 text-muted">
                                    {{ __('Showing') }}
                                    <span>{{ $subscriptions->firstItem() }}</span>
                                    {{ __('to') }}
                                    <span>{{ $subscriptions->lastItem() }}</span>
                                    {{ __('of') }}
                                    <span>{{ $subscriptions->total() }}</span>
                                    {{ __('results') }}
                                </p>
                            </div>
                            <div>
                                {{ $subscriptions->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
