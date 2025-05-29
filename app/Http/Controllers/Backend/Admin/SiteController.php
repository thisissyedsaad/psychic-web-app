<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function settings(Request $request)
    {
        $site = Site::first();
        return view('admin.sites.settings', compact('site'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,svg|max:2048',
            'maintenance_mode' => 'boolean',
            'maintenance_message' => 'nullable|string',
            'registration_disabled' => 'boolean',
            'registration_message' => 'nullable|string',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $site = Site::first();
        if ($site) {
            $site->update($data);
        } else {
            $site = Site::create($data);
        }
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
