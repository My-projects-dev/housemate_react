<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users_count = Announcement::active()->count();
        $active_announcement_count = Announcement::active()->count();
        $passive_announcement_count = Announcement::passive()->count();

        $page = 'Dashboard';
        return view('backend.pages.dashboard.dashboard', compact(
            'page',
            'users_count',
            'active_announcement_count',
            'passive_announcement_count',
        ));
    }
}
