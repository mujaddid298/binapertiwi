<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login']);

// Group routes that require the 'admin' role
Route::middleware([CheckRole::class.':admin'])->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::get('/admin', [UserController::class, 'admin']);
});
