@extends('frontend.layouts.main')

@push('scripts')
    <script src="{{ asset('frontend/js/home/home.js') }}"></script>
@endpush

@php use Illuminate\Support\Str; @endphp

@section('title', isset($seo_home) && $seo_home->meta_title ? $seo_home->meta_title : (isset($site) && $site->meta_title ? $site->meta_title : 'Top Rated Psychics - Your Guide to Trusted Psychics, Real Reviews & Accurate Readings'))
@section('meta_title', isset($seo_home) && $seo_home->meta_title ? $seo_home->meta_title : (isset($site) && $site->meta_title ? $site->meta_title : 'Top Rated Psychics - Your Guide to Trusted Psychics, Real Reviews & Accurate Readings'))
@section('meta_description', isset($seo_home) && $seo_home->meta_description ? $seo_home->meta_description : (isset($site) && $site->meta_description ? $site->meta_description : 'Discover honest reviews, top-rated psychic apps, and trusted advisors on TopRatedPsychics.org. Find your perfect psychic today!'))
@section('meta_tags')
    <meta name="keywords" content="{{ isset($seo_home) && $seo_home->meta_keywords ? $seo_home->meta_keywords : (isset($site) && $site->meta_keywords ? $site->meta_keywords : 'psychic, readings, top rated, trusted, reviews') }}" />
@endsection

@section('content')
    <main class="wp-block-group has-global-padding is-layout-constrained wp-block-group-is-layout-constrained"
        style="margin-top: 0; padding-top: 0; padding-bottom: 0">
        <div class="wp-block-group alignwide is-style-section-1 has-background is-layout-flow wp-block-group-is-layout-flow is-style-section-1--3"
            style="background-color: #dbd6f4; margin-top: 0;
                            margin-bottom: 0;
                            padding-top: var(--wp--preset--spacing--60);
                            padding-right: var(--wp--preset--spacing--50);
                            padding-bottom: var(--wp--preset--spacing--60);
                            padding-left: var(--wp--preset--spacing--50);">
            <div class="wp-block-group alignwide is-layout-flow wp-block-group-is-layout-flow">
                <div
                    class="wp-block-columns alignwide is-layout-flex wp-container-core-columns-is-layout-66fad18a wp-block-columns-is-layout-flex">
                    <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow"
                        style="flex-basis: 50%">
                        <div class="wp-block-group is-vertical is-content-justification-left is-nowrap is-layout-flex wp-container-core-group-is-layout-4d5056eb wp-block-group-is-layout-flex"
                            style="min-height: 100%">
                            <div
                                class="wp-block-group has-global-padding is-layout-constrained wp-container-core-group-is-layout-92b9201d wp-block-group-is-layout-constrained">
                                <h2 class="wp-block-heading has-xx-large-font-size">
                                    Your Trusted Guide to the Most Accurate and Authentic
                                    Psychics Online
                                </h2>

                                <p class="is-style-text-subtitle has-large-font-size is-style-text-subtitle--4">
                                    Are you seeking clarity in love, relationships, career, or
                                    life's big decisions? At
                                    <strong>TopRatedPsychics.org</strong>, we've done the hard
                                    work of finding the most gifted and genuine psychics, so
                                    you can get answers with confidence and peace of mind.
                                </p>
                            </div>

                            <div
                                class="wp-block-group is-vertical is-content-justification-stretch is-layout-flex wp-container-core-group-is-layout-353c4f5a wp-block-group-is-layout-flex">
                                <div style="margin-top: var(--wp--preset--spacing--20); margin-bottom: var(--wp--preset--spacing--20);"
                                    aria-hidden="true" class="wp-block-spacer"></div>

                                <div
                                    class="wp-block-columns is-layout-flex wp-container-core-columns-is-layout-ea69a204 wp-block-columns-is-layout-flex">
                                    <div
                                        class="wp-block-column is-vertically-aligned-stretch is-layout-flow wp-block-column-is-layout-flow">
                                        <div
                                            class="wp-block-buttons is-horizontal is-content-justification-space-between is-layout-flex wp-container-core-buttons-is-layout-bd1d5875 wp-block-buttons-is-layout-flex">
                                            <div
                                                class="wp-block-button has-custom-width wp-block-button__width-100 is-style-fill">
                                                <a class="wp-block-button__link wp-element-button"
                                                    href="{{ route('user.login') }}">Login
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div style="
                                                                        margin-top: var(--wp--preset--spacing--20);
                                                                        margin-bottom: var(--wp--preset--spacing--20);
                                                                      " aria-hidden="true" class="wp-block-spacer"></div>
                            </div>
                        </div>
                    </div>

                    <div class="wp-block-column is-vertically-aligned-top is-layout-flow wp-block-column-is-layout-flow"
                        style="flex-basis: 50%">
                        <figure class="wp-block-image size-full is-resized">
                            <img width="440" height="439" src="{{ asset('frontend/images/home/Trusted-Psychic-1.jpg') }}"
                                alt="" class="wp-image-90" style="width: 540px; height: auto" srcset="
                                                                      {{ asset('frontend/images/home/Trusted-Psychic-1.jpg') }}         440w,
                                                                      {{ asset('frontend/images/home/Trusted-Psychic-1-300x300.jpg') }} 300w,
                                                                      {{ asset('frontend/images/home/Trusted-Psychic-1-150x150.jpg') }} 150w
                                                                    " sizes="(max-width: 440px) 100vw, 440px" />
                        </figure>
                    </div>
                </div>
            </div>
        </div>

        <div style="height: var(--wp--preset--spacing--80)" aria-hidden="true" class="wp-block-spacer"></div>

        <div class="wp-block-group alignwide is-style-section-1 has-global-padding is-layout-constrained wp-container-core-group-is-layout-f611be13 wp-block-group-is-layout-constrained is-style-section-1--5"
            style="
                                                            padding-top: var(--wp--preset--spacing--50);
                                                            padding-right: var(--wp--preset--spacing--50);
                                                            padding-bottom: var(--wp--preset--spacing--50);
                                                            padding-left: var(--wp--preset--spacing--50);
                                                          ">
            <h2 class="wp-block-heading has-text-align-center">
                Browse Top Psychics
            </h2>

            <div style="height: 40px" aria-hidden="true" class="wp-block-spacer"></div>

            <div
                class="wp-block-columns alignwide is-layout-flex wp-container-core-columns-is-layout-28f84493 wp-block-columns-is-layout-flex">
                <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="
                                                                border-width: 1px;
                                                                padding-top: var(--wp--preset--spacing--40);
                                                                padding-right: var(--wp--preset--spacing--40);
                                                                padding-bottom: var(--wp--preset--spacing--40);
                                                                padding-left: var(--wp--preset--spacing--40);
                                                                flex-basis: 33%;
                                                              ">
                    <figure class="wp-block-image size-large">
                        <a href="{{ route('psychic.show', ['slug' => 155]) }}"><img width="1024" height="1024"
                                src="{{ asset('frontend/images/home/Amelia_green_1400x1400-1024x1024.jpg') }}" alt=""
                                class="wp-image-66" srcset="
                                                                      {{ asset('frontend/images/home/Amelia_green_1400x1400-1024x1024.jpg') }} 1024w,
                                                                      {{ asset('frontend/images/home/Amelia_green_1400x1400-300x300.jpg') }}    300w,
                                                                      {{ asset('frontend/images/home/Amelia_green_1400x1400-150x150.jpg') }}    150w,
                                                                      {{ asset('frontend/images/home/Amelia_green_1400x1400-768x768.jpg') }}    768w,
                                                                      {{ asset('frontend/images/home/Amelia_green_1400x1400.jpg') }}           1400w
                                                                    " sizes="(max-width: 1024px) 100vw, 1024px" /></a>
                    </figure>

                    <p class="has-text-align-center">
                        <strong><span style="text-decoration: underline"><a
                                    href="{{ route('psychic.show', ['slug' => 155]) }}">Amelia</a></span></strong>
                    </p>

                    <div
                        class="wp-block-group is-content-justification-center is-nowrap is-layout-flex wp-container-core-group-is-layout-23441af8 wp-block-group-is-layout-flex">
                        <figure class="wp-block-image size-full">
                            <img width="100" height="20" src="{{ asset('frontend/images/home/5starrating.png') }}" alt=""
                                class="wp-image-69" />
                        </figure>

                        <p class="has-small-font-size">(1,367 Reviews)</p>
                    </div>

                    <p>
                        Guiding Souls with Love, Light &amp; Truth for Over 20 Years.
                    </p>

                    <div
                        class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-core-buttons-is-layout-a89b3969 wp-block-buttons-is-layout-flex">
                        <div class="wp-block-button">
                            <a class="wp-block-button__link wp-element-button"
                                href="{{ route('psychic.show', ['slug' => 155]) }}">Get
                                Reading</a>
                        </div>
                    </div>
                </div>

                <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="
                                                                border-width: 1px;
                                                                padding-top: var(--wp--preset--spacing--40);
                                                                padding-right: var(--wp--preset--spacing--40);
                                                                padding-bottom: var(--wp--preset--spacing--40);
                                                                padding-left: var(--wp--preset--spacing--40);
                                                                flex-basis: 33%;
                                                              ">
                    <figure class="wp-block-image size-full">
                        <a href="{{ route('psychic.show', ['slug' => 138]) }}"><img width="500" height="500"
                                src="{{ asset('frontend/images/home/sheela_beach.jpg') }}" alt="" class="wp-image-67"
                                srcset="
                                                                      {{ asset('frontend/images/home/sheela_beach.jpg') }}         500w,
                                                                      {{ asset('frontend/images/home/sheela_beach-300x300.jpg') }} 300w,
                                                                      {{ asset('frontend/images/home/sheela_beach-150x150.jpg') }} 150w
                                                                    " sizes="(max-width: 500px) 100vw, 500px" /></a>
                    </figure>

                    <p class="has-text-align-center">
                        <strong><span style="text-decoration: underline"><a
                                    href="{{ route('psychic.show', ['slug' => 138]) }}">Sheela</a></span></strong>
                    </p>

                    <div
                        class="wp-block-group is-content-justification-center is-nowrap is-layout-flex wp-container-core-group-is-layout-23441af8 wp-block-group-is-layout-flex">
                        <figure class="wp-block-image size-full">
                            <img width="100" height="20" src="{{ asset('frontend/images/home/5starrating.png') }}" alt=""
                                class="wp-image-69" />
                        </figure>

                        <p class="has-small-font-size">(925 Reviews)</p>
                    </div>

                    <p>Reuniting Lovers, Restoring Balance, Revealing Destiny</p>

                    <div
                        class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-core-buttons-is-layout-a89b3969 wp-block-buttons-is-layout-flex">
                        <div class="wp-block-button">
                            <a class="wp-block-button__link wp-element-button"
                                href="{{ route('psychic.show', ['slug' => 138]) }}">Get
                                Reading</a>
                        </div>
                    </div>
                </div>

                <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="
                                                                border-width: 1px;
                                                                padding-top: var(--wp--preset--spacing--40);
                                                                padding-right: var(--wp--preset--spacing--40);
                                                                padding-bottom: var(--wp--preset--spacing--40);
                                                                padding-left: var(--wp--preset--spacing--40);
                                                                flex-basis: 33%;
                                                              ">
                    <figure class="wp-block-image size-full">
                        <a href="{{ route('psychic.show', ['slug' => 92]) }}"><img width="1024" height="1024"
                                src="{{ asset('frontend/images/home/Psychic-Lisa.jpg') }}" alt="" class="wp-image-68"
                                srcset="
                                                                      {{ asset('frontend/images/home/Psychic-Lisa.jpg') }}         1024w,
                                                                      {{ asset('frontend/images/home/Psychic-Lisa-300x300.jpg') }}  300w,
                                                                      {{ asset('frontend/images/home/Psychic-Lisa-150x150.jpg') }}  150w,
                                                                      {{ asset('frontend/images/home/Psychic-Lisa-768x768.jpg') }}  768w
                                                                    " sizes="(max-width: 1024px) 100vw, 1024px" /></a>
                    </figure>

                    <p class="has-text-align-center">
                        <strong><span style="text-decoration: underline"><a
                                    href="{{ route('psychic.show', ['slug' => 92]) }}">Lisa</a></span></strong>
                    </p>

                    <div
                        class="wp-block-group is-content-justification-center is-nowrap is-layout-flex wp-container-core-group-is-layout-23441af8 wp-block-group-is-layout-flex">
                        <figure class="wp-block-image size-full">
                            <img width="100" height="20" src="{{ asset('frontend/images/home/5starrating.png') }}" alt=""
                                class="wp-image-69" />
                        </figure>

                        <p class="has-small-font-size">(799 Reviews)</p>
                    </div>

                    <p>
                        Real Answers. True Insight. With Heart. Connect with me right
                        now!!!
                    </p>

                    <div
                        class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-core-buttons-is-layout-a89b3969 wp-block-buttons-is-layout-flex">
                        <div class="wp-block-button">
                            <a class="wp-block-button__link wp-element-button"
                                href="{{ route('psychic.show', ['slug' => 92]) }}">Get Reading</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="height: var(--wp--preset--spacing--80)" aria-hidden="true" class="wp-block-spacer"></div>

        <aside
            class="wp-block-group alignwide is-style-section-4 is-layout-flow wp-block-group-is-layout-flow is-style-section-4--6"
            style="
                                                            border-style: none;
                                                            border-width: 0px;
                                                            margin-top: 0;
                                                            margin-bottom: 0;
                                                            padding-top: var(--wp--preset--spacing--50);
                                                            padding-right: var(--wp--preset--spacing--60);
                                                            padding-bottom: var(--wp--preset--spacing--50);
                                                            padding-left: var(--wp--preset--spacing--60);
                                                          ">
            <h2 class="wp-block-heading has-text-align-center has-xx-large-font-size">
                <strong>Why Choose Top Rated Psychics?</strong>
            </h2>

            <p class="has-text-align-center is-style-text-subtitle is-style-text-subtitle--7">
                We understand that finding a trustworthy psychic can be
                overwhelming. That's why we've created a carefully curated directory
                of top-rated psychics from around the world — each one vetted for
                accuracy, authenticity, compassion, and professionalism.
            </p>

            <div style="height: 20px" aria-hidden="true" class="wp-block-spacer"></div>

            <div
                class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-core-buttons-is-layout-a89b3969 wp-block-buttons-is-layout-flex">
                <div class="wp-block-button">
                    <a class="wp-block-button__link has-text-align-center wp-element-button"
                        href="{{ route('psychics') }}">Find Top
                        Rated Psychics</a>
                </div>
            </div>
        </aside>

        <div style="height: var(--wp--preset--spacing--80)" aria-hidden="true" class="wp-block-spacer"></div>

        <div class="wp-block-group alignwide is-style-section-1 has-small-font-size is-layout-flow wp-container-core-group-is-layout-1bf66645 wp-block-group-is-layout-flow is-style-section-1--8"
            style="
                                                            margin-top: 0;
                                                            margin-bottom: 0;
                                                            padding-top: var(--wp--preset--spacing--60);
                                                            padding-right: var(--wp--preset--spacing--60);
                                                            padding-bottom: var(--wp--preset--spacing--60);
                                                            padding-left: var(--wp--preset--spacing--60);
                                                          ">
            <h2 class="wp-block-heading alignwide has-xx-large-font-size">
                Testimonials
            </h2>

            <div
                class="wp-block-columns alignwide is-layout-flex wp-container-core-columns-is-layout-714d85e9 wp-block-columns-is-layout-flex">
                <div class="wp-block-column has-border-color is-layout-flow wp-block-column-is-layout-flow" style="
                                                                border-color: var(--wp--preset--color--accent-6);
                                                                border-width: 1px;
                                                                border-radius: 10px;
                                                                padding-top: var(--wp--preset--spacing--40);
                                                                padding-right: var(--wp--preset--spacing--40);
                                                                padding-bottom: var(--wp--preset--spacing--40);
                                                                padding-left: var(--wp--preset--spacing--40);
                                                              ">
                    <blockquote
                        class="wp-block-quote is-style-plain has-x-large-font-size is-layout-flow wp-container-core-quote-is-layout-f5bb311e wp-block-quote-is-layout-flow is-style-plain--9"
                        style="font-style: normal; font-weight: 400">
                        <div class="wp-block-group has-global-padding is-content-justification-left is-layout-constrained wp-container-core-group-is-layout-085bd3d9 wp-block-group-is-layout-constrained"
                            style="
                                                                    margin-top: 0;
                                                                    margin-bottom: 0;
                                                                    padding-top: 0;
                                                                    padding-right: 0;
                                                                    padding-bottom: 0;
                                                                    padding-left: 0;
                                                                  ">
                            <div class="wp-block-group is-vertical is-layout-flex wp-container-core-group-is-layout-f98cf28f wp-block-group-is-layout-flex"
                                style="
                                                                      padding-top: 0;
                                                                      padding-right: 0;
                                                                      padding-bottom: 0;
                                                                      padding-left: 0;
                                                                    ">
                                <figure class="wp-block-image size-full">
                                    <img width="100" height="20" src="{{ asset('frontend/images/home/5starrating.png') }}"
                                        alt="" class="wp-image-69" />
                                </figure>

                                <p class="has-small-font-size">April 14, 2025</p>
                            </div>

                            <p class="has-medium-font-size" style="line-height: 1.1">
                                "Very detailed reading and she was spot on with her
                                predictions."
                            </p>
                        </div>
                        <cite>Sally <br /><sub>Atlanta, USA</sub></cite>
                    </blockquote>
                </div>

                <div class="wp-block-column has-border-color is-layout-flow wp-block-column-is-layout-flow" style="
                                                                border-color: var(--wp--preset--color--accent-6);
                                                                border-width: 1px;
                                                                border-radius: 10px;
                                                                padding-top: var(--wp--preset--spacing--40);
                                                                padding-right: var(--wp--preset--spacing--40);
                                                                padding-bottom: var(--wp--preset--spacing--40);
                                                                padding-left: var(--wp--preset--spacing--40);
                                                              ">
                    <blockquote
                        class="wp-block-quote is-style-plain has-x-large-font-size is-layout-flow wp-container-core-quote-is-layout-f5bb311e wp-block-quote-is-layout-flow is-style-plain--10"
                        style="font-style: normal; font-weight: 400">
                        <div class="wp-block-group has-global-padding is-content-justification-left is-layout-constrained wp-container-core-group-is-layout-085bd3d9 wp-block-group-is-layout-constrained"
                            style="
                                                                    margin-top: 0;
                                                                    margin-bottom: 0;
                                                                    padding-top: 0;
                                                                    padding-right: 0;
                                                                    padding-bottom: 0;
                                                                    padding-left: 0;
                                                                  ">
                            <div class="wp-block-group is-vertical is-layout-flex wp-container-core-group-is-layout-f98cf28f wp-block-group-is-layout-flex"
                                style="
                                                                      padding-top: 0;
                                                                      padding-right: 0;
                                                                      padding-bottom: 0;
                                                                      padding-left: 0;
                                                                    ">
                                <figure class="wp-block-image size-full">
                                    <img width="100" height="20" src="{{ asset('frontend/images/home/5starrating.png') }}"
                                        alt="" class="wp-image-69" />
                                </figure>

                                <p class="has-small-font-size">April 10, 2025</p>
                            </div>

                            <p class="has-medium-font-size" style="line-height: 1.1">
                                "Picked up instantly without giving her much details.
                                Cleared my doubts."
                            </p>
                        </div>
                        <cite>Sally <br /><sub>Atlanta, USA</sub></cite>
                    </blockquote>
                </div>

                <div class="wp-block-column has-border-color is-layout-flow wp-block-column-is-layout-flow" style="
                                                                border-color: var(--wp--preset--color--accent-6);
                                                                border-width: 1px;
                                                                border-radius: 10px;
                                                                padding-top: var(--wp--preset--spacing--40);
                                                                padding-right: var(--wp--preset--spacing--40);
                                                                padding-bottom: var(--wp--preset--spacing--40);
                                                                padding-left: var(--wp--preset--spacing--40);
                                                              ">
                    <blockquote
                        class="wp-block-quote is-style-plain has-x-large-font-size is-layout-flow wp-container-core-quote-is-layout-f5bb311e wp-block-quote-is-layout-flow is-style-plain--11"
                        style="font-style: normal; font-weight: 400">
                        <div class="wp-block-group has-global-padding is-content-justification-left is-layout-constrained wp-container-core-group-is-layout-085bd3d9 wp-block-group-is-layout-constrained"
                            style="
                                                                    margin-top: 0;
                                                                    margin-bottom: 0;
                                                                    padding-top: 0;
                                                                    padding-right: 0;
                                                                    padding-bottom: 0;
                                                                    padding-left: 0;
                                                                  ">
                            <div class="wp-block-group is-vertical is-layout-flex wp-container-core-group-is-layout-f98cf28f wp-block-group-is-layout-flex"
                                style="
                                                                      padding-top: 0;
                                                                      padding-right: 0;
                                                                      padding-bottom: 0;
                                                                      padding-left: 0;
                                                                    ">
                                <figure class="wp-block-image size-full">
                                    <img width="100" height="20" src="{{ asset('frontend/images/home/5starrating.png') }}"
                                        alt="" class="wp-image-69" />
                                </figure>

                                <p class="has-small-font-size">March 29, 2025</p>
                            </div>

                            <p class="has-medium-font-size" style="line-height: 1.1">
                                "Lisa is gifted, she sees through you. Helped me to
                                understand my situation better."
                            </p>
                        </div>
                        <cite>Sally <br /><sub>Atlanta, USA</sub></cite>
                    </blockquote>
                </div>
            </div>

            <p>
                <strong><a href="{{ route('testimonial') }}">Read All Testimonials</a></strong>
            </p>
        </div>

        <div style="height: var(--wp--preset--spacing--80)" aria-hidden="true" class="wp-block-spacer"></div>

        <div class="wp-block-group alignwide is-style-section-2 has-global-padding is-layout-constrained wp-container-core-group-is-layout-d89aad35 wp-block-group-is-layout-constrained is-style-section-2--12"
            style="
                margin-top: 0;
                margin-bottom: 0;
                padding-top: var(--wp--preset--spacing--50);
                padding-right: var(--wp--preset--spacing--50);
                padding-bottom: var(--wp--preset--spacing--50);
                padding-left: var(--wp--preset--spacing--50);">
            <div
                class="wp-block-columns alignwide is-layout-flex wp-container-core-columns-is-layout-47c06fe3 wp-block-columns-is-layout-flex">
                <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis: 50%">
                    <figure class="wp-block-image size-full is-resized">
                        <img width="361" height="361" src="{{ asset('frontend/images/home/Top-Rated-Psychics-Offer.jpg') }}"
                            alt="" class="wp-image-86" style="object-fit: cover; width: 595px; height: auto" srcset="
                                                                    {{ asset('frontend/images/home/Top-Rated-Psychics-Offer.jpg') }}         361w,
                                                                    {{ asset('frontend/images/home/Top-Rated-Psychics-Offer-300x300.jpg') }} 300w,
                                                                    {{ asset('frontend/images/home/Top-Rated-Psychics-Offer-150x150.jpg') }} 150w
                                                                  " sizes="(max-width: 361px) 100vw, 361px" />
                    </figure>
                </div>

                <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-container-core-column-is-layout-119bc444 wp-block-column-is-layout-flow"
                    style="flex-basis: 50%">
                    <h2 class="wp-block-heading"><strong>What We Offer</strong></h2>

                    <ul class="wp-block-list">
                        <li>
                            <strong>Verified Psychic Listings</strong> – Only the best and
                            most reputable psychics make our list
                        </li>

                        <li>
                            <strong>Detailed Profiles</strong> – Explore each psychic's
                            specialties, reviews, ratings, and more
                        </li>

                        <li>
                            <strong>Love &amp; Relationship Experts</strong> – Get clarity
                            on soulmates, breakups, twin flames &amp; more
                        </li>

                        <li>
                            <strong>Career &amp; Life Guidance</strong> – Navigate your
                            future with confidence
                        </li>

                        <li>
                            <strong>Spiritual Healing &amp; Energy Work</strong> – Connect
                            with spiritual healers, empaths &amp; mediums
                        </li>

                        <li>
                            <strong>Tool-Based Readings</strong> – Tarot, astrology,
                            numerology, crystal ball, and more
                        </li>
                    </ul>

                    <div
                        class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-core-buttons-is-layout-a89b3969 wp-block-buttons-is-layout-flex">
                        <div class="wp-block-button">
                            <a class="wp-block-button__link wp-element-button">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="height: var(--wp--preset--spacing--80)" aria-hidden="true" class="wp-block-spacer"></div>

        <div class="wp-block-group alignwide is-style-default has-background is-layout-flow wp-block-group-is-layout-flow"
            style="
                                                            background-color: #d7edf5;
                                                            margin-top: 0;
                                                            margin-bottom: 0;
                                                            padding-top: var(--wp--preset--spacing--60);
                                                            padding-right: var(--wp--preset--spacing--50);
                                                            padding-bottom: var(--wp--preset--spacing--60);
                                                            padding-left: var(--wp--preset--spacing--50);
                                                          ">
            <div class="wp-block-group alignwide is-layout-flow wp-block-group-is-layout-flow">
                <div
                    class="wp-block-columns alignwide is-layout-flex wp-container-core-columns-is-layout-66fad18a wp-block-columns-is-layout-flex">
                    <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow"
                        style="flex-basis: 50%">
                        <div class="wp-block-group is-vertical is-content-justification-left is-nowrap is-layout-flex wp-container-core-group-is-layout-4d5056eb wp-block-group-is-layout-flex"
                            style="min-height: 100%">
                            <div
                                class="wp-block-group has-global-padding is-layout-constrained wp-container-core-group-is-layout-92b9201d wp-block-group-is-layout-constrained">
                                <h2 class="wp-block-heading has-xx-large-font-size">
                                    How We Rate Psychics
                                </h2>

                                <p>Each psychic listed on our site is reviewed based on:</p>

                                <ul class="wp-block-list">
                                    <li>Accuracy of readings</li>

                                    <li>Client satisfaction and testimonials</li>

                                    <li>Professionalism and ethics</li>

                                    <li>Experience and credentials</li>

                                    <li>Specialty areas and tools used</li>
                                </ul>

                                <p>
                                    We believe
                                    <strong>honesty, transparency, and true spiritual
                                        connection</strong>
                                    are key to a meaningful reading.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="wp-block-column is-vertically-aligned-top is-layout-flow wp-block-column-is-layout-flow"
                        style="flex-basis: 50%">
                        <figure class="wp-block-image size-full">
                            <img width="640" height="557" src="{{ asset('frontend/images/home/psychic-reader.jpg') }}"
                                alt="" class="wp-image-134" srcset="
                                                                      {{ asset('frontend/images/home/psychic-reader.jpg') }}         640w,
                                                                      {{ asset('frontend/images/home/psychic-reader-300x261.jpg') }} 300w
                                                                    " sizes="(max-width: 640px) 100vw, 640px" />
                        </figure>
                    </div>
                </div>
            </div>
        </div>

        <p></p>

        <div class="wp-block-group alignwide is-layout-flow wp-block-group-is-layout-flow">
            <h3 class="wp-block-heading"></h3>

            <div style="height: var(--wp--preset--spacing--80)" aria-hidden="true" class="wp-block-spacer"></div>

            <aside
                class="wp-block-group alignfull is-style-section-3 has-global-padding is-layout-constrained wp-container-core-group-is-layout-f0f2a97b wp-block-group-is-layout-constrained is-style-section-3--13"
                style="
                                                              margin-top: 0;
                                                              margin-bottom: 0;
                                                              padding-top: var(--wp--preset--spacing--50);
                                                              padding-right: var(--wp--preset--spacing--50);
                                                              padding-bottom: var(--wp--preset--spacing--50);
                                                              padding-left: var(--wp--preset--spacing--50);
                                                            ">
                <div class="wp-block-group is-vertical is-content-justification-center is-layout-flex wp-container-core-group-is-layout-8778ca4a wp-block-group-is-layout-flex"
                    style="min-height: 360px; margin-top: 0; margin-bottom: 0">
                    <h2 class="wp-block-heading has-text-align-center has-xx-large-font-size">
                        <strong>Start Your Journey Today</strong>
                    </h2>

                    <p class="has-text-align-center is-style-text-subtitle has-medium-font-size is-style-text-subtitle--14">
                        Browse our handpicked list of psychics and discover the one that
                        speaks to your soul. Whether you need guidance on love,
                        finances, health, or spiritual growth — help is just a click
                        away.
                    </p>

                    <div style="height: 0px" aria-hidden="true" class="wp-block-spacer wp-container-content-62aae154"></div>

                    <div
                        class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-core-buttons-is-layout-a89b3969 wp-block-buttons-is-layout-flex">
                        <div class="wp-block-button">
                            <a class="wp-block-button__link has-text-align-center wp-element-button"
                                href="{{ route('psychics') }}">Explore Top Psychics Now</a>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        var api_key = `{{ config('constants.api_key') }}`;
    </script>
@endsection