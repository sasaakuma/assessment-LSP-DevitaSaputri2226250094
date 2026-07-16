<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Providers\RouteServiceProvider;

class CustomAuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

   if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
        $user = Auth::user();

        if ($user->status === 'ditolak') {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Pendaftaran akun Anda ditolak oleh admin. Silakan hubungi pihak hotel untuk informasi lebih lanjut.',
            ]);
        }

        if (!$user->is_verified || $user->status !== 'diterima') {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Akun Anda belum diverifikasi oleh admin.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
