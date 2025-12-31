<?php

use App\Http\Controllers\SuperAdmin\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->name('s.')->middleware('auth:superadmin', 'verified:s.verification.notice')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware([])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});
