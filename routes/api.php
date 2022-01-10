<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\IzinController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AbsensiController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('user/photo', [UserController::class, 'updatePhoto']);
    Route::post('logout', [UserController::class, 'logout']);


    Route::get('izin', [IzinController::class, 'all']);
    Route::post('create', [IzinController::class, 'create']);
    Route::post('izin/{id}', [IzinController::class, 'update']);
    Route::post('izinPhoto', [IzinController::class, 'uploadPhoto']);

    Route::post('absensi', [AbsensiController::class, 'create']);
    Route::get('absensiAll', [AbsensiController::class, 'all']);
    Route::post('absensiPhoto', [AbsensiController::class, 'uploadPhoto']);
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
