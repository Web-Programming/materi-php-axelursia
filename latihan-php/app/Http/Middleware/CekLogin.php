<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // tambahkan ini

class CekLogin
{
    public function handle(Request $request, Closure $next, $level)
    {
        if (!Auth::check()) {
            return redirect('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (strtolower(Auth::user()->level) !== strtolower($level)) {
            abort(403, 'Akses ditolak. Kamu tidak punya izin ke halaman ini.');
        }

        return $next($request);
    }
}
