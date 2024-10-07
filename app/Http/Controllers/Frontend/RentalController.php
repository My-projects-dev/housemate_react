<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RentalController extends Controller
{
    public function index($language = 'en')
    {
        $announcements = Announcement::where(['language'=> $language, 'type'=>'rent'])->active()->latest()->paginate(15);

        return Inertia::render('Home',[
            'announcements' => $announcements,
            'title' => __('frontend.rent'),
        ]);
    }
}
