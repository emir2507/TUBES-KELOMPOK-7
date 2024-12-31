<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {

        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Dapatkan pengguna yang sedang login
        $user = Auth::user();

        // Cek apakah role sesuai dengan parameter yang diberikan
        if ($user->role == $role) {
            return $next($request);
        }

        // Arahkan pengguna sesuai dengan role
        if ($user->role == 'admin') {
            return redirect('dashboard-admin');
        } elseif ($user->role == 'user') {
            return redirect('dashboard');
        }

        // Jika role tidak dikenali, arahkan ke halaman login atau error
        return redirect('/login')->with('error', 'Akses ditolak.');

        return $next($request);
    }
}
