<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Menampilkan form konfirmasi pembayaran untuk pemesanan yang sudah diterima.
     */
    public function create(Booking $booking)
    {
        abort_unless($booking->user_id === Auth::id(), 403);

        if ($booking->status !== 'diterima') {
            return redirect()->route('pemesanan.index')->with('error', 'Pemesanan belum diterima oleh admin, konfirmasi pembayaran belum dapat dilakukan.');
        }

        if ($booking->payment) {
            return redirect()->route('pemesanan.index')->with('error', 'Anda sudah mengirimkan konfirmasi pembayaran untuk pemesanan ini.');
        }

        return view('pembayaran.create', compact('booking'));
    }

    public function store(Request $request, Booking $booking)
    {
        abort_unless($booking->user_id === Auth::id(), 403);

        if ($booking->status !== 'diterima' || $booking->payment) {
            return redirect()->route('pemesanan.index')->with('error', 'Konfirmasi pembayaran tidak dapat dilakukan.');
        }

        $validated = $request->validate([
            'metode_pembayaran' => 'required|string|max:100',
            'jumlah_bayar' => 'required|integer|min:0',
            'bukti_pembayaran' => 'required|image|max:2048',
        ]);

        $validated['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('payments', 'public');
        $validated['booking_id'] = $booking->id;
        $validated['status'] = 'pending';

        Payment::create($validated);

        return redirect()->route('pemesanan.index')->with('success', 'Konfirmasi pembayaran berhasil dikirim. Menunggu verifikasi admin.');
    }
}
