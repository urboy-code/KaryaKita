<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePublicController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/profile/public', [ProfilePublicController::class, 'edit'])->name('profile.public.edit');
    Route::patch('/profile/public', [ProfilePublicController::class, 'update'])->name('profile.public.update');
});

Route::middleware('auth')->group(function () {
    Route::resource('service', ServiceController::class);
});

require __DIR__ . '/auth.php';
