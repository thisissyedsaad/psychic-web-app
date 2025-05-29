<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PsychicService;
use App\Models\SeoSetting;

class PsychicServiceController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function psychicServices()
    {
        $seo_psychic_services = SeoSetting::where('page', 'psychic_services')->first();
        return view('frontend.psychic-services.index', compact('seo_psychic_services'));
    }

    /**
     * Show the about us page.
     *
     * @return \Illuminate\View\View
     */
    public function psychicServiceDetail($slug)
    {
        $seo_psychic_services = PsychicService::where('slug', $slug)->first();
        return view('frontend.psychic-services.show', compact('seo_psychic_services'));
    }
}
