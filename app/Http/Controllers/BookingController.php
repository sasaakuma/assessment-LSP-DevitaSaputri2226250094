<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Form pemesanan kamar. Bisa diakses dengan query ?room_id= untuk pra-isi kamar.
     */
    public function create(Request $request)
    {
        $rooms = Room::active()->orderBy('nama_kamar')->get();
        $selectedRoomId = $request->query('room_id');

        return view('pemesanan.create', compact('rooms', 'selectedRoomId'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'tanggal_checkin' => 'required|date|after_or_equal:today',
            'tanggal_checkout' => 'required|date|after:tanggal_checkin',
            'jumlah_tamu' => 'required|integer|min:1',
        ]);

        $room = Room::findOrFail($validated['room_id']);

        if ($validated['jumlah_tamu'] > $room->kapasitas) {
            return back()->withErrors(['jumlah_tamu' => 'Jumlah tamu melebihi kapasitas kamar (maks. ' . $room->kapasitas . ' orang).'])->withInput();
        }

        $checkin = Carbon::parse($validated['tanggal_checkin']);
        $checkout = Carbon::parse($validated['tanggal_checkout']);
        $jumlahMalam = $checkin->diffInDays($checkout);

        Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'tanggal_checkin' => $checkin,
            'tanggal_checkout' => $checkout,
            'jumlah_tamu' => $validated['jumlah_tamu'],
            'jumlah_malam' => $jumlahMalam,
            'total_harga' => $jumlahMalam * $room->harga_per_malam,
            'status' => 'pending',
        ]);

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan kamar berhasil dikirim. Menunggu verifikasi admin.');
    }

    /**
     * Menampilkan status pemesanan milik tamu yang sedang login.
     */
    public function index()
    {
        $bookings = Booking::with(['room', 'payment'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pemesanan.index', compact('bookings'));
    }
}
