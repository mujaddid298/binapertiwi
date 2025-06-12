<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersetujuanNakController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\BcController;
use App\Http\Controllers\OpenblokController;
use App\Http\Controllers\KomiteController;
use App\Http\Middleware\CheckRole;

// Public routes
Route::get('/', function () {
    return view('auth.login');
});

Route::post('/role-login', [AuthController::class, 'RoleLogin'])->name('role.login');
Route::get('/login', [AuthController::class, 'login'])->name('login');

// Group routes that require the 'admin' role
Route::middleware(['auth', CheckRole::class . ':admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/admin/daftaruser', [AdminController::class, 'daftaruser'])->name('admin.daftaruser');
    
    Route::get('/admin/daftaruser/create', [AdminController::class, 'createUser'])->name('admin.daftaruser.tambah');
    Route::post('/admin/daftaruser/store', [AdminController::class, 'storeUser'])->name('admin.daftaruser.store');
    Route::get('/admin/daftaruser/{id}/edit', [AdminController::class, 'editUser'])->name('admin.daftaruser.edit');
    Route::post('/admin/daftaruser/{id}/update', [AdminController::class, 'updateUser'])->name('admin.daftaruser.update');
    
    Route::get('/admin/datacustomer', [AdminController::class, 'datacustomer'])->name('admin.datacustomer');
    Route::post('/admin/upload-excel', [AdminController::class, 'uploadExcel'])->name('admin.uploadExcel');
    
    
    Route::get('/admin/detail/{id}', [AdminController::class, 'detail'])->name('admin.detail');
    
    
    Route::get('/admin/form_nak', [AdminController::class, 'formnak'])->name('admin.formnak');
    Route::post('/store-nak', [NotaController::class, 'storeformnak'])->name('admin.storeformnak');

    

    Route::get('admin/form_openblock/{id}', [OpenblokController::class, 'index'])->name('admin.form_openblock');


    Route::get('admin/level1', [AdminController::class, 'level1'])->name('admin.level1');
    Route::get('admin/level3', [AdminController::class, 'level3'])->name('admin.level3');




    // Add this line in routes/web.php
    Route::get('/admin/formTingkat3', [FormController::class, 'formTingkat3'])->name('admin.formTingkat3');
    Route::post('/admin/form/storeTingkat3', [FormController::class, 'storeTingkat3'])->name('admin.form.storeTingkat3');

    Route::get('/admin/formTingkat2', [FormController::class, 'formTingkat2'])->name('admin.formTingkat2');
    Route::post('/admin/form/storeTingkat2', [FormController::class, 'storeTingkat2'])->name('admin.form.storeTingkat2');



    Route::get('admin/meeting', [MeetingController::class, 'index'])->name('admin.meeting.index');
    Route::get('admin/meeting/create', [MeetingController::class, 'create'])->name('admin.meeting.create');
    Route::post('admin/meeting', [MeetingController::class, 'store'])->name('admin.meeting.store');
    Route::get('admin/meeting/{id}/edit', [MeetingController::class, 'edit'])->name('admin.meeting.edit');
    Route::put('admin/meeting/{id}', [MeetingController::class, 'update'])->name('admin.meeting.update');
    Route::delete('admin/meeting/{id}', [MeetingController::class, 'destroy'])->name('admin.meeting.destroy');
    Route::get('admin/meeting/{id}', [MeetingController::class, 'show'])->name('admin.meeting.show');
    
    
    
    Route::post('/form_openblock', [OpenblokController::class, 'store'])->name('openblok.store');


    //halaman tingkatan
    Route::get('admin/persetujuan3', [AdminController::class, 'persetujuan3'])->name('admin.persetujuan3');

    Route::get('/admin/getBlocksByMonth', [OpenblokController::class, 'getBlocksByMonth'])->name('admin.getBlocksByMonth');

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

    
    Route::get('/customer/{id}', [KomiteController::class, 'getCustomer'])->name('getCustomer');
    

    Route::get('/bc/profile', [BcController::class, 'profile'])->name('bc.profile.profile');
    Route::get('/bc/editprofile', [BcController::class, 'editprofile'])->name('bc.profile.editprofile');
    Route::put('/bc/update-profile', [BcController::class, 'updateProfile'])->name('bc.updateProfile');
});


// Route for role login accessible to all users
Route::post('/role-login', [AuthController::class, 'RoleLogin'])->name('role.login');
Route::get('/login', [AuthController::class, 'login'])->name('login');

// Group routes that require the 'user' role
Route::middleware([CheckRole::class . ':komite'])->group(function () {
    Route::get('/komite/home', [KomiteController::class, 'home'])->name('komite.home');
    Route::get('/komite/datacustomer', [KomiteController::class, 'datacustomer'])->name('komite.datacustomer');
    Route::get('/komite/detail', [KomiteController::class, 'detail'])->name('komite.detail');
    Route::get('/komite/form_nak', [KomiteController::class, 'formnak'])->name('komite.formnak');
    Route::get('/komite/form_openblock', [KomiteController::class, 'openblock'])->name('komite.form_openblock');
    Route::get('/komite/level1', [KomiteController::class, 'level1'])->name('komite.level1');
    Route::get('/komite/level3', [KomiteController::class, 'level3'])->name('komite.level3');
    Route::get('/komite/persetujuan3', [KomiteController::class, 'persetujuan3'])->name('komite.persetujuan3');
    Route::post('/komite/upload-excel', [KomiteController::class, 'uploadExcel'])->name('komite.uploadExcel');
    Route::post('/store-nak', [NotaController::class, 'storeformnak'])->name('komite.storeformnak');

    // Meeting routes
    //Route::get('komite/meeting', [MeetingController::class, 'indexbc'])->name('komite.meeting.index');
    Route::get('komite/meeting/create', [MeetingController::class, 'createbc'])->name('komite.meeting.create');
    Route::post('komite/meeting', [MeetingController::class, 'storebc'])->name('komite.meeting.store');
    Route::get('komite/meeting/{id}/edit', [MeetingController::class, 'editbc'])->name('komite.meeting.edit');
    Route::put('komite/meeting/{id}', [MeetingController::class, 'updatebc'])->name('komite.meeting.update');
    Route::delete('komite/meeting/{id}', [MeetingController::class, 'destroybc'])->name('komite.meeting.destroy');
    Route::get('komite/meeting/{id}', [MeetingController::class, 'showbc'])->name('komite.meeting.show');

    Route::get('/komite/meetings', [MeetingController::class, 'indexKomite'])->name('komite.meeting.index');

    Route::get('/komite/profile', [KomiteController::class, 'profile'])->name('komite.profile.profile');
    Route::get('/komite/editprofile', [KomiteController::class, 'editprofile'])->name('komite.profile.editprofile');
    Route::put('/komite/update-profile', [KomiteController::class, 'updateProfile'])->name('komite.updateProfile');




    Route::get('/approve/{id}', [OpenblokController::class, 'approve'])->name('approve');
    Route::post('openblock/{id}', [OpenblokController::class, 'storeapprove'])->name('openblock.approval');
});
// Openblok routes