<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function articles()
    {
        return view('frontend.articles.index');
    }

    /**
     * Show the about us page.
     *
     * @return \Illuminate\View\View
     */
    public function articleDetail()
    {
        return view('frontend.articles.show');

    }
}
