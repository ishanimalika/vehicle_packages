<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Frontend\PackageController as FrontendPackageController;


Route::get('/', function() {
    return view('home');
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


Route::get('/packages', [FrontendPackageController::class, 'index'])->name('frontend.packages.index');
Route::get('/packages/{package}', [FrontendPackageController::class, 'show'])->name('frontend.packages.show');

