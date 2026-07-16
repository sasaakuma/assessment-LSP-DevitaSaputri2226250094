<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function create(Reservasi $reservasi)
    {
        if ($reservasi->user_id !== Auth::id()) {
            abort(403);
        }

        if ($reservasi->status !== 'diterima') {
            return redirect()->route('status.reservasi')
                ->with('error', 'Pemesanan harus diverifikasi admin terlebih dahulu sebelum melakukan pembayaran.');
        }

        return view('pembayaran.create', compact('reservasi'));
    }

    public function store(Request $request, Reservasi $reservasi)
    {
        if ($reservasi->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'bukti_pembayaran' => 'required|image|max:2048',
            'jumlah_bayar' => 'required|numeric|min:0',
            'metode_pembayaran' => 'required|string|max:255',
        ]);

        $path = $request->file('bukti_pembayaran')->store('bukti-pembayaran', 'public');

        Pembayaran::updateOrCreate(
            ['reservasi_id' => $reservasi->id],
            [
                'bukti_pembayaran' => $path,
                'jumlah_bayar' => $request->jumlah_bayar,
                'metode_pembayaran' => $request->metode_pembayaran,
                'status' => 'pending',
            ]
        );

        return redirect()->route('status.reservasi')->with('success', 'Konfirmasi pembayaran berhasil dikirim! Silakan tunggu verifikasi admin.');
    }
}
