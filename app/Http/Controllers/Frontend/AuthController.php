<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;

class AuthController extends Controller
{
    /**
     * Show the login page
     */
    public function login()
    {
        return view('frontend.auth.login');
    }

    /**
     * Show the registration page
     */
    public function register()
    {
        return view('frontend.auth.register');
    }

    /**
     * Show the join us page
     */
    public function joinUs()
    {
        $page = Page::where('slug', 'join-us')->first();
        return view('frontend.auth.join-us', compact('page'));
    }
} 