<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    public function create()
    {
        $kamars = Kamar::where('is_tersedia', true)->get();

        return view('reservasi.create', compact('kamars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kamar_id' => 'required|exists:kamars,id',
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|digits_between:10,15',
            'tanggal_checkin' => 'required|date|after_or_equal:today',
            'tanggal_checkout' => 'required|date|after:tanggal_checkin',
            'jumlah_tamu' => 'required|integer|min:1|max:10',
        ]);

        Reservasi::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'kamar_id' => $request->kamar_id,
            'tanggal_checkin' => $request->tanggal_checkin,
            'tanggal_checkout' => $request->tanggal_checkout,
            'jumlah_tamu' => $request->jumlah_tamu,
            'status' => 'pending',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('status.reservasi')->with('success', 'Pemesanan kamar berhasil dibuat! Silakan tunggu verifikasi admin.');
    }
}
