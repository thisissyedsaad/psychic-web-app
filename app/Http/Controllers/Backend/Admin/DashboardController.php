<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display the dashboard
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.dashboard');
    }
}
