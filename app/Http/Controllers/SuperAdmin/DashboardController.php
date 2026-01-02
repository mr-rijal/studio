<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\SubscriptionTransaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Basic Statistics
        $totalCompanies = Company::count();
        $totalPlans = Plan::count();
        $thisMonthRegisteredCompanies = Company::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        $activeCompanies = Company::where('status', true)->count();
        $totalSubscribers = Subscription::count();
        $totalUsers = User::count();
        $totalRevenue = SubscriptionTransaction::where('status', 'paid')->sum('amount');

        // Calculate percentage differences
        $lastMonthCompanies = Company::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->count();
        $lastMonthActiveCompanies = Company::where('status', true)
            ->whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->count();
        $lastMonthSubscribers = Subscription::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->count();
        $lastMonthUsers = User::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->count();

        $totalCompaniesDifference = $lastMonthCompanies > 0
            ? round((($thisMonthRegisteredCompanies - $lastMonthCompanies) / $lastMonthCompanies) * 100, 1)
            : ($thisMonthRegisteredCompanies > 0 ? 100 : 0);

        $activeCompaniesDifference = $lastMonthActiveCompanies > 0
            ? round((($activeCompanies - $lastMonthActiveCompanies) / $lastMonthActiveCompanies) * 100, 1)
            : ($activeCompanies > 0 ? 100 : 0);

        $totalSubscribersDifference = $lastMonthSubscribers > 0
            ? round((($totalSubscribers - $lastMonthSubscribers) / $lastMonthSubscribers) * 100, 1)
            : ($totalSubscribers > 0 ? 100 : 0);

        $totalUsersDifference = $lastMonthUsers > 0
            ? round((($totalUsers - $lastMonthUsers) / $lastMonthUsers) * 100, 1)
            : ($totalUsers > 0 ? 100 : 0);

        // Company registrations chart data (last 12 months)
        $companyRegistrations = [];
        $companyLabels = [];
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $companyLabels[] = $date->format('M Y');
            $companyRegistrations[] = Company::whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year)
                ->count();
        }

        // Revenue chart data (last 12 months)
        $revenueData = [];
        $revenueLabels = [];
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $revenueLabels[] = $date->format('M Y');
            $revenueData[] = SubscriptionTransaction::where('status', 'paid')
                ->whereMonth('paid_at', $date->month)
                ->whereYear('paid_at', $date->year)
                ->sum('amount') ?? 0;
        }

        // Plan distribution data
        $planDistribution = Plan::withCount('subscriptions')
            ->orderBy('subscriptions_count', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($plan) {
                return [
                    'name' => $plan->name,
                    'count' => $plan->subscriptions_count,
                ];
            });

        $planLabels = $planDistribution->pluck('name')->toArray();
        $planCounts = $planDistribution->pluck('count')->toArray();

        // Subscription status breakdown
        $subscriptionStatuses = Subscription::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();

        $statusLabels = $subscriptionStatuses->pluck('status')->map(fn ($s) => ucfirst($s))->toArray();
        $statusCounts = $subscriptionStatuses->pluck('count')->toArray();

        // Recent transactions
        $recentTransactions = SubscriptionTransaction::with(['subscription.company', 'subscription.plan', 'company'])
            ->where('status', 'paid')
            ->latest('paid_at')
            ->limit(5)
            ->get();

        // Recently registered companies
        $recentCompanies = Company::with(['user', 'activeSubscription.plan', 'users'])
            ->latest()
            ->limit(5)
            ->get();

        // Expiring subscriptions (next 30 days)
        $expiringSubscriptions = Subscription::with(['company', 'plan'])
            ->where('status', 'active')
            ->whereBetween('end_date', [now(), now()->addDays(30)])
            ->orderBy('end_date')
            ->limit(5)
            ->get();

        // Monthly revenue comparison
        $currentMonthRevenue = SubscriptionTransaction::where('status', 'paid')
            ->whereMonth('paid_at', now()->month)
            ->whereYear('paid_at', now()->year)
            ->sum('amount') ?? 0;

        $lastMonthRevenue = SubscriptionTransaction::where('status', 'paid')
            ->whereMonth('paid_at', now()->subMonth()->month)
            ->whereYear('paid_at', now()->subMonth()->year)
            ->sum('amount') ?? 0;

        $revenueDifference = $lastMonthRevenue > 0
            ? round((($currentMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100, 1)
            : ($currentMonthRevenue > 0 ? 100 : 0);

        return view('superadmin.dashboard.index', compact(
            'totalCompanies',
            'totalPlans',
            'thisMonthRegisteredCompanies',
            'activeCompanies',
            'totalSubscribers',
            'totalUsers',
            'totalRevenue',
            'totalCompaniesDifference',
            'activeCompaniesDifference',
            'totalSubscribersDifference',
            'totalUsersDifference',
            'companyRegistrations',
            'companyLabels',
            'revenueData',
            'revenueLabels',
            'planLabels',
            'planCounts',
            'statusLabels',
            'statusCounts',
            'recentTransactions',
            'recentCompanies',
            'expiringSubscriptions',
            'currentMonthRevenue',
            'revenueDifference'
        ));
    }
}
