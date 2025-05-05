<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersetujuanNakController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BcController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\MeetingController;
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
    Route::get('/admin/detail', [AdminController::class, 'detail'])->name('admin.detail');
    Route::get('/admin/form_nak', [AdminController::class, 'formnak'])->name('admin.formnak');
    Route::post('/store-nak', [NotaController::class, 'storeformnak'])->name('admin.storeformnak');


    Route::get('admin/form_openblock', [AdminController::class, 'openblock'])->name('admin.form_openblock');
    Route::get('admin/level1', [AdminController::class, 'level1'])->name('admin.level1');
    Route::get('admin/level3', [AdminController::class, 'level3'])->name('admin.level3');
    //halaman tingkatan
    Route::get('admin/persetujuan3', [AdminController::class, 'persetujuan3'])->name('admin.persetujuan3');

    // Meeting routes
    Route::get('admin/meeting', [MeetingController::class, 'index'])->name('admin.meeting.index');
    Route::get('admin/meeting/create', [MeetingController::class, 'create'])->name('admin.meeting.create');
    Route::post('admin/meeting', [MeetingController::class, 'store'])->name('admin.meeting.store');
    Route::get('admin/meeting/{id}/edit', [MeetingController::class, 'edit'])->name('admin.meeting.edit');
    Route::put('admin/meeting/{id}', [MeetingController::class, 'update'])->name('admin.meeting.update');
    Route::delete('admin/meeting/{id}', [MeetingController::class, 'destroy'])->name('admin.meeting.destroy');
    Route::get('admin/meeting/{id}', [MeetingController::class, 'show'])->name('admin.meeting.show');
});


Route::get('/persetujuan_nak', [UserController::class, 'index'])->name('pages.persetujuan');
Route::get('/persetujuan_nak/create', [PersetujuanNakController::class, 'create'])->name('persetujuan_nak.create');
Route::post('/persetujuan_nak/store', [PersetujuanNakController::class, 'store'])->name('persetujuan_nak.store');


Route::get('/meeting', [userController::class, 'meeting'])->name('pages.meeting');
Route::get('/meeting', [userController::class, 'meeting'])->name('pages.create');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/form_cetak', [userController::class, 'formcetak'])->name('pages.form_cetak');
// Route::post('/cetak', [UserController::class, 'cetak'])->name('pages.cetak');
Route::get('/cetak', [UserController::class, 'cetak'])->name('pages.cetak');

Route::post('/cetak-preview', [UserController::class, 'previewCetak'])->name('cetak.preview');
Route::post('/cetak-pdf', [UserController::class, 'generatePdf'])->name('formcetak.pdf');

Route::get('/form_openblock', [userController::class, 'openblock'])->name('pages.form_openblock');


// Route for role login accessible to all users
Route::post('/role-login', [AuthController::class, 'RoleLogin'])->name('role.login');
Route::get('/login', [AuthController::class, 'login'])->name('login');

// Group routes that require the 'bc' role
Route::middleware([CheckRole::class . ':bc'])->group(function () {
    Route::get('/bc/home', [BcController::class, 'home'])->name('bc.home');
    Route::get('/bc/daftaruser', [BcController::class, 'daftaruser'])->name('bc.daftaruser');
    Route::get('/bc/datacustomer', [BcController::class, 'datacustomer'])->name('bc.datacustomer');
    Route::post('/bc/upload-excel', [BcController::class, 'uploadExcel'])->name('bc.uploadExcel');
    Route::get('/bc/detail', [BcController::class, 'detail'])->name('bc.detail');
    Route::get('/bc/form_nak', [BcController::class, 'formnak'])->name('bc.formnak');
    Route::post('/store-nak', [NotaController::class, 'storeformnak'])->name('bc.storeformnak');
    Route::get('bc/form_openblock', [BcController::class, 'openblock'])->name('bc.form_openblock');
    Route::get('bc/level1', [BcController::class, 'level1'])->name('bc.level1');
    Route::get('bc/level3', [BcController::class, 'level3'])->name('bc.level3');
    Route::get('bc/persetujuan3', [BcController::class, 'persetujuan3'])->name('bc.persetujuan3');

    // Meeting routes
    Route::get('bc/meeting', [MeetingController::class, 'indexbc'])->name('bc.meeting.index');
    Route::get('bc/meeting/create', [MeetingController::class, 'createbc'])->name('bc.meeting.create');
    Route::post('bc/meeting', [MeetingController::class, 'storebc'])->name('bc.meeting.store');
    Route::get('bc/meeting/{id}/edit', [MeetingController::class, 'editbc'])->name('bc.meeting.edit');
    Route::put('bc/meeting/{id}', [MeetingController::class, 'updatebc'])->name('bc.meeting.update');
    Route::delete('bc/meeting/{id}', [MeetingController::class, 'destroybc'])->name('bc.meeting.destroy');
    Route::get('bc/meeting/{id}', [MeetingController::class, 'showbc'])->name('bc.meeting.show');
});