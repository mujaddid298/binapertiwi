<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [UserController::class, 'home'])->name('home')->middleware('checkrole:admin');

Route::get('/login', [AuthController::class, 'login']);

Route::get('/admin', [UserController::class, 'admin']);
