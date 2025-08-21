<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get( '/', function () {
    return view( 'home' );
} );

// Route::view('/', 'home');
Route::view( '/register', 'auth.registration' )->name( 'register' );
Route::view( '/login', 'auth.login' )->name( 'login' );

Route::get( '/admin/dashboard', [DashboardController::class, 'dashboard'] )
    ->name( 'admin.dashboard' );

Route::resource( 'categories', CategoryController::class );
Route::resource( 'posts', PostController::class );

Route::get( '/', [HomeController::class, 'home'] )->name( 'home' );

Route::get( '/category/{id}/posts', [PostController::class, 'postsByCategory'] )->name( 'category.posts' );