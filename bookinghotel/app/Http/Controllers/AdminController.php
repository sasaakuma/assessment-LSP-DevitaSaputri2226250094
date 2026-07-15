<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())
            {
                $usertype = Auth()->user()->usertype;
                // untuk mengecek apakah user yang login adalah admin atau user biasa
                if($usertype=='user')
                {
                    return view('dashboard');
                }
                else if($usertype=='admin')
                {
                    return view('admin.index');
                }
                // jika user yang login bukan admin atau user biasa maka akan dikembalikan ke halaman sebelumnya
                else
                {
                    return redirect()->back();
                }
            }
        return view('home');
    }
}
