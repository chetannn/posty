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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'loginStore']);
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'registerStore']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth');

Route::post('/posts', [\App\Http\Controllers\PostsController::class, 'store']);
Route::get('/posts', [\App\Http\Controllers\PostsController::class, 'index']);
Route::get('/posts/create', [\App\Http\Controllers\PostsController::class, 'create'])->middleware('auth');
Route::get('/posts/delete/{id}', [\App\Http\Controllers\PostsController::class, 'destroy'])->middleware('auth');
Route::get('/posts/edit/{id}', [\App\Http\Controllers\PostsController::class, 'edit'])->middleware('auth');
Route::post('/posts/update/{id}', [\App\Http\Controllers\PostsController::class, 'update'])->middleware('auth');
