<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function home()
    {
        return view('pages.admin.home');
    }
    public function daftaruser(){
        $users = User::all(); // Mengambil semua data pengguna
        return view('pages.admin.daftaruser', compact('users')); // Mengirim data ke view
    }
}
