<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Izinkan akses ke halaman login tanpa login atau peran tertentu
        if (!$request->user() && $request->route()->named('login')) {
            return $next($request);
        }

        // Izinkan akses ke halaman landing tanpa login
        if (!$request->user() && $request->route()->named('landing')) {
            return $next($request);
        }

        // Cek jika pengguna login dan memiliki peran yang sesuai
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Jika tidak, redirect ke halaman utama
        return redirect('/');
    }
}