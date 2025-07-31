<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\TripController as AdminTripController;
use App\Http\Controllers\Admin\RouteTripController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\ArmadaController;

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


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// ==========================
// Authenticated Routes
// ==========================

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// ==========================
// Halaman Publik (PageController)
// ==========================

Route::get('/', [PageController::class, 'index'])->name('home');
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

Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/home', [AdminController::class, 'index'])->name('home');

    // Hapus booking
    Route::delete('/bookings/{id}', [AdminController::class, 'destroy'])->name('bookings.destroy');

    // Route trip management
    Route::resource('routes', RouteTripController::class)->except(['show']);

    // Trip management
    Route::resource('trips', AdminTripController::class)->except(['show']);
    Route::resource('armadas', ArmadaController::class)->only(['index', 'store', 'destroy']);
});


// ==========================
// Fallback View Login (jika file login.blade.php ada)
// ==========================

Route::get('/login', function () {
    return view('auth.login'); // Pastikan file resources/views/auth/login.blade.php tersedia
})->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
