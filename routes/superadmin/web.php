<?php

use App\Http\Controllers\SuperAdmin\CompanyController;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\PlanController;
use App\Http\Controllers\SuperAdmin\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->name('s.')->middleware('auth:superadmin', 'verified:s.verification.notice')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');

    Route::post('companies/bulk-delete', [CompanyController::class, 'bulkDestroy'])->name('companies.bulk-destroy');
    Route::patch('companies/{company}/domains/{domain}/toggle', [CompanyController::class, 'toggleDomain'])->name('companies.domains.toggle');
    Route::resource('companies', CompanyController::class);

    Route::post('plans/bulk-delete', [PlanController::class, 'bulkDestroy'])->name('plans.bulk-destroy');
    Route::resource('plans', PlanController::class);

    Route::middleware([])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});
