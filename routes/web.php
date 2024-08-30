<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\StopController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotte per Days
Route::get('/days/create', [DayController::class, 'create'])->name('days.create');
Route::post('/days', [DayController::class, 'store'])->name('days.store');
Route::get('/days', [DayController::class, 'showDaysPage'])->name('days.index');

// Rotte per Stops
Route::get('/stops/create', [StopController::class, 'create'])->name('stops.create');
Route::post('/stops', [StopController::class, 'store'])->name('stops.store');
Route::get('/stops', [StopController::class, 'showStopsPage'])->name('stops.index');

// Rotte per Trips
Route::get('/trips', [TripController::class, 'showTripsPage'])->name('trips.index');
Route::get('/trips/create', [TripController::class, 'create'])->name('trips.create');
Route::post('/trips', [TripController::class, 'store'])->name('trips.store');
Route::get('/trips/{id}', [TripController::class, 'show'])->name('trips.show');
Route::get('/trips/{id}/edit', [TripController::class, 'edit'])->name('trips.edit');
Route::put('/trips/{id}', [TripController::class, 'update'])->name('trips.update');
Route::delete('/trips/{id}', [TripController::class, 'destroy'])->name('trips.destroy');

// Richieste API per Vue.js
Route::prefix('api')->group(function () {
    Route::get('/trips', [TripController::class, 'index']);
    Route::get('/stops', [StopController::class, 'index']);
    Route::get('/days', [DayController::class, 'index']);
});

require __DIR__.'/auth.php';
