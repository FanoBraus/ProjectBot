<?php

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

Route::get('/belongstomany', [\App\Http\Controllers\UserController::class, 'test']);
Route::get('/hasone', [\App\Http\Controllers\UserController::class, 'test2']); 
