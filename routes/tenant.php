<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Tenant\HomePageController;
use App\Http\Middleware\IdentifyCompanyMiddleware;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    IdentifyCompanyMiddleware::class,
])->group(function () {
    // Dashboard and CRM Routes
    Route::prefix('dashboard')->group(function () {});
});
