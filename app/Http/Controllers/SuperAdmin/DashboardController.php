<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $totalCompanies = Company::count();
        $totalPlans = Plan::count();
        $thisMonthRegisteredCompanies = Company::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
        $activeCompanies = Company::where('status', true)->count();
        $totalSubscribers = Subscription::count();
        $totalPlans = Plan::count();
        // need changes here like for total companies, active companies, total subscribers, total plans need a differernce from last month in percentage
        $totalCompaniesDifference = $totalCompanies - Company::whereMonth('created_at', now()->subMonth()->month)->whereYear('created_at', now()->subMonth()->year)->count();
        $activeCompaniesDifference = $activeCompanies - Company::where('status', true)->whereMonth('created_at', now()->subMonth()->month)->whereYear('created_at', now()->subMonth()->year)->count();
        $totalSubscribersDifference = $totalSubscribers - Subscription::whereMonth('created_at', now()->subMonth()->month)->whereYear('created_at', now()->subMonth()->year)->count();
        $totalPlansDifference = $totalPlans - Plan::whereMonth('created_at', now()->subMonth()->month)->whereYear('created_at', now()->subMonth()->year)->count();
        return view('superadmin.dashboard.index', compact(
            'totalCompanies',
            'totalPlans',
            'thisMonthRegisteredCompanies',
            'activeCompanies',
            'totalSubscribers',
            'totalPlans',
            'totalCompaniesDifference',
            'activeCompaniesDifference',
            'totalSubscribersDifference',
            'totalPlansDifference'
        ));
    }
}
