<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @hasSection('title')
            @yield('title')
        @else
            Top Rated Psychics - Your Guide to Trusted Psychics, Real Reviews &amp; Accurate Readings
        @endif
    </title>
    <link rel="canonical" href="{{ url('/') }}" />
    <meta property="og:locale" content="en_US" />
    <meta name="title"
        content="@yield('meta_title', 'Top Rated Psychics - Your Guide to Trusted Psychics, Real Reviews &amp; Accurate Readings')" />
    <meta name="description"
        content="@yield('meta_description', 'Discover honest reviews, top-rated psychic apps, and trusted advisors on TopRatedPsychics.org. Find your perfect psychic today!')" />
    @yield('meta_tags')
    {{--
    <meta property="og:site_name"
        content="Top Rated Psychics - Your Guide to Trusted Psychics, Real Reviews &amp; Accurate Readings" /> --}}
    <meta property="og:title"
        content="@yield('meta_title', 'Top Rated Psychics - Your Guide to Trusted Psychics, Real Reviews &amp; Accurate Readings')" />
    <meta property="og:description"
        content="@yield('meta_description', 'Discover honest reviews, top-rated psychic apps, and trusted advisors on TopRatedPsychics.org. Find your perfect psychic today!')" />
    <meta property="og:url" content="{{ url('/') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/images/home/Top-Rated-Psychics-150x150.jpg') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('frontend/images/home/Top-Rated-Psychics-300x300.jpg') }}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{ asset('frontend/images/home/Top-Rated-Psychics-300x300.jpg') }}" />
    <meta name="msapplication-TileImage" content="{{ asset('frontend/images/home/Top-Rated-Psychics-300x300.jpg') }}" />
    <style>
        body {
            background: #f7f8f9;
            font-family: 'Montserrat', sans-serif;
        }

        .invalid-feedback {
            font-size: 0.857rem;
            color: #EA5455;
        }

        .custom-red {
            color: #EA5455 !important;
        }

        .custom-bg-red {
            background: #fff1f0 !important;
        }

        .custom-border-red {
            border-color: #EA5455 !important;
        }
    </style>
    </style>
    @stack('head')
</head>

<body>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md">
            @yield('content')
        </div>
    </div>
    @stack('scripts')
</body>

</html>