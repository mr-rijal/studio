<x-app-layout :page="__('Dashboard')" for="superadmin">
    <div class="content pb-0">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">{{ __('Dashboard') }}</h4>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="{{ route('s.dashboard', absolute: false) }}" class="btn btn-icon btn-outline-light shadow"
                    data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh">
                    <i class="ti ti-refresh"></i>
                </a>
                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light shadow" data-bs-toggle="tooltip"
                    data-bs-placement="top" aria-label="Collapse" data-bs-original-title="Collapse"
                    id="collapse-header">
                    <i class="ti ti-transition-top"></i>
                </a>
            </div>
        </div>

        <div class="welcome-wrap mb-4">
            <div class=" d-flex align-items-center justify-content-between flex-wrap gap-3 bg-dark rounded p-4">
                <div>
                    <h2 class="mb-1 text-white fs-24">Welcome Back, {{ Auth::guard('superadmin')->user()->name }}</h2>
                    <p class="text-light fs-14 mb-0">
                        {{ __(':number companies registered on :month!', ['number' => $thisMonthRegisteredCompanies, 'month' => now()->format('M Y')]) }}
                    </p>
                </div>
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <a href="{{ route('s.companies.index', absolute: false) }}" class="btn btn-danger btn-sm">
                        {{ __('All Companies') }}
                    </a>
                    <a href="{{ route('s.plans.index', absolute: false) }}" class="btn btn-light btn-sm">
                        {{ __('All Plans') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="row row-gap-3 mb-4">
            <div class="col-xl-3 col-sm-6 d-flex">
                <div class="card flex-fill mb-0 position-relative overflow-hidden">
                    <div class="card-body position-relative z-1">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="d-flex align-items-start justify-content-between">
                                <div>
                                    <p class="fs-14 mb-1">Total Companies</p>
                                    <h2 class="mb-1 fs-16">{{ $totalCompanies }}</h2>
                                    <p
                                        class="text-{{ $totalCompaniesDifference >= 0 ? 'success' : 'danger' }} mb-0 fs-13">
                                        @if ($totalCompaniesDifference >= 0)
                                            <i class="ti ti-arrow-bar-up me-1"></i>
                                        @else
                                            <i class="ti ti-arrow-bar-down me-1"></i>
                                        @endif
                                        {{ abs($totalCompaniesDifference) }}%
                                        <span class="text-body ms-1">
                                            {{ $totalCompaniesDifference >= 0 ? __('from last month') : __('from last month') }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="avatar avatar-md rounded-circle bg-soft-primary border border-primary">
                                    <i class="ti ti-building fs-16 text-primary"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('assets/img/icons/elemnt-01.svg') }}" alt="elemnt-04"
                        class="img-fluid position-absolute top-0 Start-0">
                </div>
            </div>
            <!-- /Total Companies -->

            <!-- Total Companies -->
            <div class="col-xl-3 col-sm-6 d-flex">
                <div class="card flex-fill mb-0 position-relative overflow-hidden">
                    <div class="card-body position-relative z-1">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="d-flex align-items-start justify-content-between">
                                <div>
                                    <p class="fs-14 mb-1">{{ __('Active Companies') }}</p>
                                    <h2 class="mb-1 fs-16">{{ $activeCompanies }}</h2>
                                    <p
                                        class="text-{{ $activeCompaniesDifference >= 0 ? 'success' : 'danger' }} mb-0 fs-13">
                                        @if ($activeCompaniesDifference >= 0)
                                            <i class="ti ti-arrow-bar-up me-1"></i>
                                        @else
                                            <i class="ti ti-arrow-bar-down me-1"></i>
                                        @endif
                                        {{ abs($activeCompaniesDifference) }}%
                                        <span class="text-body ms-1">
                                            {{ __('from last month') }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="avatar avatar-md rounded-circle bg-soft-success border border-success">
                                    <i class="ti ti-carousel-vertical fs-16 text-success"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('assets/img/icons/elemnt-02.svg') }}" alt="elemnt-04"
                        class="img-fluid position-absolute top-0 Start-0">
                </div>
            </div>
            <!-- /Total Companies -->

            <!-- Total Companies -->
            <div class="col-xl-3 col-sm-6 d-flex">
                <div class="card flex-fill mb-0 position-relative overflow-hidden">
                    <div class="card-body position-relative z-1">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="d-flex align-items-start justify-content-between">
                                <div>
                                    <p class="fs-14 mb-1">{{ __('Total Subscribers') }}</p>
                                    <h2 class="mb-1 fs-16">{{ $totalSubscribers }}</h2>
                                    <p
                                        class="text-{{ $totalSubscribersDifference >= 0 ? 'success' : 'danger' }} mb-0 fs-13">
                                        @if ($totalSubscribersDifference >= 0)
                                            <i class="ti ti-arrow-bar-up me-1"></i>
                                        @else
                                            <i class="ti ti-arrow-bar-down me-1"></i>
                                        @endif
                                        {{ abs($totalSubscribersDifference) }}%
                                        <span class="text-body ms-1">
                                            {{ __('from last month') }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="avatar avatar-md rounded-circle bg-soft-warning border border-warning">
                                    <i class="ti ti-chalkboard-off fs-16 text-warning"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('assets/img/icons/elemnt-03.svg') }}" alt="elemnt-04"
                        class="img-fluid position-absolute top-0 Start-0">
                </div>
            </div>
            <!-- /Total Companies -->

            <!-- Total Users -->
            <div class="col-xl-3 col-sm-6 d-flex">
                <div class="card flex-fill mb-0 position-relative overflow-hidden">
                    <div class="card-body position-relative z-1">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="d-flex align-items-start justify-content-between">
                                <div>
                                    <p class="fs-14 mb-1">{{ __('Total Users') }}</p>
                                    <h2 class="mb-1 fs-16">{{ $totalUsers }}</h2>
                                    <p class="text-{{ $totalUsersDifference >= 0 ? 'success' : 'danger' }} mb-0 fs-13">
                                        @if ($totalUsersDifference >= 0)
                                            <i class="ti ti-arrow-bar-up me-1"></i>
                                        @else
                                            <i class="ti ti-arrow-bar-down me-1"></i>
                                        @endif
                                        {{ abs($totalUsersDifference) }}%
                                        <span class="text-body ms-1">
                                            {{ __('from last month') }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="avatar avatar-md rounded-circle bg-soft-danger border border-danger mb-3">
                                    <i class="ti ti-users fs-16 text-danger"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('assets/img/icons/elemnt-04.svg') }}" alt="elemnt-04"
                        class="img-fluid position-absolute top-0 Start-0">
                </div>
            </div>
            <!-- /Total Users -->

        </div>
        <!-- end row -->

        <!-- start row -->
        <div class="row">
            <!-- Companies -->
            <div class="col-xxl-12 col-lg-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h6 class="mb-0">Companies</h6>
                    </div>
                    <div class="card-body">
                        <div id="company-chart-dashboard"></div>
                        <p
                            class="text-{{ $totalCompaniesDifference >= 0 ? 'success' : 'danger' }} mb-0 fs-13 text-center">
                            <i class="ti ti-arrow-bar-{{ $totalCompaniesDifference >= 0 ? 'up' : 'down' }} me-1"></i>
                            {{ abs($totalCompaniesDifference) }}%
                            <span class="text-body ms-1">from last month</span>
                        </p>
                    </div>
                </div>
            </div>
            <!-- /Companies -->

            <!-- Revenue -->
            <div class="col-lg-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h6 class="mb-0">Revenue</h6>
                    </div>
                    <div class="card-body pb-0">
                        <div class="d-flex align-items-center justify-content-between flex-wrap mb-3">
                            <div class="mb-1">
                                <h5 class="mb-2 fs-16 fw-bold">${{ number_format($currentMonthRevenue, 2) }}</h5>
                                <p class="mb-0 fs-13">
                                    <span
                                        class="text-{{ $revenueDifference >= 0 ? 'success' : 'danger' }} fw-normal me-1">
                                        <i
                                            class="ti ti-arrow-bar-{{ $revenueDifference >= 0 ? 'up' : 'down' }} me-1"></i>
                                        {{ abs($revenueDifference) }}%
                                    </span>
                                    {{ $revenueDifference >= 0 ? 'increased' : 'decreased' }} from last month
                                </p>
                            </div>
                            <p class="fs-14 text-dark d-flex align-items-center mb-1">
                                <i class="ti ti-circle-filled me-1 fs-6 text-teal"></i>Revenue
                            </p>
                        </div>
                        <div id="revenue-income-dashboard"></div>
                    </div>
                </div>
            </div>
            <!-- /Revenue -->

            <!-- Top Plans -->
            <div class="col-xxl-6 col-xl-6 d-flex">
                <div class="card flex-fill border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom py-3">
                        <div class="d-flex align-items-center">
                            <div
                                class="avatar avatar-sm bg-info text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                                <i class="ti ti-package fs-5"></i>
                            </div>
                            <h6 class="mb-0 fw-semibold">{{ __('Top Plans') }}</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="plan-overview-dashboard"></div>
                        @php
                            $totalPlanSubscriptions = array_sum($planCounts);
                            $colors = ['#3550DC', '#FE9738', '#27EAEA', '#10B981', '#EF4444'];
                        @endphp
                        @if ($totalPlanSubscriptions > 0)
                            @foreach ($planLabels as $index => $planName)
                                @php
                                    $percentage = round(($planCounts[$index] / $totalPlanSubscriptions) * 100, 1);
                                @endphp
                                <div
                                    class="d-flex align-items-center justify-content-between {{ $index < count($planLabels) - 1 ? 'mb-3' : 'mb-0' }}">
                                    <p class="f-14 fw-medium text-dark mb-0">
                                        <i class="ti ti-circle-filled me-1"
                                            style="color: {{ $colors[$index % count($colors)] }}"></i>
                                        {{ $planName }}
                                    </p>
                                    <p class="f-14 fw-medium text-dark mb-0">{{ $percentage }}%</p>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted text-center mb-0">{{ __('No subscriptions yet') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /Top Plans -->

            <!-- Recent Transactions -->
            <div class="col-xxl-6 col-xl-6 d-flex">
                <div class="card flex-fill border-0 shadow-sm">
                    <div
                        class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="d-flex align-items-center">
                            <div
                                class="avatar avatar-sm bg-success text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                                <i class="ti ti-credit-card fs-5"></i>
                            </div>
                            <h5 class="mb-0 fs-16 fw-bold">{{ __('Recent Transactions') }}</h5>
                        </div>
                        <a href="{{ route('s.subscriptions.index') }}"
                            class="btn btn-primary btn-xs">{{ __('View All') }}</a>
                    </div>
                    <div class="card-body pb-2">
                        @forelse($recentTransactions as $transaction)
                            <div
                                class="d-sm-flex justify-content-between flex-wrap {{ !$loop->last ? 'mb-4' : 'mb-0' }}">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="avatar avatar-md border rounded-circle flex-shrink-0 bg-soft-primary d-flex align-items-center justify-content-center">
                                        <i class="ti ti-building text-primary"></i>
                                    </div>
                                    <div class="ms-2 flex-fill">
                                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                                            <a href="{{ route('s.companies.show', $transaction->company) }}"
                                                class="text-decoration-none">
                                                {{ $transaction->company->name ?? '—' }}
                                            </a>
                                        </h6>
                                        <p class="fs-13 mb-0">
                                            {{ $transaction->paid_at ? $transaction->paid_at->format('d M Y') : '—' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="text-sm-end mb-0">
                                    <h6 class="fw-medium text-truncate mb-1 fs-14 text-success">
                                        +{{ $transaction->currency }} {{ number_format($transaction->amount, 2) }}
                                    </h6>
                                    <p class="fs-13 mb-0">
                                        {{ $transaction->subscription->plan->name ?? '—' }}
                                        ({{ ucfirst($transaction->subscription->billing_cycle ?? '—') }})
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-3">
                                <p class="text-muted mb-0">{{ __('No recent transactions') }}</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <!-- /Recent Transactions -->

            <!-- Recently Registered -->
            <div class="col-xxl-6 col-xl-6 d-flex">
                <div class="card flex-fill border-0 shadow-sm">
                    <div
                        class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="d-flex align-items-center">
                            <div
                                class="avatar avatar-sm bg-primary text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                                <i class="ti ti-building fs-5"></i>
                            </div>
                            <h5 class="mb-0 fs-16 fw-bold">{{ __('Recently Registered') }}</h5>
                        </div>
                        <a href="{{ route('s.companies.index') }}"
                            class="btn btn-primary btn-xs">{{ __('View All') }}</a>
                    </div>
                    <div class="card-body pb-2">
                        @forelse($recentCompanies as $company)
                            <div
                                class="d-sm-flex justify-content-between flex-wrap {{ !$loop->last ? 'mb-4' : 'mb-0' }}">
                                <div class="d-flex align-items-center">
                                    @if ($company->logo)
                                        <img src="{{ asset('storage/' . $company->logo) }}"
                                            alt="{{ $company->name }}"
                                            class="avatar avatar-md border rounded-circle flex-shrink-0"
                                            style="width: 40px; height: 40px; object-fit: cover;">
                                    @else
                                        <div
                                            class="avatar avatar-md border rounded-circle flex-shrink-0 bg-soft-primary d-flex align-items-center justify-content-center">
                                            <i class="ti ti-building text-primary"></i>
                                        </div>
                                    @endif
                                    <div class="ms-2 flex-fill">
                                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                                            <a href="{{ route('s.companies.show', $company) }}"
                                                class="text-decoration-none">
                                                {{ $company->name }}
                                            </a>
                                        </h6>
                                        <p class="fs-13 mb-0">
                                            {{ $company->activeSubscription->plan->name ?? 'No Plan' }}
                                            ({{ $company->activeSubscription ? ucfirst($company->activeSubscription->billing_cycle) : '—' }})
                                        </p>
                                    </div>
                                </div>
                                <div class="text-sm-end mb-0">
                                    <p class="fs-14 mb-0">{{ $company->users->count() }} {{ __('Users') }}</p>
                                    <h6 class="fw-normal text-truncate mb-0 fs-14">{{ $company->email ?? '—' }}</h6>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-3">
                                <p class="text-muted mb-0">{{ __('No recently registered companies') }}</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <!-- /Recent Registered -->

            <!-- Recent Plan Expired -->
            <div class="col-xxl-6 col-xl-6 d-flex">
                <div class="card flex-fill border-0 shadow-sm">
                    <div
                        class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="d-flex align-items-center">
                            <div
                                class="avatar avatar-sm bg-warning text-white rounded-circle me-2 d-flex align-items-center justify-content-center">
                                <i class="ti ti-alert-triangle fs-5"></i>
                            </div>
                            <h5 class="mb-0 fs-16 fw-bold">{{ __('Expiring Soon') }}</h5>
                        </div>
                        <a href="{{ route('s.subscriptions.index') }}"
                            class="btn btn-primary btn-xs">{{ __('View All') }}</a>
                    </div>
                    <div class="card-body pb-2">
                        @forelse($expiringSubscriptions as $subscription)
                            <div
                                class="d-sm-flex justify-content-between flex-wrap {{ !$loop->last ? 'mb-4' : 'mb-0' }}">
                                <div class="d-flex align-items-center">
                                    @if ($subscription->company->logo)
                                        <img src="{{ asset('storage/' . $subscription->company->logo) }}"
                                            alt="{{ $subscription->company->name }}"
                                            class="avatar avatar-md border rounded-circle flex-shrink-0"
                                            style="width: 40px; height: 40px; object-fit: cover;">
                                    @else
                                        <div
                                            class="avatar avatar-md border rounded-circle flex-shrink-0 bg-soft-warning d-flex align-items-center justify-content-center">
                                            <i class="ti ti-building text-warning"></i>
                                        </div>
                                    @endif
                                    <div class="ms-2 flex-fill">
                                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                                            <a href="{{ route('s.companies.show', $subscription->company) }}"
                                                class="text-decoration-none">
                                                {{ $subscription->company->name }}
                                            </a>
                                        </h6>
                                        <p class="fs-13 mb-0">{{ $subscription->end_date->format('d M Y') }}</p>
                                    </div>
                                </div>
                                <div class="text-sm-end mb-0">
                                    <h6 class="fw-medium text-truncate mb-1 fs-14">
                                        <span class="badge bg-warning">{{ __('Expires Soon') }}</span>
                                    </h6>
                                    <p class="fs-13 mb-0">{{ $subscription->plan->name ?? '—' }}
                                        ({{ ucfirst($subscription->billing_cycle) }})
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-3">
                                <p class="text-muted mb-0">{{ __('No subscriptions expiring soon') }}</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <!-- /Recent Plan Expired -->
        </div>
        <!-- end row -->
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Company Registrations Chart
                var companyChartOptions = {
                    series: [{
                        name: 'Companies',
                        data: @json($companyRegistrations)
                    }],
                    chart: {
                        type: 'area',
                        height: 200,
                        toolbar: {
                            show: false
                        },
                        zoom: {
                            enabled: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2
                    },
                    colors: ['#3550DC'],
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.7,
                            opacityTo: 0.3,
                            stops: [0, 90, 100]
                        }
                    },
                    xaxis: {
                        categories: @json($companyLabels),
                        labels: {
                            style: {
                                fontSize: '11px'
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                fontSize: '11px'
                            }
                        }
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " companies"
                            }
                        }
                    }
                };

                var companyChart = new ApexCharts(document.querySelector("#company-chart-dashboard"),
                    companyChartOptions);
                companyChart.render();

                // Revenue Chart
                var revenueChartOptions = {
                    series: [{
                        name: 'Revenue',
                        data: @json($revenueData)
                    }],
                    chart: {
                        type: 'line',
                        height: 300,
                        toolbar: {
                            show: false
                        },
                        zoom: {
                            enabled: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    colors: ['#27EAEA'],
                    markers: {
                        size: 4,
                        hover: {
                            size: 6
                        }
                    },
                    xaxis: {
                        categories: @json($revenueLabels),
                        labels: {
                            style: {
                                fontSize: '11px'
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                fontSize: '11px'
                            },
                            formatter: function(val) {
                                return "$" + val.toFixed(0)
                            }
                        }
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return "$" + val.toFixed(2)
                            }
                        }
                    },
                    grid: {
                        borderColor: '#f1f1f1',
                    }
                };

                var revenueChart = new ApexCharts(document.querySelector("#revenue-income-dashboard"),
                    revenueChartOptions);
                revenueChart.render();

                // Plan Distribution Donut Chart
                var planChartOptions = {
                    series: @json($planCounts),
                    chart: {
                        type: 'donut',
                        height: 250
                    },
                    labels: @json($planLabels),
                    colors: ['#3550DC', '#FE9738', '#27EAEA', '#10B981', '#EF4444'],
                    legend: {
                        show: false
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return val.toFixed(0) + "%"
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '70%'
                            }
                        }
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " subscriptions"
                            }
                        }
                    }
                };

                var planChart = new ApexCharts(document.querySelector("#plan-overview-dashboard"), planChartOptions);
                planChart.render();

                // Subscription Status Chart (if needed)
                @if (count($statusLabels) > 0)
                    var statusChartOptions = {
                        series: @json($statusCounts),
                        chart: {
                            type: 'pie',
                            height: 200
                        },
                        labels: @json($statusLabels),
                        colors: ['#10B981', '#EF4444', '#6B7280', '#F59E0B', '#3B82F6'],
                        legend: {
                            position: 'bottom'
                        },
                        dataLabels: {
                            enabled: true
                        }
                    };
                @endif
            });
        </script>
    @endpush
</x-app-layout>
