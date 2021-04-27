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
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::resource('home', App\Http\Controllers\HomeController::class);


Route::resource('posts', App\Http\Controllers\PostsController::class);
Route::resource('pdfs', App\Http\Controllers\PdfController::class);

Route::resource('users', App\Http\Controllers\UserController::class);
