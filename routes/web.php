<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\TripController as AdminTripController;
use App\Http\Controllers\Admin\RouteTripController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================
// Guest Routes (tanpa login)
// ==========================

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// ==========================
// Authenticated Routes
// ==========================

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// ==========================
// Halaman Publik (PageController)
// ==========================

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/schedule', [PageController::class, 'schedule'])->name('schedule');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// ==========================
// Booking (Umum)
// ==========================

Route::get('/booking/form', [BookingController::class, 'form'])->name('booking.form');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

// ==========================
// Detail Trip (Publik)
// ==========================

Route::get('/trip/{slug}', [AdminTripController::class, 'show'])->name('trip.detail');

// ==========================
// Admin Area (dengan auth)
// ==========================

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/home', [AdminController::class, 'index'])->name('home');\
    Route::delete('/bookings/{id}', [AdminController::class, 'destroy'])->name('bookings.destroy');

    // Route trip management
    Route::resource('routes', RouteTripController::class)->except(['show']);

    // Trip management
    Route::resource('trips', AdminTripController::class)->except(['show']);

    // (Opsional) Custom Edit & Update untuk RouteTrip jika resource perlu override
    Route::get('/routes/{id}/edit', [RouteTripController::class, 'edit'])->name('routes.edit');
    Route::put('/routes/{id}', [RouteTripController::class, 'update'])->name('routes.update');
});


// ==========================
// Fallback View Login (jika file login.blade.php ada)
// ==========================

Route::get('/login', function () {
    return view('auth.login'); // Pastikan file resources/views/auth/login.blade.php tersedia
})->name('login');
