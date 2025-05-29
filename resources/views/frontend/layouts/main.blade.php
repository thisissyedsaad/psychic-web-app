<!DOCTYPE html>
<html dir="ltr" lang="en-US" prefix="og: https://ogp.me/ns#">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>
        @hasSection('title')
            @yield('title')
        @else
            Top Rated Psychics - Your Guide to Trusted Psychics, Real Reviews &amp; Accurate Readings
        @endif
    </title>
    <link rel="canonical" href="{{ url('/') }}" />
    <meta property="og:locale" content="en_US" />
    <meta name="title" content="@yield('meta_title', 'Top Rated Psychics - Your Guide to Trusted Psychics, Real Reviews &amp; Accurate Readings')" />
    <meta name="description" content="@yield('meta_description', 'Discover honest reviews, top-rated psychic apps, and trusted advisors on TopRatedPsychics.org. Find your perfect psychic today!')" />
    @yield('meta_tags')
    {{-- <meta property="og:site_name" content="Top Rated Psychics - Your Guide to Trusted Psychics, Real Reviews &amp; Accurate Readings" /> --}}
    <meta property="og:title" content="@yield('meta_title', 'Top Rated Psychics - Your Guide to Trusted Psychics, Real Reviews &amp; Accurate Readings')" />
    <meta property="og:description" content="@yield('meta_description', 'Discover honest reviews, top-rated psychic apps, and trusted advisors on TopRatedPsychics.org. Find your perfect psychic today!')" />
    <meta property="og:url" content="{{ url('/') }}" />
    {{-- <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="@yield('twitter_title', 'Top Rated Psychics - Your Guide to Trusted Psychics, Real Reviews &amp; Accurate Readings')" />
    <meta name="twitter:description" content="@yield('twitter_description', 'Discover honest reviews, top-rated psychic apps, and trusted advisors on TopRatedPsychics.org. Find your perfect psychic today!')" /> --}}

    <!-- RSS Feeds -->
    <link rel="alternate" type="application/rss+xml" title="Top Rated Psychics &raquo; Feed" href="#" />
    <link rel="alternate" type="application/rss+xml" title="Top Rated Psychics &raquo; Comments Feed" href="#" />

    <!-- Styles -->
    <link rel='stylesheet' href='{{ asset('frontend/css/home/navigation.css') }}' media='all' />
    <link rel='stylesheet' href='{{ asset('frontend/css/home/twentyfive.css') }}' media='all' />
    <link rel="stylesheet" href="{{ asset('frontend/css/home/home.css') }}" type="text/css" media="all" />

    <!-- Additional Styles -->
    @yield('styles')

    <!-- Scripts  -->
    <script type="module" src="{{ asset('frontend/js/home/view.min.js') }}"
        id="@wordpress/block-library/navigation/view-js-module"></script>
    <link rel="modulepreload" href="{{ asset('frontend/js/home/index.min.js') }}"
        id="@wordpress/interactivity-js-modulepreload" />

    <!-- Additional Head Scripts -->
    @yield('head_scripts')

    <!-- Fonts -->
    <style class="wp-fonts-local">
        @font-face {
            font-family: Manrope;
            font-style: normal;
            font-weight: 200 800;
            font-display: fallback;
            src: url("{{ asset('frontend/fonts/manrope/Manrope-VariableFont_wght.woff2') }}") format("woff2");
        }

        @font-face {
            font-family: "Fira Code";
            font-style: normal;
            font-weight: 300 700;
            font-display: fallback;
            src: url("{{ asset('frontend/fonts/fira-code/FiraCode-VariableFont_wght.woff2') }}") format("woff2");
        }
    </style>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/images/home/Top-Rated-Psychics-150x150.jpg') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('frontend/images/home/Top-Rated-Psychics-300x300.jpg') }}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{ asset('frontend/images/home/Top-Rated-Psychics-300x300.jpg') }}" />
    <meta name="msapplication-TileImage" content="{{ asset('frontend/images/home/Top-Rated-Psychics-300x300.jpg') }}" />

    @stack('styles')
</head>

<body class="home blog wp-custom-logo wp-embed-responsive wp-theme-twentytwentyfive">
    <div class="wp-site-blocks">
        @include('frontend.layouts.partials.header')

        @yield('content')

        @include('frontend.layouts.partials.footer')

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        @stack('scripts')
        @yield('scripts')
    </div>
</body>

</html>