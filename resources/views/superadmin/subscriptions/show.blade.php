<x-app-layout :page="__('Subscription Details')" for="superadmin">
    <div class="content pb-0">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">
                    {{ __('Subscription Details') }}
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('s.dashboard', absolute: false) }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('s.subscriptions.index', absolute: false) }}">{{ __('Subscriptions') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $subscription->plan->name }}</li>
                    </ol>
                </nav>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="{{ route('s.subscriptions.index', absolute: false) }}" class="btn btn-outline-light">
                    <i class="ti ti-arrow-left me-1"></i>{{ __('Back') }}
                </a>
                <a href="{{ route('s.companies.show', $subscription->company) }}" class="btn btn-primary">
                    <i class="ti ti-building-community me-1"></i>{{ __('View Company') }}
                </a>
                @if ($subscription->status === 'active')
                    <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#cancelSubscriptionModal">
                        <i class="ti ti-x me-1"></i>{{ __('Cancel Subscription') }}
                    </a>
                @endif
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <!-- Subscription Overview Card -->
            <div class="col-xl-4 col-lg-5">
                <div class="card border-0 rounded-0 mb-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <div class="avatar avatar-xl rounded-circle bg-soft-primary border border-primary mx-auto">
                                <i class="ti ti-credit-card fs-32 text-primary"></i>
                            </div>
                        </div>
                        <h4 class="mb-1">{{ $subscription->plan->name }}</h4>
                        <p class="text-muted mb-3">
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
                            <span class="badge {{ $badgeClass }} text-capitalize">{{ $subscription->status }}</span>
                        </p>
                        <div class="d-flex align-items-center justify-content-center gap-3">
                            <div>
                                <p class="text-muted mb-1">{{ __('Amount') }}</p>
                                <h5 class="mb-0">{{ $subscription->currency }} {{ number_format($subscription->amount, 2) }}</h5>
                            </div>
                            <div class="vr"></div>
                            <div>
                                <p class="text-muted mb-1">{{ __('Billing Cycle') }}</p>
                                <h6 class="mb-0 text-capitalize">{{ $subscription->billing_cycle }}</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Company Information -->
                <div class="card border-0 rounded-0 mb-4">
                    <div class="card-header border-0 bg-transparent">
                        <h5 class="mb-0">{{ __('Company Information') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar avatar-md rounded-circle bg-soft-primary me-3">
                                <i class="ti ti-building fs-16 text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">
                                    <a href="{{ route('s.companies.show', $subscription->company) }}"
                                        class="text-decoration-none">
                                        {{ $subscription->company->name }}
                                    </a>
                                </h6>
                                <p class="text-muted mb-0 fs-14">
                                    @if ($subscription->company->email)
                                        {{ $subscription->company->email }}
                                    @else
                                        {{ __('No email') }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Subscription Details -->
            <div class="col-xl-8 col-lg-7">
                <div class="card border-0 rounded-0 mb-4">
                    <div class="card-header border-0 bg-transparent">
                        <h5 class="mb-0">{{ __('Subscription Information') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Plan') }}</label>
                                <p class="mb-0 fw-medium">
                                    <a href="{{ route('s.plans.show', $subscription->plan) }}"
                                        class="text-decoration-none">
                                        {{ $subscription->plan->name }}
                                    </a>
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Billing Cycle') }}</label>
                                <p class="mb-0">
                                    <span class="badge bg-light text-dark text-capitalize">
                                        {{ $subscription->billing_cycle }}
                                    </span>
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Amount') }}</label>
                                <p class="mb-0 fw-medium">{{ $subscription->currency }} {{ number_format($subscription->amount, 2) }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Currency') }}</label>
                                <p class="mb-0">
                                    <span class="badge bg-light text-dark">{{ $subscription->currency }}</span>
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Start Date') }}</label>
                                <p class="mb-0">{{ $subscription->start_date->format('d M Y') }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('End Date') }}</label>
                                <p class="mb-0">
                                    {{ $subscription->end_date ? $subscription->end_date->format('d M Y') : '—' }}
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Trial Ends At') }}</label>
                                <p class="mb-0">
                                    {{ $subscription->trial_ends_at ? $subscription->trial_ends_at->format('d M Y') : '—' }}
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Status') }}</label>
                                <p class="mb-0">
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
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Auto Renew') }}</label>
                                <p class="mb-0">
                                    @if ($subscription->auto_renew)
                                        <span class="badge bg-success">{{ __('Yes') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ __('No') }}</span>
                                    @endif
                                </p>
                            </div>
                            @if ($subscription->canceled_at)
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">{{ __('Canceled At') }}</label>
                                    <p class="mb-0">{{ $subscription->canceled_at->format('d M Y, h:i A') }}</p>
                                </div>
                            @endif
                            @if ($subscription->cancel_reason)
                                <div class="col-12 mb-3">
                                    <label class="form-label text-muted">{{ __('Cancel Reason') }}</label>
                                    <p class="mb-0">{{ $subscription->cancel_reason }}</p>
                                </div>
                            @endif
                            @if ($subscription->stripe_subscription_id)
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">{{ __('Stripe Subscription ID') }}</label>
                                    <p class="mb-0"><code>{{ $subscription->stripe_subscription_id }}</code></p>
                                </div>
                            @endif
                            @if ($subscription->stripe_customer_id)
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">{{ __('Stripe Customer ID') }}</label>
                                    <p class="mb-0"><code>{{ $subscription->stripe_customer_id }}</code></p>
                                </div>
                            @endif
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">{{ __('Created Date') }}</label>
                                <p class="mb-0">{{ $subscription->created_at->format('d M Y, h:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Plan Features Card -->
                @if ($subscription->plan->features && count($subscription->plan->features) > 0)
                    <div class="card border-0 rounded-0 mb-4">
                        <div class="card-header border-0 bg-transparent">
                            <h5 class="mb-0">{{ __('Plan Features') }}</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                @foreach ($subscription->plan->features as $feature)
                                    <li class="mb-2 d-flex align-items-start">
                                        <i class="ti ti-check text-success me-2 mt-1"></i>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <!-- Transaction History Card -->
                @if ($transactions->count() > 0)
                    <div class="card border-0 rounded-0">
                        <div class="card-header border-0 bg-transparent">
                            <h5 class="mb-0">{{ __('Transaction History') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Type') }}</th>
                                            <th>{{ __('Amount') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Payment Method') }}</th>
                                            <th>{{ __('Transaction ID') }}</th>
                                            <th>{{ __('Date') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>
                                                    <span class="badge bg-light text-dark text-capitalize">
                                                        {{ str_replace('_', ' ', $transaction->type) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="fw-medium">
                                                        {{ $transaction->currency }} {{ number_format($transaction->amount, 2) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @php
                                                        $statusBadgeClass = match ($transaction->status) {
                                                            'completed' => 'bg-success',
                                                            'pending' => 'bg-warning',
                                                            'failed' => 'bg-danger',
                                                            'refunded' => 'bg-info',
                                                            'cancelled' => 'bg-secondary',
                                                            default => 'bg-secondary',
                                                        };
                                                    @endphp
                                                    <span class="badge {{ $statusBadgeClass }} text-capitalize">
                                                        {{ $transaction->status }}
                                                    </span>
                                                </td>
                                                <td>{{ $transaction->payment_method ?? '—' }}</td>
                                                <td>
                                                    @if ($transaction->transaction_id)
                                                        <code class="small">{{ $transaction->transaction_id }}</code>
                                                    @else
                                                        —
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $transaction->paid_at ? $transaction->paid_at->format('d M Y, h:i A') : $transaction->created_at->format('d M Y, h:i A') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card border-0 rounded-0">
                        <div class="card-header border-0 bg-transparent">
                            <h5 class="mb-0">{{ __('Transaction History') }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-0">{{ __('No transactions found') }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Cancel Subscription Modal -->
    @if ($subscription->status === 'active')
        <div class="modal fade" id="cancelSubscriptionModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Cancel Subscription') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('s.subscriptions.cancel', $subscription) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <p>{{ __('Are you sure you want to cancel this subscription?') }}</p>
                            <div class="mb-3">
                                <label for="cancel_reason" class="form-label">{{ __('Reason (optional)') }}</label>
                                <textarea class="form-control" id="cancel_reason" name="cancel_reason"
                                    rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light"
                                data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-warning">{{ __('Cancel Subscription') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

</x-app-layout>

