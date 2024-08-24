<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\StopController;
use App\Http\Controllers\NoteController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('trips.days', DayController::class);
    Route::apiResource('days.stops', StopController::class);
    Route::apiResource('stops.notes', NoteController::class);
});

Route::get('trips/{tripId}', [TripController::class, 'getTripDetails']);
Route::get('/trips/{id}', [TripController::class, 'show']);
Route::apiResource('trips', TripController::class);

Route::post('stops/{stopId}/notes', [StopController::class, 'addNote']);
Route::post('/stops/{id}/rate', [StopController::class, 'rate']);

Route::post('/stops/{stop}/notes', [NoteController::class, 'store']);
Route::delete('/notes/{noteId}', [NoteController::class, 'destroy']);


