<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
    
// });

Route::post('/user_login', [App\Http\Controllers\UserController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function(){
    
Route::get('/user_get', [App\Http\Controllers\UserController::class, 'get']);

});

Route::post('video/upload', [App\Http\Controllers\VidoeController::class, 'store']);
Route::get('video/show', [App\Http\Controllers\VidoeController::class, 'show']);
