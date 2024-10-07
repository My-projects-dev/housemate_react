<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $userId = Auth::id();

        $announcements = Announcement::where('user_id', $userId)->latest()->get();

        return Inertia::render('Dashboard', [
            'announcements' => $announcements,
        ]);
    }

    public function edit($language, $id)
    {
        $userId = Auth::id();

        $announcement = Announcement::where(['user_id'=> $userId,'id'=> $id])->firstOrFail();

        return Inertia::render('AnnouncementEdit', [
            'announcement' => $announcement,
        ]);
    }
}
