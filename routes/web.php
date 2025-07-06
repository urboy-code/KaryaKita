<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePublicController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TalentDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Talent Routes
    Route::middleware('role:talent')->prefix('talent')->name('talent.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile/public', [ProfilePublicController::class, 'edit'])->name('profile.public.edit');
        Route::patch('/profile/public', [ProfilePublicController::class, 'update'])->name('profile.public.update');

        // Service Routes
        Route::resource('services', ServiceController::class)->except(['index', 'show']);
        Route::get('/services', [TalentDashboardController::class, 'servicesIndex'])->name('services.index');

        // Route Dashboard Bookings Talent
        Route::get('/bookings', [TalentDashboardController::class, 'index'])->name('talent.bookings.index');

        // Route Baru: Untuk mengubah status booking
        Route::patch('/bookings/{booking}/accept', [TalentDashboardController::class, 'accept'])->name('talent.bookings.accept');
        Route::patch('/bookings/{booking}/reject', [TalentDashboardController::class, 'reject'])->name('talent.bookings.reject');
    });

    // Client Routes
    Route::middleware('role:client')->prefix('client')->name('client.')->group(function () {
        // Route Bookings
        Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
        Route::get('/bookings/{booking}/pay', [BookingController::class, 'pay'])->name('bookings.pay');

        // Route Dashboard Bookings User
        Route::get('/bookings', [ClientDashboardController::class, 'index'])->name('bookings.index');
    });

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::patch('/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle_status');
    });
});

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

require __DIR__ . '/auth.php';
