<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\PackageController as FrontendPackageController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\VehicleController as FrontendVehicleController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/vehicles', [FrontendVehicleController::class, 'index'])->name('frontend.vehicles.index');
Route::get('/vehicles/{id}', [FrontendVehicleController::class, 'show'])->name('frontend.vehicles.show');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('frontend.contact.send');

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

    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('admin.booking.index');
    Route::get('/bookings/{id}', [AdminBookingController::class, 'show'])->name('admin.booking.show');
    Route::delete('/bookings/{id}', [AdminBookingController::class, 'destroy'])->name('admin.booking.destroy');
    Route::post('/bookings/{id}/status', [AdminBookingController::class, 'updateStatus'])->name('admin.bookings.updateStatus');

});


Route::get('/packages', [FrontendPackageController::class, 'index'])->name('frontend.packages.index');
Route::get('/packages/{package}', [FrontendPackageController::class, 'show'])->name('frontend.packages.show');

Route::get('/book', [BookingController::class, 'create'])->name('booking.create');
Route::post('/book', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking-success', [BookingController::class, 'success'])->name('booking.success');

