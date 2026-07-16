<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class AdminPembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with(['reservasi.kamar', 'reservasi.user'])->latest()->get();

        return view('admin.pembayaran.index', compact('pembayarans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diterima,ditolak',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->status = $request->status;
        $pembayaran->save();

        return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}
