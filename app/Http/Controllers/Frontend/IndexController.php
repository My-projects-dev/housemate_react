<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Inertia\Inertia;


class IndexController extends Controller
{
    public function index($language = 'en')
    {
        $announcements = Announcement::where('language', $language)->active()->latest()->paginate(15);
        return Inertia::render('Home', [
            'announcements' => $announcements,
            'title' => __('frontend.home'),
        ]);
    }


    public function search(Request $request, $language)
    {
        $name = strip_tags($request->search);

        if (empty(trim($name))) {
            return redirect()->route('home');
        }

        $tokens = explode(' ', $name);

        $columns = ['type', 'title', 'address', 'home_type', 'repair', 'room_count', 'price', 'duration', 'age_min', 'age_max', 'comment'];

        $announcements = Announcement::active()->latest()
            ->where('language', $language)
            ->where(function($query) use ($tokens, $columns) {
                foreach ($columns as $column) {
                    foreach ($tokens as $token) {
                        $query->orWhereRaw("SOUNDEX($column) = SOUNDEX(?)", [$token])
                            ->orWhere($column, 'LIKE', '%' . $token . '%');
                    }
                }
            })
            ->paginate(15);

        $announcement_message = (count($announcements) > 0) ? '' : 'not_found';

        return Inertia::render('Home', [
            'announcements' => $announcements,
            'announcement_message' => $announcement_message
        ]);
    }


    public function show($language, $slug)
    {
        $announcement = Announcement::where('slug', $slug)->active()->first();

        if ($announcement == null) {
            return redirect()->route('home');
        }

        $viewAnnouncementKey = 'announcement_viewed_' . $announcement->id;

        if (!session()->has($viewAnnouncementKey)) {

            $announcement->increment('views');
            session()->put($viewAnnouncementKey, true);
        }

        return Inertia::render('AnnouncementDetail', [
            'announcement' => $announcement,
        ]);
    }
}
