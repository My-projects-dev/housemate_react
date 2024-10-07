<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HousemateController extends Controller
{
    public function index($language = 'en')
    {
        $announcements = Announcement::where(['language'=> $language, 'type'=>'roommate'])->active()->latest()->paginate(15);

        return Inertia::render('Home',[
            'announcements' => $announcements,
            'title' => __('frontend.housemate'),
        ]);
    }
}
