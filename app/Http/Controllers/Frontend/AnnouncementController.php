<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AnnouncementRequest;
use App\Models\Announcement;
use App\Models\AnnouncementImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function store(AnnouncementRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $validated = $request->validated();
                $announcement = Announcement::create($validated);

                if ($request->hasFile('images')) {
                    $images = [];
                    foreach ($request->file('images') as $index => $file) {

                        $name = time() . '_' . uniqid() . '.' . rand(1, 999999) . '.' . $file->extension();
                        $file->move(public_path('uploads/announcements'), $name);

                        $images[] = [
                            'announcement_id' => $announcement->id,
                            'image' => $name,
                            'main' => $index === 0 ? 1 : '0',
                        ];
                    }

                    AnnouncementImage::insert($images);
                }
            });

            return redirect()->back()->with('success', 'Announcement created successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to create announcement: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to create announcement.');
        }
    }

    public function changeStatus($id)
    {
        $announcement = Announcement::findOrFail($id);

        $announcement->status = $announcement->status === '1' ? '0' : '1';
        $announcement->save();

        return response()->json(['message' => 'Status changed successfully']);
    }

    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return response()->json(['message' => 'Announcement deleted successfully']);
    }

}
