<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect()->route('login'); // kalau buka root langsung arahkan ke login
});

//////////////////////////////
// Route Authentication
    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('login')
        ->middleware('guest');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])
        ->name('register')
        ->middleware('guest');
    Route::post('/register', [AuthController::class, 'register']);

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout')
        ->middleware('auth');

//////////////////////////////
// Protected Routes (Harus Login)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

