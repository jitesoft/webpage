<?php

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

Route::get('/', App\Http\Controllers\Web\IndexController::class . "@getWelcome");
Route::get('/contact', \App\Http\Controllers\Web\IndexController::class . "@getContact");
Route::get('/about', \App\Http\Controllers\Web\IndexController::class . "@getAbout");
