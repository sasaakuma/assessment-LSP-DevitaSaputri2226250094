<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminUserController extends Controller
{
    public function index()
    {
        $pendingUsers = User::where('status', 'pending')->latest()->get();
        $rejectedUsers = User::where('status', 'ditolak')->latest()->get();

        return view('admin.pending-users', compact('pendingUsers', 'rejectedUsers'));
    }

    public function verify($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'diterima';
        $user->is_verified = true;
        if ($user->role === 'guest') {
            $user->role = 'user';
        }
        $user->save();

        return redirect()->back()->with('success', "Pendaftaran akun {$user->name} berhasil diverifikasi!");
    }

    public function reject($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'ditolak';
        $user->is_verified = false;
        $user->save();

        return redirect()->back()->with('success', "Pendaftaran akun {$user->name} telah ditolak.");
    }

    public function reconsider($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'pending';
        $user->save();

        return redirect()->back()->with('success', "Akun {$user->name} dikembalikan ke daftar tinjauan.");
    }
}