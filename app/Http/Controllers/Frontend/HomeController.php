<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\SeoSetting;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $site = Site::first();
        $seo_home = SeoSetting::where('page', 'home')->first();
        return view('frontend.home', compact('site', 'seo_home'));
    }

    /**
     * Show the about us page.
     *
     * @return \Illuminate\View\View
     */
    public function aboutUs()
    {
        $page = Page::where('slug', 'about-us')->first();
        return view('frontend.about-us', compact('page'));
    }

    /**
     * Show the terms and conditions page.
     *
     * @return \Illuminate\View\View
     */
    public function termsAndConditions()
    {
        $page = Page::where('slug', 'terms-and-conditions')->first();
        return view('frontend.terms-and-conditions', compact('page'));
    }

    /**
     * Show the privacy and policy page.
     *
     * @return \Illuminate\View\View
     */
    public function privacyPolicy()
    {
        $page = Page::where('slug', 'privacy-policy')->first();
        return view('frontend.privacy-policy', compact('page'));
    }

    /**
     * Show the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        $page = Page::where('slug', 'contact-us')->first();
        return view('frontend.contact-us', compact('page'));
    }

    /**
     * Show the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function howItWorks()
    {
        return view('frontend.how-it-works');
    }

    /**
     * Show the pricing page.
     *
     * @return \Illuminate\View\View
     */
    public function pricing()
    {
        return view('frontend.pricing');
    }

    /**
     * Show the testimonial page.
     *
     * @return \Illuminate\View\View
     */
    public function testimonial()
    {
        return view('frontend.testimonial');
    }


    /**
     * Display the psychics page.
     *
     * @return \Illuminate\View\View
     */
    public function psychics()
    {
        return view('frontend.psychics');
    }

    /**
     * Display the detail page for a single psychic.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function psychicDetail($id)
    {
        $psychic = \App\Models\Psychic::with([
            'services',
            'appLinks.appLink',
            'paymentLinks.paymentLink',
            'socialLinks.socialMediaLink',
            'address.country'
        ])->findOrFail($id);
        return view('frontend.psychic-detail', compact('psychic'));
    }


}
