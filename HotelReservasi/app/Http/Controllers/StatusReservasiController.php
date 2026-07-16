<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Support\Facades\Auth;

class StatusReservasiController extends Controller
{
    public function index()
    {
        $reservasis = Reservasi::with(['kamar', 'pembayaran'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('reservasi.status', compact('reservasis'));
    }
}
