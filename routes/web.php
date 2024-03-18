<?php

use App\Http\Controllers\PlanetController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/logout', [UserAuthController::class, 'logout']);

    Route::get('/planets', [PlanetController::class, 'index']);
    Route::get('/planets/{id}', [PlanetController::class, 'detail']);
});

Route::post('/login', [UserAuthController::class, 'login']);

Route::get('/token', function () {
    return csrf_token();
});
