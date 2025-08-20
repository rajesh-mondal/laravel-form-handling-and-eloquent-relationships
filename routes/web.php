<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('home');
});

Route::view('/', 'home');
Route::view('/register', 'auth.registration');
Route::view('/login', 'auth.login');
Route::view('/admin', 'dashboard');


Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class);