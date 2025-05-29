<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Site;

class UserRegisterController extends Controller
{
    // Step 1: Show email entry form
    public function showEmailForm()
    {
        $site = Site::first();
        return view('frontend.user.register.email', compact('site'));
    }

    // Step 1: Handle email submission and send Firebase verification
    public function sendVerification(Request $request)
    {
        $request->validate(['email' => 'required|email|unique:clients,email']);
        session(['registration_email' => $request->email]);
        return redirect()->route('user.register.verify')->with('email', $request->email);
    }

    // Step 2: Show verify instructions
    public function showVerify()
    {
        $site = Site::first();
        $email = session('registration_email');
        if (!$email) {
            return redirect()->route('user.register.email');
        }
        return view('frontend.user.register.verify', compact('email', 'site'));
    }

    // Step 2: Resend verification if needed
    public function resendVerification()
    {
        return back()->with('resent', true);
    }

    // Step 2: Show verification success
    public function showVerified()
    {
        if (!session('firebase_uid') || !session('registration_email')) {
            return redirect()->route('user.register.email');
        }
        $site = Site::first();

        return view('frontend.user.register.verified', compact('site'));
    }

    // Step 3: Handle Firebase verification callback
    public function handleFirebaseVerified(Request $request)
    {
        $request->validate([
            'firebase_uid' => 'required|string',
            'email' => 'required|email'
        ]);

        // Store Firebase UID in session
        session(['firebase_uid' => $request->firebase_uid]);

        return redirect()->route('user.register.complete');
    }

    // Step 4: Show complete registration form
    public function showCompleteForm()
    {
        if (!session('firebase_uid') || !session('registration_email')) {
            return redirect()->route('user.register.email');
        }

        $site = Site::first();
        return view('frontend.user.register.complete', compact('site'));
    }

    // Step 4: Handle registration completion
    public function completeRegistration(Request $request)
    {
        // Verify we have Firebase data
        $firebaseUid = session('firebase_uid');
        $email = session('registration_email');

        if (!$firebaseUid || !$email) {
            return redirect()->route('user.register.email')
                ->with('error', 'Email verification required');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',      // At least one lowercase letter
                'regex:/[A-Z]/',      // At least one uppercase letter
                'regex:/[0-9]/',      // At least one number
                'regex:/[@$!%*?&]/',  // At least one special character
            ],
            'type' => 'required|in:psychic,customer',
        ]);

        // Create the client
        $client = Client::create([
            'name' => $request->name,
            'email' => $email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
            'firebase_uid' => $firebaseUid,
            'email_verified_at' => now(), // Email is verified through Firebase
            'is_active' => true
        ]);

        // Clear registration session data
        session()->forget(['firebase_uid', 'registration_email']);

        // Log the user in
        auth()->guard('client')->login($client);

        return redirect()->route('user.login')->with('success', 'Registration completed successfully!');
    }
}