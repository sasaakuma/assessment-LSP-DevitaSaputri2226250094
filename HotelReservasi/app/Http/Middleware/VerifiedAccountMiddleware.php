<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifiedAccountMiddleware
{
    /**
     * Memastikan akun tamu sudah diverifikasi (status = 'diterima')
     * sebelum boleh mengakses fitur pemesanan kamar & pembayaran.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Admin selalu boleh lewat (jaga-jaga kalau middleware ini kepakai di rute admin)
        if ($user->role === 'admin') {
            return $next($request);
        }

        if ($user->status !== 'diterima') {
            return redirect()->route('dashboard')->with('error', 'Akun Anda belum diverifikasi oleh admin. Anda belum bisa mengakses fitur ini.');
        }

        return $next($request);
    }
}