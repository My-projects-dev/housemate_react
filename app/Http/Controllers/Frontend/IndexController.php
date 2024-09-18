<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Inertia\Inertia;


class IndexController extends Controller
{
    public function index($language='en')
    {
        $announcements = Announcement::where('language', $language)->get();
        return Inertia::render('Home', [
            'announcements' => $announcements,
        ]);
    }
}
