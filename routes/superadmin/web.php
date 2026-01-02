<?php

use App\Http\Controllers\SuperAdmin\CompanyController;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\PlanController;
use App\Http\Controllers\SuperAdmin\ProfileController;
use App\Http\Controllers\SuperAdmin\ReportController;
use App\Http\Controllers\SuperAdmin\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->name('s.')->middleware('auth:superadmin', 'verified:s.verification.notice')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');

    Route::post('companies/bulk-delete', [CompanyController::class, 'bulkDestroy'])->name('companies.bulk-destroy');
    Route::patch('companies/{company}/domains/{domain}/toggle', [CompanyController::class, 'toggleDomain'])->name('companies.domains.toggle');
    Route::resource('companies', CompanyController::class);

    Route::post('plans/bulk-delete', [PlanController::class, 'bulkDestroy'])->name('plans.bulk-destroy');
    Route::resource('plans', PlanController::class);

    Route::post('subscriptions/{subscription}/cancel', [SubscriptionController::class, 'cancel'])->name('subscriptions.cancel');
    Route::post('subscriptions/{subscription}/transactions', [SubscriptionController::class, 'storeTransaction'])->name('subscriptions.transactions.store');
    Route::get('companies/{company}/subscriptions', [SubscriptionController::class, 'companySubscriptions'])->name('companies.subscriptions');
    Route::resource('subscriptions', SubscriptionController::class);

    // Reports
    Route::get('reports/companies', [ReportController::class, 'companyReports'])->name('reports.companies');
    Route::get('reports/users', [ReportController::class, 'userReports'])->name('reports.users');
    Route::get('reports/subscriptions', [ReportController::class, 'subscriptionReports'])->name('reports.subscriptions');

    Route::middleware([])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});
