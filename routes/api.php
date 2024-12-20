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

// Rimuovi il middleware di autenticazione per il test
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Rotte senza middleware di autenticazione
Route::apiResource('trips.days', DayController::class);
Route::apiResource('days.stops', StopController::class);

Route::post('/stops/{id}/rate', [StopController::class, 'rate']);
Route::post('/stops/{stop}/notes', [NoteController::class, 'store']);
Route::delete('/notes/{noteId}', [NoteController::class, 'destroy']);
