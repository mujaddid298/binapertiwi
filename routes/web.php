<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KreditController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [UserController::class, 'home'])->name('home')->middleware('checkrole:admin');

Route::get('/login', [AuthController::class, 'login']);

Route::get('/admin', [UserController::class, 'admin']);

Route::get('/form_nak', [KreditController::class, 'form_nak'])->name('pages.form_nak');