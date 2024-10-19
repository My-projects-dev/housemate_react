<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationCodeMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use function Webmozart\Assert\Tests\StaticAnalysis\email;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
        ];

        $verificationCode = rand(100000, 999999);
        session(['verification_code' => $verificationCode, 'verification_code_expires_at' => now()->addSeconds(182)]);
        session(['data' => $data, 'data_expires_at' => now()->addSeconds(182)]);

        $locale = session('language', config('app.locale'));

        Mail::to($request->email)->send(new VerificationCodeMail($verificationCode, $locale));

        return redirect()->back();
    }

    public function verification(Request $request)
    {
        $request->validate([
            'verificationCode' => ['required', function ($attribute, $value, $fail) {
                if ($value != session('verification_code')) {
                    $fail(__('frontend.unconfirmed_check_message'));
                }
            }],
        ]);

        if (session('verification_code') == $request->verificationCode && now()->lt(session('verification_code_expires_at'))) {

            $user = User::create(session('data'));

            session()->forget(['verification_code', 'verification_code_expires_at']);
            session()->forget(['data', 'data_expires_at']);


            event(new Registered($user));
            Auth::login($user);
        }

        return redirect(route('home', absolute: false));
    }
}
