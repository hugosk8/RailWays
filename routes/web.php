<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\AppointmentController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\guest\GuestController;
use Illuminate\Support\Facades\Route;

// For everybody
Route::group([], function () {
    Route::get('/', [GuestController::class, 'index'])->name('home');
    Route::get('/contact', [GuestController::class, 'contact'])->name('contact');
    Route::get('/prestations', [GuestController::class, 'prestations'])->name('prestations');
    Route::get('/reservation', [GuestController::class, 'reservation'])->name('reservation');
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
    Route::get('/users/list', [UserController::class, 'list'])->name('users.list');
    Route::get('/payments/list', [PaymentController::class, 'list'])->name('payments.list');
    Route::get('/services/list', [ServiceController::class, 'list'])->name('services.list');
    Route::get('/appointments/list', [AppointmentController::class, 'list'])->name('appointments.list');
    Route::resource('appointments', AppointmentController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
