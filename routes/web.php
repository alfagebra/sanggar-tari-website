<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;

// ==========================================
// PUBLIC ROUTES
// ==========================================
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/profil', [PublicController::class, 'profile'])->name('profile');
Route::get('/artikel', [PublicController::class, 'articles'])->name('articles.index');
Route::get('/artikel/{slug}', [PublicController::class, 'articleDetail'])->name('articles.show');
Route::get('/galeri', [PublicController::class, 'gallery'])->name('gallery.index');
Route::get('/jadwal', [PublicController::class, 'schedule'])->name('schedule.index');
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['id', 'en'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

// ==========================================
// AUTH ROUTES
// ==========================================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// PROTECTED ADMIN ROUTES
// ==========================================
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile Management
    Route::get('/profil', [DashboardController::class, 'profileEdit'])->name('profile');
    Route::post('/profil', [DashboardController::class, 'profileUpdate'])->name('profile.update');
    
    // Articles Management
    Route::get('/articles', [DashboardController::class, 'articles'])->name('articles');
    Route::get('/articles/create', [DashboardController::class, 'articleCreate'])->name('articles.create');
    Route::post('/articles/store', [DashboardController::class, 'articleStore'])->name('articles.store');
    Route::get('/articles/edit/{id}', [DashboardController::class, 'articleEdit'])->name('articles.edit');
    Route::post('/articles/update/{id}', [DashboardController::class, 'articleUpdate'])->name('articles.update');
    Route::post('/articles/destroy/{id}', [DashboardController::class, 'articleDestroy'])->name('articles.destroy');
    
    // Galleries Management
    Route::get('/galleries', [DashboardController::class, 'galleries'])->name('galleries');
    Route::get('/galleries/create', [DashboardController::class, 'galleryCreate'])->name('galleries.create');
    Route::post('/galleries/store', [DashboardController::class, 'galleryStore'])->name('galleries.store');
    Route::post('/galleries/destroy/{id}', [DashboardController::class, 'galleryDestroy'])->name('galleries.destroy');
    
    // Schedules Management
    Route::get('/schedules', [DashboardController::class, 'schedules'])->name('schedules');
    Route::get('/schedules/create', [DashboardController::class, 'scheduleCreate'])->name('schedules.create');
    Route::post('/schedules/store', [DashboardController::class, 'scheduleStore'])->name('schedules.store');
    Route::get('/schedules/edit/{id}', [DashboardController::class, 'scheduleEdit'])->name('schedules.edit');
    Route::post('/schedules/update/{id}', [DashboardController::class, 'scheduleUpdate'])->name('schedules.update');
    Route::post('/schedules/destroy/{id}', [DashboardController::class, 'scheduleDestroy'])->name('schedules.destroy');
});
