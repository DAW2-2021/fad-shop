<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:api')->group(function () {
    Route::resource('user', UserController::class);
    Route::put('update/{id}', [UserController::class, 'update']);
    Route::delete('user/{id}', [UserController::class, 'delete']);
});
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
