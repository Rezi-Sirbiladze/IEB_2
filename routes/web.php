<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FairController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\FairActivityController;
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
    if (auth()->user()->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }
    return view('fair.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'role:admin')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('fair/{fair_id}', [AdminController::class, 'fairActivities'])->name('fairActivities');
        Route::get('fairActivity/{fairActivity_id}', [AdminController::class, 'fairActivityBookings'])->name('fairActivityBookings');

        Route::post('updatepresentedstatus', [AdminController::class, 'updatePresentedStatus'])->name('updatepresentedstatus');

        Route::resource('fairs', FairController::class);
        Route::resource('activities', ActivityController::class);

        Route::get('fairActivities/create/{fair_id}', [FairActivityController::class, 'create'])->name('fairActivities.create');
        Route::get('fairActivities/editar/{fair_id}/{fairActivity_id}', [FairActivityController::class, 'edit'])->name('fairActivities.edit');
        Route::resource('fairActivities', FairActivityController::class)->except(['create', 'edit']);
    });
}); 

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

require __DIR__ . '/auth.php';
