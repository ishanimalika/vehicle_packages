<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\DriverController;

Route::get('/', function () {
    return view('welcome');
});



// Public
Route::get('/', function () {
    return view('welcome');
});

// Admin login/logout
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Protected admin area
Route::middleware(['adminauth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/vehicles', VehicleController::class);
    Route::resource('/packages', PackageController::class);
    Route::resource('/drivers', DriverController::class);
});
