<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoSetting;

class SeoSettingController extends Controller
{
    public function settings()
    {
        $pages = [
            'home' => 'Home',
            'psychic_services' => 'Psychic Services',
        ];

        $seoSettings = SeoSetting::whereIn('page', array_keys($pages))->get()->keyBy('page');

        return view('admin.seo-settings', [
            'pages' => $pages,
            'seoSettings' => $seoSettings,
        ]);
    }

    public function store(Request $request)
    {
        $pages = $request->input('pages', []);
        foreach ($pages as $page => $fields) {
            SeoSetting::updateOrCreate(
                ['page' => $page],
                [
                    'meta_title' => $fields['meta_title'] ?? null,
                    'meta_description' => $fields['meta_description'] ?? null,
                    'meta_keywords' => $fields['meta_keywords'] ?? null,
                ]
            );
        }
        return redirect()->route('seo.settings')->with('success', 'SEO settings updated successfully.');
    }
} 