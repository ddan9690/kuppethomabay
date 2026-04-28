<?php

use App\Http\Controllers\AgencyPayerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BbfMembershipController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PdfDownloadController;
use App\Http\Controllers\SubCountyBbfRepController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::view('/downloads', 'pages.frontend.downloads')->name('downloads');
Route::view('/bec-circulars', 'pages.frontend.circulars')->name('circulars');
Route::view('/petitions-memoranda', 'pages.frontend.memoranda-and-petitions')->name('petitions.memoranda');
Route::view('/bbf/by-laws-comparison', 'pages.frontend.welfare-reform-brief')->name('bbf.by-laws.comparison');
// Route::view('/financial-report/march-april-2026', 'pages.frontend.financial-report')->name('financial.report.march.april.2026');

Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/bbf/register', [BbfMembershipController::class, 'create'])->name('bbf.register');
Route::post('/bbf/register', [BbfMembershipController::class, 'store'])->name('bbf.register.store');

Route::get('/agency-payer', [AgencyPayerController::class, 'create'])->name('agency_payer.create');
Route::post('/agency-payer', [AgencyPayerController::class, 'store'])->name('agency_payer.store');

Route::post('/contact', [FeedbackController::class, 'store'])->name('feedback.store');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('password/reset', [AuthController::class, 'showResetForm'])->name('password.request');
    Route::post('password/reset', [AuthController::class, 'changePassword'])->name('password.reset');
    Route::get('agency-payers', [AgencyPayerController::class, 'index'])->name('agency_payer.index');
    Route::get('agency-payers/pdf', [PdfDownloadController::class, 'agencyPayers'])->name('agency_payer.pdf');
});

Route::prefix('admin/bbf')->middleware(['auth', 'role:executive|organising-secretary|super-admin'])->group(function () {
    Route::get('applications', [BbfMembershipController::class, 'applications'])->name('bbf.applications.index');
    Route::get('members/{id}', [BbfMembershipController::class, 'show'])->name('bbf.members.show');
    Route::post('members/{id}/approve', [BbfMembershipController::class, 'approve'])->name('bbf.members.approve');
    Route::post('members/{id}/reject', [BbfMembershipController::class, 'reject'])->name('bbf.members.reject');
    Route::get('applications/pdf', [PdfDownloadController::class, 'bbfPendingApplications'])->name('bbf.applications.pending.pdf');
});

Route::prefix('admin/sub-county-reps')->middleware(['auth', 'role:executive|organising-secretary|super-admin'])->group(function () {
    Route::get('/', [SubCountyBbfRepController::class, 'index'])->name('sub_county_bbf_reps.index');
    Route::get('create', [SubCountyBbfRepController::class, 'add'])->name('sub_county_bbf_reps.create');
    Route::post('store', [SubCountyBbfRepController::class, 'store'])->name('sub_county_bbf_reps.store');
    Route::get('{subCountyBbfRep}', [SubCountyBbfRepController::class, 'show'])->name('sub_county_bbf_reps.show');
    Route::put('{subCountyBbfRep}', [SubCountyBbfRepController::class, 'update'])->name('sub_county_bbf_reps.update');
    Route::delete('{subCountyBbfRep}', [SubCountyBbfRepController::class, 'destroy'])->name('sub_county_bbf_reps.destroy');
});

Route::prefix('admin/news')->middleware(['auth', 'role:executive|organising-secretary|super-admin'])->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('admin.news.index');
    Route::get('create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('{news}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('{news}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('{news}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
});
