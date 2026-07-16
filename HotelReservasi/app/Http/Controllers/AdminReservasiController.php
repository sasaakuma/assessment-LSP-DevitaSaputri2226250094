<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class AdminReservasiController extends Controller
{
    public function index()
    {
        $reservasis = Reservasi::with(['kamar', 'user'])->latest()->get();

        return view('admin.reservasi.index', compact('reservasis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diterima,ditolak',
        ]);

        $reservasi = Reservasi::findOrFail($id);
        $reservasi->status = $request->status;
        $reservasi->save();

        return redirect()->back()->with('success', 'Status pemesanan kamar berhasil diperbarui.');
    }
}
