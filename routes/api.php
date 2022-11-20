<?php

use App\Http\Controllers\SMSController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller('writeSMS', 'SMSController');

Route::controller(SMSController::class)->group(function () {
    // Route::get('/orders/{id}', 'show');
    Route::post('/writeSMS', 'writeSMS');
    Route::get('/consumeSMS', 'consumeSMS');
    Route::get('/getAllSMSNoInQueue', 'getAllSMSNoInQueue');
    Route::get('/getAllSMSInQueue', 'getAllSMSInQueue');
});
