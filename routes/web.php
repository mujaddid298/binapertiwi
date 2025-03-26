<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersetujuanNakController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckRole; 

// Public routes
Route::get('/', function () {
    return view('auth.login');
});

Route::post('/role-login', [AuthController::class, 'RoleLogin'])->name('role.login');
Route::get('/login', [AuthController::class, 'login'])->name('login');

// Group routes that require the 'admin' role
Route::middleware([CheckRole::class . ':admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/admin/daftaruser', [AdminController::class, 'daftaruser'])->name('admin.daftaruser');
    Route::get('/admin/datacustomer', [AdminController::class, 'datacustomer'])->name('admin.datacustomer');
    Route::post('/admin/upload-excel', [AdminController::class, 'uploadExcel'])->name('admin.uploadExcel');
});


Route::get('/form_nak', [userController::class, 'formnak'])->name('pages.formnak');
Route::get('/persetujuan_nak', [UserController::class, 'index'])->name('pages.persetujuan');
Route::get('/persetujuan_nak/create', [PersetujuanNakController::class, 'create'])->name('persetujuan_nak.create');
Route::post('/persetujuan_nak/store', [PersetujuanNakController::class, 'store'])->name('persetujuan_nak.store');
 

Route::get('/meeting', [userController::class, 'meeting'])->name('pages.meeting');
Route::get('/meeting', [userController::class, 'meeting'])->name('pages.create');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

<<<<<<< HEAD
=======
Route::get('/meeting', [userController::class, 'meeting'])->name('pages.meeting');
Route::get('/form_cetak', [userController::class, 'formcetak'])->name('pages.form_cetak');
// Route::post('/cetak', [UserController::class, 'cetak'])->name('pages.cetak');
Route::get('/cetak', [UserController::class, 'cetak'])->name('pages.cetak');

Route::post('/cetak-preview', [UserController::class, 'previewCetak'])->name('cetak.preview');
Route::post('/cetak-pdf', [UserController::class, 'generatePdf'])->name('formcetak.pdf');

Route::get('/form_openblock', [userController::class, 'openblock'])->name('pages.form_openblock');
>>>>>>> 8c79a8f9ff7576d75f1e7c35515c1bb474b163b3
