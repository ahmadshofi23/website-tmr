<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TripController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/schedule', [PageController::class, 'schedule'])->name('schedule');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


// Route::get('/booking', [BookingController::class, 'form'])->name('booking.form');
// Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
// Route::get('/booking/{id}/payment', [PaymentController::class, 'pay'])->name('booking.payment');
// Route::post('/payment/callback', [PaymentController::class, 'handleCallback']);

Route::get('/booking/form', [BookingController::class, 'form'])->name('booking.form');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

Route::get('/trip/{slug}', [TripController::class, 'show'])->name('trip.detail');




Route::get('/admin/bookings', [BookingController::class, 'admin'])->name('admin.bookings');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/bookings', [\App\Http\Controllers\AdminBookingController::class, 'index'])->name('admin.bookings.index');
});

Route::get('/login', function () {
    return view('auth.login'); // pastikan file resources/views/auth/login.blade.php ada
})->name('login');



