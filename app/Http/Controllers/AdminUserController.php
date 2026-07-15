<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminUserController extends Controller
{
    public function index()
    {
        $pendingUsers = User::where('is_verified', false)->get();
        return view('admin.pending-users', compact('pendingUsers'));
    }

    public function verify($id)
    {
        $user = User::findOrFail($id);
        $user->is_verified = true;
        if ($user->role === 'guest') {
            $user->role = 'user';
        }
        $user->save();

        return redirect()->back()->with('success', 'Berhasil menampilkan toast!');

        // return redirect()->back()->with('success', 'User verified!');
    }
}
