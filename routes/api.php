<?php

use App\Http\Controllers\API\AuthUserController;
use App\Http\Controllers\API\CityController;
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

Route::apiResource('cities' , CityController::class);

Route::prefix('auth/')->group(function(){
    Route::post('register' , [AuthUserController::class , 'register']);
    Route::post('login' , [AuthUserController::class , 'login']);
    Route::post('forgetPassword' , [AuthUserController::class , 'forgetPassword']);
    Route::post('resetPassword' , [AuthUserController::class , 'resetPassword']);

});

Route::prefix('auth')->middleware('auth:admin-api')->group(function(){
    Route::get('logout' , [AuthUserController::class , 'logout']);

});
