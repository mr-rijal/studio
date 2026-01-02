<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Tenant\HomePageController;
use App\Http\Middleware\IdentifyCompanyMiddleware;
use Illuminate\Support\Facades\Route;

Route::domain(config('app.central_domain'))->name('c.')->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('home');
    Route::get('/about', [LandingPageController::class, 'about'])->name('about');
    Route::get('/pricing', [LandingPageController::class, 'pricing'])->name('pricing');
    Route::get('/contact', [LandingPageController::class, 'contact'])->name('contact');
    Route::get('/terms', [LandingPageController::class, 'terms'])->name('terms');
    Route::get('/privacy-policy', [LandingPageController::class, 'privacyPolicy'])->name('privacy-policy');
    Route::get('/refund-policy', [LandingPageController::class, 'refundPolicy'])->name('refund-policy');

    // Register Tenant
    Route::get('/register', [LandingPageController::class, 'register'])->name('register');
    Route::post('/register', [LandingPageController::class, 'registerStore']);

    // Login Tenant
    Route::get('/login', [LandingPageController::class, 'login'])->name('login');
    Route::post('/login', [LandingPageController::class, 'loginStore']);

    // Forgot Password Tenant
    Route::get('/register/registration-complete', [LandingPageController::class, 'registrationComplete'])->name('register.registration-complete');
    Route::get('/register/token/{token}', [LandingPageController::class, 'completeRegistration'])->name('register.token');
    Route::post('/register/token/{token}', [LandingPageController::class, 'completeRegistrationStore']);
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
});
