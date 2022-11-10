<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::view('user','user');
Route::get('getuser',[\App\Http\Controllers\UserController::class,'index']);
Route::post('insert',[\App\Http\Controllers\UserController::class,'insert']);
Route::post('show/{user}',[\App\Http\Controllers\UserController::class,'show']);
Route::put('update/{id}',[\App\Http\Controllers\UserController::class,'update']);
Route::post('delete/{id}',[\App\Http\Controllers\UserController::class,'delete']);



