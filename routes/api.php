<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\GeneralController;

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

Route::group(['middleware' => 'api'], function() {

    Route::post('auth/login', [AuthController::class, 'login']);
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('auth/logout', [AuthController::class, 'logout']);
        Route::get('auth/user', [AuthController::class, 'user']);
        Route::resource('estudiantes',EstudiantesController::class)->except(['edit','create']);
        Route::get('get_listas',[GeneralController::class, 'getListas']);
    });
});

