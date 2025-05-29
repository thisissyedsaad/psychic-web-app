<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserLoginController extends Controller
{
    public function showLoginForm()
    {
        $site = Site::first();
        return view('frontend.user.login', compact('site'));
    }

    public function submitLoginForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (
            Auth::guard('client')->attempt(
                $request->only('email', 'password'),
                $request->filled('remember')
            )
        ) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        throw ValidationException::withMessages([
            'email' => [__('auth.failed')],
        ]);
    }
}