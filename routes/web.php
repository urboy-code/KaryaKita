<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePublicController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Service Routes




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/public', [ProfilePublicController::class, 'edit'])->name('profile.public.edit');
    Route::patch('/profile/public', [ProfilePublicController::class, 'update'])->name('profile.public.update');

    // Service Routes
    Route::resource('services', ServiceController::class)->except(['show']);
});

Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');




require __DIR__ . '/auth.php';
