<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SHAController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.frontend.home');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('password/reset', [AuthController::class, 'showResetForm'])->name('password.request');
    Route::post('password/reset', [AuthController::class, 'resetPassword'])->name('password.reset');
});



Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

});
