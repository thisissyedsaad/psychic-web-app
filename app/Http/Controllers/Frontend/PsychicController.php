<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Psychic;
use App\Models\PsychicService;
use App\Models\SeoSetting;

class PsychicController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function psychics()
    {
        $psyhicServices = PsychicService::get();
        $seo_psychic_services = SeoSetting::where('page', 'psychic_services')->first();
        return view('frontend.psychics.index', compact('psyhicServices', 'seo_psychic_services'));
    }

    /**
     * Show the about us page.
     *
     * @return \Illuminate\View\View
     */
    public function psychicDetail($slug)
    {
        $psychic = Psychic::where('slug', $slug)->first();
        return view('frontend.psychics.show', compact('psychic'));
    }
}
