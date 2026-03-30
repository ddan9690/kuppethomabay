<?php

use App\Http\Controllers\AgencyPayerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BbfMembershipController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PdfDownloadController;
use App\Http\Controllers\SHAController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.frontend.home');
});

Route::get('/downloads', function () {
    return view('pages.frontend.downloads');
})->name('downloads');

Route::get('/bec-circulars', function () {
    return view('pages.frontend.circulars');
})->name('circulars');

Route::get('/petitions-memoranda', function () {
    return view('pages.frontend.memoranda-and-petitions');
})->name('petitions.memoranda');

Route::get('/agency-payer', [AgencyPayerController::class, 'create'])
    ->name('agency_payer.create');

Route::get('/bbf/register', [BbfMembershipController::class, 'create'])
    ->name('bbf.register');

Route::post('/contact', [FeedbackController::class, 'store'])->name('feedback.store');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');

    Route::post('/agency-payer-form', [AgencyPayerController::class, 'store'])
        ->name('agency_payer.store');

    Route::post('/bbf/register', [BbfMembershipController::class, 'store'])
        ->name('bbf.register.store');
});



Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('password/reset', [AuthController::class, 'showResetForm'])->name('password.request');
    Route::post('password/reset', [AuthController::class, 'changePassword'])->name('password.reset');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/agency-payers', [AgencyPayerController::class, 'index'])
        ->name('agency_payer.index');
    Route::get('/agency-payers/pdf', [PdfDownloadController::class, 'agencyPayers'])
        ->name('agency_payer.pdf');
});
