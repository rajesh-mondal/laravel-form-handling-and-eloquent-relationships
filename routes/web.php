<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('home');
});

// Route::view('/', 'home');
Route::view('/register', 'auth.registration');
Route::view('/login', 'auth.login');

Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])
    ->name('admin.dashboard');


Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class);

// All Articles Page
Route::get('/', [HomeController::class, 'home'])->name('home');