<?php

use App\Http\Controllers\PlanetController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserPlanetController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('logout', [UserAuthController::class, 'logout']);

    Route::get('planets', [PlanetController::class, 'index']);
    Route::get('planets/{id}', [PlanetController::class, 'detail']);
    Route::get('user-planets/{planetId?}/{userId?}', [UserPlanetController::class, 'index']);
});

Route::post('login', [UserAuthController::class, 'login']);
Route::post('register', [UserAuthController::class, 'register']);

Route::get('token', function () {
    return csrf_token();
});
