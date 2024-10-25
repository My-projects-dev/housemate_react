<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AnnouncementStoreRequest;
use App\Http\Requests\Frontend\AnnouncementUpdateRequest;
use App\Models\Announcement;
use App\Models\AnnouncementImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AnnouncementController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!auth()->user()->hasVerifiedEmail()) {
            return redirect()->back()->with('alert', __('frontend.messages.please_verify'));
        }

        $userId = Auth::id();

        $announcements = Announcement::where('user_id', $userId)->latest()->get();

        return Inertia::render('MyAnnouncements', [
            'announcements' => $announcements,
        ]);
    }

    public function store(AnnouncementStoreRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $validated = $request->validated();
                $announcement = Announcement::create($validated);

                $this->insertImage($request, 'images', $announcement->id,'uploads/announcements');
            });

            return redirect()->back()->with('success', 'Announcement created successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to create announcement: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to create announcement.');
        }
    }


    public function edit($language, $id)
    {
        if (!auth()->user()->hasVerifiedEmail()) {
            return redirect()->back()->with('alert', __('frontend.messages.please_verify'));
        }

        $userId = Auth::id();

        $announcement = Announcement::where(['user_id'=> $userId,'id'=> $id])->firstOrFail();

        return Inertia::render('AnnouncementEdit', [
            'announcement' => $announcement,
        ]);
    }

    public function update(AnnouncementUpdateRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $validated = $request->validated();
                $userId = Auth::id();
                $announcement = Announcement::where(['user_id'=> $userId,'id'=> $id])->firstOrFail();
                $announcement->update($validated);

                $this->insertImage($request, 'images', $id, 'uploads/announcements');
            });

            return redirect()->back()->with('success', 'Announcement updated successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to update announcement: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to update announcement.');
        }
    }

    private function insertImage($request, $file, $id, $fileName)
    {
        if ($request->hasFile($file)) {
            $images = [];
            foreach ($request->file($file) as $index => $file) {

                $name = time() . '_' . uniqid() . '.' . rand(1, 999999) . '.' . $file->extension();
                $file->move(public_path($fileName), $name);

                $images[] = [
                    'announcement_id' => $id,
                    'image' => $name,
                    'main' => $index === 0 ? 1 : '0',
                ];
            }

            AnnouncementImage::insert($images);
        }
    }

    public function destroy($id)
    {
        $userId = Auth::id();

        $announcement = Announcement::where(['user_id'=> $userId,'id'=> $id])->firstOrFail();
        $announcement->delete();

        return response()->json(['message' => 'Announcement deleted successfully']);
    }

    public function deleteImage($id)
    {
        try {
            $announcement = AnnouncementImage::findOrFail($id);
            $announcement->delete();
            return response()->json(['message' => 'Image deleted successfully']);
        } catch (\Exception $e) {
            Log::error('Error deleting image: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to delete image'], 500);
        }
    }

    public function changeStatus($id)
    {
        $userId = Auth::id();
        $announcement = Announcement::where(['user_id'=> $userId,'id'=> $id])->firstOrFail();

        $announcement->status = $announcement->status === '1' ? '0' : '1';
        $announcement->save();

        return response()->json(['message' => 'Status changed successfully']);
    }
}
