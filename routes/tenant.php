<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Tenant\BranchController;
use App\Http\Controllers\Tenant\CategoryController;
use App\Http\Controllers\Tenant\DashboardController;
use App\Http\Controllers\Tenant\FamilyAddressController;
use App\Http\Controllers\Tenant\HomePageController;
use App\Http\Controllers\Tenant\PolicyController;
use App\Http\Middleware\IdentifyCompanyMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([
    IdentifyCompanyMiddleware::class,
    'auth',
    'verified',
])->group(function () {
    // Dashboard and CRM Routes
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Profile Routes
        Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::put('/', 'update')->name('update');
        });

        // Category Routes
        Route::post('categories/bulk-delete', [CategoryController::class, 'bulkDestroy'])->name('categories.bulk-destroy');
        Route::resource('categories', CategoryController::class);

        // Policy Routes
        Route::post('policies/bulk-delete', [PolicyController::class, 'bulkDestroy'])->name('policies.bulk-destroy');
        Route::resource('policies', PolicyController::class);

        // Branch Routes
        Route::post('branches/bulk-delete', [BranchController::class, 'bulkDestroy'])->name('branches.bulk-destroy');
        Route::resource('branches', BranchController::class);

        // Family Address Routes
        Route::post('family-addresses/bulk-delete', [FamilyAddressController::class, 'bulkDestroy'])->name('family-addresses.bulk-destroy');
        Route::resource('family-addresses', FamilyAddressController::class);
    });
});

Route::middleware([
    IdentifyCompanyMiddleware::class,
])->name('t.')->group(function () {
    Route::get('/', [HomePageController::class, 'index'])->name('home');
    Route::get('/about', [HomePageController::class, 'about'])->name('about');
    Route::get('/terms', [HomePageController::class, 'terms'])->name('terms');
    Route::get('/privacy-policy', [HomePageController::class, 'privacyPolicy'])->name('privacy-policy');
    Route::get('/contact', [HomePageController::class, 'contact'])->name('contact');
    Route::post('/contact', [HomePageController::class, 'contactStore']);
    Route::get('/family-registration', [HomePageController::class, 'familyRegistration'])->name('family-registration');
    Route::get('/{slug}', [HomePageController::class, 'page'])->name('page');
});
