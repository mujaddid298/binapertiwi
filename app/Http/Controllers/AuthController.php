<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{ 

    public function login()
    {
        return view('auth.login');
    }

    public function RoleLogin(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba login   
        if (Auth::attempt($request->only('email', 'password'))) {
            // Cek peran pengguna
            $user = Auth::user();
            Log::info('Pengguna berhasil login', ['user' => $user]);

            if ($user->role === 'admin') {
                // Jika admin, redirect ke halaman admin
                return redirect()->intended('admin/home');
            } elseif ($user->role === 'bc') {
                // Jika editor, redirect ke halaman editor
                return redirect()->intended('/editor');
            } elseif ($user->role === 'komite') {
                // Jika viewer, redirect ke halaman viewer
                return redirect()->intended('/home');
            } else {
                Log::warning('Peran pengguna tidak dikenali', ['role' => $user->role]);
            }
        } else {
            Log::error('Autentikasi gagal', ['email' => $request->email]);
        }

        // Jika gagal, kembali ke halaman login dengan pesan kesalahan
        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ]);
    }

    public function logout(Request $request) {
        // Menghapus sesi pengguna
        Auth::logout();

        // Mengalihkan pengguna ke halaman login dengan pesan sukses
        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }
}
