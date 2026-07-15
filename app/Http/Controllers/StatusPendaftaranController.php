<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;

class StatusPendaftaranController extends Controller
{
   public function index()
    {
    $pendaftarans = Pendaftaran::where('user_id', Auth::id())->first();
        return view('pendaftaran.index', compact('pendaftarans'));
    }
}
