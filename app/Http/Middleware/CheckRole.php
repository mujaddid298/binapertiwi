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
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        // Cek jika pengguna tidak memiliki role
        if (!$request->user() || !in_array($request->user()->role, $role)) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
