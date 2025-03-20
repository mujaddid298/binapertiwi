<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersetujuanNakController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\MeetingController;

// Public routes
Route::get('/', function () {
    return view('auth.login');
});

Route::post('/role-login', [AuthController::class, 'RoleLogin'])->name('role.login');
Route::get('/login', [AuthController::class, 'login']);

// Group routes that require the 'admin' role
Route::middleware([CheckRole::class . ':admin'])->group(function () {
<<<<<<< HEAD
    Route::get('/pages/admin/home', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/pages/admin/daftaruser', [AdminController::class, 'daftaruser'])->name('admin.daftaruser');

=======
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::get('/admin', [UserController::class, 'admin']);
>>>>>>> 97c158152647eb492c84e9010eefda328726ce43
});


Route::get('/form_nak', [userController::class, 'formnak'])->name('pages.formnak');
Route::get('/persetujuan_nak', [UserController::class, 'index'])->name('pages.persetujuan');
Route::get('/persetujuan_nak/create', [PersetujuanNakController::class, 'create'])->name('persetujuan_nak.create');
Route::post('/persetujuan_nak/store', [PersetujuanNakController::class, 'store'])->name('persetujuan_nak.store');
<<<<<<< HEAD
=======

Route::get('/meeting', [userController::class, 'meeting'])->name('pages.meeting');
Route::get('/meeting', [userController::class, 'meeting'])->name('pages.create');
>>>>>>> 97c158152647eb492c84e9010eefda328726ce43
