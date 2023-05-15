<?php

use App\Http\Controllers\Api\MyApiController;
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

Route::get('/get-room-types/{id}', [MyApiController::class, 'getRoomTypes']);
Route::post('/calculate-price', [MyApiController::class, 'calculatePrice']);
Route::post('/check-availability', [MyApiController::class, 'checkRoomAvailability']);
Route::post('/create-booking', [MyApiController::class, 'makeBooking']);
Route::post('/make-reservations', [MyApiController::class, 'makeReservations']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
