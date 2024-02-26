<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\RegistrantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::group(['prefix' => 'master'], function (){
    Route::apiResource('institution', InstitutionController::class)->only(['show', 'update']);
    Route::apiResource('major', MajorController::class);
});
Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::get('/auth/info', [AuthController::class, 'info']);
    Route::group(['prefix' => 'admission'],function (){
        Route::apiResource('registrant', RegistrantController::class);
    });
});
