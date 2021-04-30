<?php

use App\Models\User;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});



Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route videos
Route::get('video/list', [App\Http\Controllers\VidoeController::class, 'index'])->name('video/list');
Route::get('upload/index', [App\Http\Controllers\VidoeController::class, 'create_index'])->name('upload/index');
Route::post('upload/video', [App\Http\Controllers\VidoeController::class, 'upload_video'])->name('upload/video');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
