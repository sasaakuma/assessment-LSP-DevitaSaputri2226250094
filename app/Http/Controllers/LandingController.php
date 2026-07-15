<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $announcements = Announcement::public()
            ->orderBy('priority', 'desc')
            ->orderBy('published_at', 'desc')
            ->get();

        return view('landing', compact('announcements'));
    }
}