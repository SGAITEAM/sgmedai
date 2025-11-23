<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [App\Http\Controllers\Api\AuthController::class, 'me']);
    Route::get('/test', function(){ return 'test'; });
    Route::post('/predict-with-image-dr', [Controller::class, 'apiPredImageDr']); // dr file
    Route::post('/predict-with-image-skin', [Controller::class, 'apiPredImageSkin']); // skin file
    Route::post('/predict-with-base64-dr', [Controller::class, 'apiPredBase64Dr']); // dr base64
    Route::post('/predict-with-base64-skin', [Controller::class, 'apiPredBase64Skin']); // skin base64

});