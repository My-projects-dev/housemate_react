<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

//        if ($request->email == Auth::user()->email) {
//
//        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

//    public function verification(Request $request)
//    {
//        $request->validate([
//            'verificationCode' => ['required', function ($attribute, $value, $fail) {
//                if ($value != session('verification_code')) {
//                    $fail(__('frontend.unconfirmed_check_message'));
//                }
//            }],
//        ]);
//
//        if (session('verification_code') == $request->verificationCode && now()->lt(session('verification_code_expires_at'))) {
//
//            $user = User::create(session('data'));
//
//            session()->forget(['verification_code', 'verification_code_expires_at']);
//            session()->forget(['data', 'data_expires_at']);
//
//
//            event(new Registered($user));
//            Auth::login($user);
//        }
//
//        return redirect(route('home', absolute: false));
//    }
}
