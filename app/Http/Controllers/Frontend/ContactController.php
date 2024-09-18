<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ContactFormRequest;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        return Inertia::render('Contact');
    }

    public function send(ContactFormRequest $request)
    {
        try {
            $admin = Admin::find(1);
            if ($admin) {
                $admin->notify(new ContactNotification($admin, $request->validated()));

                return response()->json(['message' => 'Message sent successfully!'], 200);
            }

            return response()->json(['message' => 'Admin not found!'], 404);
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            return response()->json(['message' => 'Failed to send the message. Please try again.'], 500);
        }
    }
}
