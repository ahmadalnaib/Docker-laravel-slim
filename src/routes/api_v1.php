<?php

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\TicketController;





Route::prefix('v1')->group(function () {
    Route::apiResource('tickets', TicketController::class)->middleware('auth:sanctum');
    Route::apiResource('users', UserController::class)->middleware('auth:sanctum');
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
