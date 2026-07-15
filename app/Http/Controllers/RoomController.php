<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Menampilkan daftar kamar yang tersedia untuk tamu.
     */
    public function index()
    {
        $rooms = Room::active()->orderBy('harga_per_malam')->get();
        return view('kamar.index', compact('rooms'));
    }

    /**
     * Menampilkan detail satu kamar.
     */
    public function show(Room $room)
    {
        return view('kamar.show', compact('room'));
    }
}
