<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
