<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Periksa apakah pengguna terautentikasi
        if (!Auth::check()) {
            return redirect('/login'); // Ganti dengan rute login Anda
        }

        // Periksa apakah pengguna memiliki peran yang sesuai
        if (Auth::user()->role !== $role) {
            return redirect('/'); // Ganti dengan rute yang sesuai jika akses ditolak
        }

        return $next($request);
    }
}
