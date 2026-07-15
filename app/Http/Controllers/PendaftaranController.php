<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function create()
    {
         $existing = Pendaftaran::where('user_id', Auth::id())->first();

        if ($existing) {
            return redirect()->route('status.pendaftaran')->with('error', 'Anda sudah melakukan pendaftaran.');
        }

        return view('pendaftaran');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pendaftaran,email',
            'no_hp' => 'required|digits_between:10,15',
            'alamat' => 'required|string|max:255',
            'nik' => 'required|digits_between:10,20|unique:pendaftaran,nik',
        ]);

        Pendaftaran::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'nik' => $request->nik,
            'role' => 'guest',
            'user_id' => Auth::id(), 
        ]);

        return redirect()->route('dashboard')->with('success', 'Pendaftaran berhasil!');
    }
}
