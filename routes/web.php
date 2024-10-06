<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\guest\GuestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// For everybody
Route::group([], function () {
    Route::get('/', [GuestController::class, 'index'])->name('home');
    Route::get('/contact', [GuestController::class, 'contact'])->name('contact');
});

// For connected users
Route::middleware(['auth', 'verified', 'customer'])->group(function () {
    // User dashboard
    Route::get('/dashboard', [CustomerController::class, 'index'])->name('dashboard');

    // User profile
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// For administrator
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard'); // ?
});

require __DIR__.'/auth.php';
