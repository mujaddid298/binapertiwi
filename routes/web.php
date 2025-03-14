<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersetujuanNakController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login']);

// Group routes that require the 'admin' role
Route::middleware([CheckRole::class . ':admin'])->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::get('/admin', [UserController::class, 'admin']);
});

// You can add more routes that require the 'admin' role here

Route::get('/form_nak', [userController::class, 'formnak'])->name('pages.formnak');
Route::get('/persetujuan_nak', [UserController::class, 'index'])->name('pages.persetujuan');
Route::get('/persetujuan_nak/create', [PersetujuanNakController::class, 'create'])->name('persetujuan_nak.create');
Route::post('/persetujuan_nak/store', [PersetujuanNakController::class, 'store'])->name('persetujuan_nak.store');