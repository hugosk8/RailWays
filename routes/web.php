<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\guest\GuestController;
use Illuminate\Support\Facades\Route;

// For everybody
Route::group([], function () {
    Route::get('/', [GuestController::class, 'index'])->name('home');
    Route::get('/contact', [GuestController::class, 'contact'])->name('contact');
});

// For connected users
Route::middleware(['auth', 'verified', 'customer'])->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'index'])->name('dashboard');

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// For administrator
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/users_list', [AdminController::class, 'show_users_list'])->name('users_list');
    Route::resource('services', ServiceController::class);
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
