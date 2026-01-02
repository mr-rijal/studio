<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\CompaniesExport;
use App\Exports\SubscriptionsExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function companyReports(Request $request)
    {
        $query = Company::with(['user', 'domains']);

        // Apply filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone_number', 'like', "%{$search}%");
            });
        }

        $companies = $query->latest()->get();

        if ($request->wantsJson() || $request->has('export')) {
            return $this->exportCompanies($companies, $request->export);
        }

        return view('superadmin.reports.company-reports', compact('companies'));
    }

    public function userReports(Request $request)
    {
        $query = User::with(['company', 'role']);

        // Apply filters
        if ($request->filled('company_id')) {
            $query->where('company_id', $request->company_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->latest()->get();
        $companies = Company::orderBy('name')->get();

        if ($request->wantsJson() || $request->has('export')) {
            return $this->exportUsers($users, $request->export);
        }

        return view('superadmin.reports.user-reports', compact('users', 'companies'));
    }

    public function subscriptionReports(Request $request)
    {
        $query = Subscription::with(['company', 'plan']);

        // Apply filters
        if ($request->filled('company_id')) {
            $query->where('company_id', $request->company_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('billing_cycle')) {
            $query->where('billing_cycle', $request->billing_cycle);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('start_date', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('start_date', '<=', $request->date_to);
        }

        $subscriptions = $query->latest()->get();
        $companies = Company::orderBy('name')->get();

        if ($request->wantsJson() || $request->has('export')) {
            return $this->exportSubscriptions($subscriptions, $request->export);
        }

        return view('superadmin.reports.subscription-reports', compact('subscriptions', 'companies'));
    }

    private function exportCompanies($companies, $format = 'pdf')
    {
        $filename = 'companies_report_' . date('Y-m-d_His');

        if ($format === 'csv') {
            $filename .= '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            ];

            $callback = function () use ($companies) {
                $file = fopen('php://output', 'w');
                fputcsv($file, ['Name', 'Email', 'Phone', 'Status', 'Created At', 'Owner']);

                foreach ($companies as $company) {
                    fputcsv($file, [
                        $company->name,
                        $company->email ?? '—',
                        $company->phone_number ?? '—',
                        $company->status ? 'Active' : 'Inactive',
                        $company->created_at->format('Y-m-d H:i:s'),
                        $company->user ? $company->user->name : '—',
                    ]);
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }

        if ($format === 'excel') {
            return Excel::download(new CompaniesExport($companies), $filename . '.xlsx');
        }

        if ($format === 'pdf') {
            $pdf = Pdf::loadView('superadmin.reports.exports.companies-pdf', [
                'companies' => $companies,
                'title' => 'Companies Report',
                'date' => now()->format('F d, Y'),
            ]);

            return $pdf->download($filename . '.pdf');
        }

        return redirect()->back()->with('error', 'Export format not supported');
    }

    private function exportUsers($users, $format = 'pdf')
    {
        $filename = 'users_report_' . date('Y-m-d_His');

        if ($format === 'csv') {
            $filename .= '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            ];

            $callback = function () use ($users) {
                $file = fopen('php://output', 'w');
                fputcsv($file, ['Name', 'Email', 'Phone', 'Company', 'Status', 'Created At']);

                foreach ($users as $user) {
                    fputcsv($file, [
                        $user->name,
                        $user->email,
                        $user->phone ?? '—',
                        $user->company->name ?? '—',
                        $user->status ? 'Active' : 'Inactive',
                        $user->created_at->format('Y-m-d H:i:s'),
                    ]);
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }

        if ($format === 'excel') {
            return Excel::download(new UsersExport($users), $filename . '.xlsx');
        }

        if ($format === 'pdf') {
            $pdf = Pdf::loadView('superadmin.reports.exports.users-pdf', [
                'users' => $users,
                'title' => 'Users Report',
                'date' => now()->format('F d, Y'),
            ]);

            return $pdf->download($filename . '.pdf');
        }

        return redirect()->back()->with('error', 'Export format not supported');
    }

    private function exportSubscriptions($subscriptions, $format = 'pdf')
    {
        $filename = 'subscriptions_report_' . date('Y-m-d_His');

        if ($format === 'csv') {
            $filename .= '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            ];

            $callback = function () use ($subscriptions) {
                $file = fopen('php://output', 'w');
                fputcsv($file, ['Company', 'Plan', 'Billing Cycle', 'Amount', 'Status', 'Start Date', 'End Date']);

                foreach ($subscriptions as $subscription) {
                    fputcsv($file, [
                        $subscription->company->name ?? '—',
                        $subscription->plan->name ?? '—',
                        ucfirst($subscription->billing_cycle),
                        $subscription->currency . ' ' . number_format($subscription->amount, 2),
                        ucfirst($subscription->status),
                        $subscription->start_date->format('Y-m-d'),
                        $subscription->end_date ? $subscription->end_date->format('Y-m-d') : '—',
                    ]);
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }

        if ($format === 'excel') {
            return Excel::download(new SubscriptionsExport($subscriptions), $filename . '.xlsx');
        }

        if ($format === 'pdf') {
            $pdf = Pdf::loadView('superadmin.reports.exports.subscriptions-pdf', [
                'subscriptions' => $subscriptions,
                'title' => 'Subscriptions Report',
                'date' => now()->format('F d, Y'),
            ]);

            return $pdf->download($filename . '.pdf');
        }

        return redirect()->back()->with('error', 'Export format not supported');
    }
}
