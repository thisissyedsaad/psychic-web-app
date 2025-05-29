<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Site;
use App\Models\Sitemap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteMapController extends Controller
{
    public function settings(Request $request)
    {
        $sitemap = Sitemap::first();
        $site    = Site::first();

        return view('admin.sitemap.settings', compact('sitemap', 'site'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            // 'home_frequency' => 'required|string',
            // 'home_priority' => 'required|numeric|between:0,1',
            // 'static_frequency' => 'required|string',
            // 'static_priority' => 'required|numeric|between:0,1',
            'engines' => 'nullable|array',
            'engines.*' => 'string',
        ]);
        $data['engines'] = $request->input('engines', []);
        $sitemap = Sitemap::first();        
        if ($sitemap) {
            $sitemap->update($data);
        } else {
            $sitemap = Sitemap::create($data);
        }
        return redirect()->back()->with('success', 'Sitemap settings updated successfully.');
    }

    public function generate(Request $request)
    {
        $data = $request->validate([
            'home_frequency' => 'required|string',
            'home_priority' => 'required|numeric|between:0,1',
            'static_frequency' => 'required|string',
            'static_priority' => 'required|numeric|between:0,1',
            'engines' => 'nullable|array',
            'engines.*' => 'string',
        ]);
        // $data['engines'] = $request->input('engines', []);
        $sitemap = Sitemap::first();
        if ($sitemap) {
            $sitemap->update($data);
        } else {
            $sitemap = Sitemap::create($data);
        }

        $site = \App\Models\Site::first();
        $domain = $site && $site->domain ? rtrim($site->domain, '/') : config('app.url');

        $xml = view('admin.sitemap.xml', [
            'domain' => $domain,
            'settings' => $sitemap
        ])->render();

        file_put_contents(public_path('sitemap.xml'), $xml);

        return redirect()->back()->with('success', 'Sitemap generated successfully!');
    }
} 