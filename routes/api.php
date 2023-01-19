<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'prijava']);
Route::post('register', [UserController::class, 'registracija']);

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('vrste', \App\Http\Controllers\VrstaController::class);
    Route::resource('ukusi', \App\Http\Controllers\UkusController::class);
    Route::resource('poslastice', \App\Http\Controllers\PoslasticaController::class);
}); */ // poslednji commit- dodate
