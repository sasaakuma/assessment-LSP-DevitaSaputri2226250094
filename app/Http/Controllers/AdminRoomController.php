<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::orderBy('created_at', 'desc')->get();
        return view('admin.kamar.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.kamar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kamar' => 'required|string|max:255',
            'tipe' => 'required|string|max:100',
            'harga_per_malam' => 'required|integer|min:0',
            'kapasitas' => 'required|integer|min:1',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('rooms', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        Room::create($validated);

        return redirect()->route('admin.kamar.index')->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function edit(Room $kamar)
    {
        return view('admin.kamar.edit', ['room' => $kamar]);
    }

    public function update(Request $request, Room $kamar)
    {
        $validated = $request->validate([
            'nama_kamar' => 'required|string|max:255',
            'tipe' => 'required|string|max:100',
            'harga_per_malam' => 'required|integer|min:0',
            'kapasitas' => 'required|integer|min:1',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            if ($kamar->gambar) {
                Storage::disk('public')->delete($kamar->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('rooms', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        $kamar->update($validated);

        return redirect()->route('admin.kamar.index')->with('success', 'Kamar berhasil diperbarui.');
    }

    public function destroy(Room $kamar)
    {
        if ($kamar->gambar) {
            Storage::disk('public')->delete($kamar->gambar);
        }
        $kamar->delete();

        return redirect()->route('admin.kamar.index')->with('success', 'Kamar berhasil dihapus.');
    }
}
