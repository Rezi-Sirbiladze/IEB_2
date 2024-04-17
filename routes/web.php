<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FairController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
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

Route::get('/', [FairController::class, 'index'])->name('fair.index');
Route::get('activities', [FairController::class, 'activities'])->name('fair.activities');
Route::get('location', [FairController::class, 'location'])->name('fair.location');

Route::get('/dashboard', function () {
    return view('fair.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('bookings/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
    Route::get('booking/{fairActivity}', [BookingController::class, 'store'])->name('booking.store');
    Route::get('booking/delete/{booking}', [BookingController::class, 'destroy'])->name('booking.delete');

    Route::get('user/{fair}/bookings/delete', [BookingController::class, 'destroyFairUserBookings'])->name('user.deletefairBookings');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/modalReview', [ReviewController::class, 'modalReview'])->name('modalReview');
    Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
});

require __DIR__.'/auth.php';
