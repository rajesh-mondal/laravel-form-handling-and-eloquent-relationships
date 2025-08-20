<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('/', 'home');
Route::view('/register', 'auth.registration');
Route::view('/login', 'auth.login');