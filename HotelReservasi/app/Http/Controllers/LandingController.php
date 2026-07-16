<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Kamar;

class LandingController extends Controller
{
    public function index()
    {
        $announcements = Announcement::public()
            ->orderBy('priority', 'desc')
            ->orderBy('published_at', 'desc')
            ->get();

        $kamars = Kamar::where('is_tersedia', true)->get();

        return view('landing', compact('announcements', 'kamars'));
    }
}
