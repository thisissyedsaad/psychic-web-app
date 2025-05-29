@extends('frontend.layouts.main')
@php use Illuminate\Support\Str; @endphp

@section('title', isset($psychic) && $psychic->meta_title ? $psychic->meta_title : (isset($psychic) ? $psychic->profile_name . ' - Psychic Profile' : 'Psychic Profile'))
@section('meta_title', isset($psychic) && $psychic->meta_title ? $psychic->meta_title : (isset($psychic) ? $psychic->profile_name . ' - Psychic Profile' : 'Psychic Profile'))
@section('meta_description', isset($psychic) && $psychic->meta_description ? $psychic->meta_description : (isset($psychic) ? Str::limit(strip_tags($psychic->profile_description), 160) : 'Discover honest reviews, top-rated psychic apps, and trusted advisors.'))
@section('meta_tags')
    <meta name="keywords" content="{{ isset($psychic) && $psychic->meta_keywords ? $psychic->meta_keywords : '' }}" />
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/psychic-show.css') }}">
@endsection

@section('content')
    <main class="wp-block-group is-layout-flow wp-block-group-is-layout-flow" style="margin-top: 0">
        <div id="psychic-container"
            class="wp-block-group alignfull has-global-padding is-layout-constrained wp-block-group-is-layout-constrained"
            style="padding-top: 0; padding-bottom: 0">
            <!-- Psychic details will be loaded here dynamically -->
            <div class="loading-spinner" style="text-align: center; padding: 50px;">Loading service details...</div>

        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const psychicContainer = document.getElementById('psychic-container');
            const psychicSlug = window.location.pathname.split('/').pop();

            // Function to create psychic details HTML
            function createPsychicContent(psychic) {
                return `
                    <h1 style="padding-bottom: var(--wp--preset--spacing--50); margin: 0px; margin-left: 7.5px" class="alignwide wp-block-post-title">
                        ${psychic.profile_name}
                    </h1>

                    <div class="entry-content alignwide wp-block-post-content has-global-padding is-layout-constrained wp-container-core-post-content-is-layout-1a5a651a wp-block-post-content-is-layout-constrained">
                        <div class="wp-block-group is-content-justification-left is-nowrap is-layout-flex wp-container-core-group-is-layout-fc9f69e7 wp-block-group-is-layout-flex">
                            <figure class="wp-block-image size-full">
                                <img decoding="async" width="100" height="20"
                                    src="{{ asset('frontend/images/home/5starrating.png') }}" alt="" class="wp-image-69" />
                            </figure>
                            <p class="has-small-font-size">(${psychic.reviews_count || 0} Reviews)</p>
                        </div>

                        <div class="wp-block-columns is-layout-flex wp-container-core-columns-is-layout-28f84493 wp-block-columns-is-layout-flex">
                            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis: 30%">
                                <figure class="wp-block-image size-full">
                                    <img fetchpriority="high" decoding="async" width="1400" height="1400"
                                        src="${psychic.profile_photo}" alt="${psychic.profile_name}"
                                        class="wp-image-66" />
                                </figure>

                                                <div
                    class="wp-block-buttons is-content-justification-space-between is-layout-flex wp-container-core-buttons-is-layout-8c5cd02a wp-block-buttons-is-layout-flex"
                >
                    <div class="wp-block-button is-style-fill">
                    <a
                        class="wp-block-button__link has-accent-3-background-color has-background wp-element-button"
                        href="#"
                        target="_blank"
                        rel="noreferrer noopener nofollow"
                        >Call Now</a
                    >
                    </div>

                    <div class="wp-block-button">
                    <a
                        class="wp-block-button__link has-accent-3-background-color has-background wp-element-button"
                        href="#"
                        target="_blank"
                        rel="noreferrer noopener nofollow"
                        >Message</a
                    >
                    </div>
                </div>

                                <div class="wp-block-group is-style-section-1 has-global-padding is-layout-constrained wp-container-core-group-is-layout-80fb368b wp-block-group-is-layout-constrained is-style-section-1--3"
                                    style="padding: var(--wp--preset--spacing--30);">
                                    <h3 class="wp-block-heading"><strong>Contact Me</strong></h3>

                                    ${psychic.website ? `
                                        <div class="wp-block-group is-nowrap is-layout-flex wp-container-core-group-is-layout-6c531013 wp-block-group-is-layout-flex">
                                            <figure class="wp-block-image size-full is-resized">
                                                <a href="${psychic.website}" target="_blank">
                                                    <img decoding="async" height="100"
                                                        src="{{ asset('frontend/images/home/Website.png') }}" alt="" width="100"
                                                        class="wp-image-117" style="aspect-ratio: 1; object-fit: cover; width:48px;" />
                                            </figure>
                                            <p>
                                                <a href="${psychic.website}" target="_blank" rel="noreferrer noopener">
                                                    ${psychic.website_title ? psychic.website_title : psychic.profile_name}
                                                </a>
                                            </p>
                                        </div>
                                    ` : ''}

                                    ${psychic.mobile_number ? `
                                        <div class="wp-block-group is-horizontal is-content-justification-left is-nowrap is-layout-flex wp-container-core-group-is-layout-e5fbeb3a wp-block-group-is-layout-flex">
                                            <figure class="wp-block-image size-full is-resized">
                                                <img loading="lazy" decoding="async" width="100" height="100"
                                                    src="{{ asset('frontend/images/home/Telephone.png') }}" alt="Mobile"
                                                    class="wp-image-115" style="aspect-ratio: 1; object-fit: cover; width: 48px" />
                                            </figure>
                                            <p>${psychic.mobile_number}</p>
                                        </div>
                                    ` : ''}

                                    ${psychic.whatsapp_number ? `
                                        <div class="wp-block-group is-horizontal is-content-justification-left is-nowrap is-layout-flex wp-container-core-group-is-layout-e5fbeb3a wp-block-group-is-layout-flex">
                                            <figure class="wp-block-image size-full is-resized">
                                                <img loading="lazy" decoding="async" width="250" height="250"
                                                    src="{{ asset('frontend/images/home/WhatsApp.png') }}" alt="" class="wp-image-114"
                                                    style="aspect-ratio: 1; object-fit: cover; width: 48px" />
                                            </figure>
                                            <p>${psychic.whatsapp_number}</p>
                                        </div>
                                    ` : ''}
                                </div>

                                ${psychic.app_links.length > 0 ? `
                                    <div class="wp-block-group is-style-section-1 has-global-padding is-layout-constrained wp-container-core-group-is-layout-80fb368b wp-block-group-is-layout-constrained is-style-section-1--4"
                                        style="padding: var(--wp--preset--spacing--30);">
                                        <h3 class="wp-block-heading">
                                            <strong>Instant Live Chat</strong>
                                        </h3>

                                        <div class="wp-block-group is-horizontal is-content-justification-center is-nowrap is-layout-flex wp-container-core-group-is-layout-2256e7f1 wp-block-group-is-layout-flex">
                                            ${psychic.app_links.map(link => `
                                                <figure class="wp-block-image size-full">
                                                    <a href="${link.app_link.url_prefix}${link.value}" target="_blank">
                                                        <img loading="lazy" decoding="async" width="1024" height="1024"
                                                            src="${link.app_link.logo}"
                                                            alt="${link.app_link.app_name}" class="wp-image-110"
                                                            style="aspect-ratio: 1; object-fit: cover" />
                                                    </a>
                                                </figure>
                                            `).join('')}
                                        </div>
                                    </div>
                                ` : ''}

                                ${psychic.social_links.length > 0 ? `
                                    <div class="wp-block-group is-style-section-1 has-global-padding is-layout-constrained wp-container-core-group-is-layout-80fb368b wp-block-group-is-layout-constrained is-style-section-1--5"
                                        style="padding: var(--wp--preset--spacing--30);">
                                        <h3 class="wp-block-heading">
                                            <strong>Social Media</strong>
                                        </h3>

                                        <div class="wp-block-group is-nowrap is-layout-flex wp-container-core-group-is-layout-6c531013 wp-block-group-is-layout-flex">
                                            ${psychic.social_links.map(link => `
                                                <figure class="wp-block-image size-full is-resized">
                                                    <a href="${link.social_media_link.url_prefix}/${link.value}" target="_blank" rel="noreferrer noopener nofollow">
                                                        <img loading="lazy" decoding="async" width="240" height="240"
                                                            src="${link.social_media_link.logo}"
                                                            alt="${link.social_media_link.social_site}" class="wp-image-103" style="width: 90px" />
                                                    </a>
                                                </figure>
                                            `).join('')}
                                        </div>
                                    </div>
                                ` : ''}

                                ${psychic.payment_links.length > 0 ? `
                                    <div class="wp-block-group is-style-section-1 has-global-padding is-layout-constrained wp-container-core-group-is-layout-80fb368b wp-block-group-is-layout-constrained is-style-section-1--6"
                                        style="padding: var(--wp--preset--spacing--30);">
                                        <h3 class="wp-block-heading"><strong>Pay Me</strong></h3>

                                        <div class="wp-block-group is-nowrap is-layout-flex wp-container-core-group-is-layout-6c531013 wp-block-group-is-layout-flex">
                                            ${psychic.payment_links.map(link => `
                                                <figure class="wp-block-image size-full is-resized">
                                                    <a href="${link.payment_link.url_prefix}/${link.value}" target="_blank" rel="noreferrer noopener nofollow">
                                                        <img loading="lazy" decoding="async" width="640" height="640"
                                                            src="${link.payment_link.logo}"
                                                            alt="${link.payment_link.payment_provider}" class="wp-image-167" style="width: 60px" />
                                                    </a>
                                                </figure>
                                            `).join('')}
                                        </div>
                                    </div>
                                ` : ''}
                            </div>

                            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
                                <p><strong>About Me</strong></p>
                                <div>${psychic.profile_description}</div>

                                ${psychic.services.length > 0 ? `
                                    <h2 class="wp-block-heading">Services Offered</h2>
                                    <ul class="wp-block-list">
                                        ${psychic.services.map(service => `
                                            <li>${service.service}</li>
                                        `).join('')}
                                    </ul>
                                ` : ''}
                            </div>
                        </div>
                    <div style="height: 100px" aria-hidden="true" class="wp-block-spacer"></div>

                    <div class="wp-block-group alignfull is-style-section-1 has-small-font-size has-global-padding is-layout-constrained wp-container-core-group-is-layout-0d85de7f wp-block-group-is-layout-constrained is-style-section-1--7"
                        style="
                                margin-top: 0;
                                margin-bottom: 0;
                                padding-top: var(--wp--preset--spacing--60);
                                padding-bottom: var(--wp--preset--spacing--60);
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
                                    class="wp-block-quote is-style-plain has-x-large-font-size is-layout-flow wp-container-core-quote-is-layout-f5bb311e wp-block-quote-is-layout-flow is-style-plain--8"
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
                                                <img decoding="async" width="100" height="20"
                                                    src="{{ asset('frontend/images/home/5starrating.png') }}" alt=""
                                                    class="wp-image-69" />
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
                                                <img decoding="async" width="100" height="20"
                                                    src="{{ asset('frontend/images/home/5starrating.png') }}" alt=""
                                                    class="wp-image-69" />
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
                                                <img decoding="async" width="100" height="20"
                                                    src="{{ asset('frontend/images/home/5starrating.png') }}" alt=""
                                                    class="wp-image-69" />
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
                    </div>
                    <p>
                        <span style="text-decoration: underline">Read All Testimonials</span>
                    </p>
                    </div>`;
            }

            // Fetch psychic details from API
            fetch(`/api/psychics/${psychicSlug}`, {
                headers: {
                    'X-API-Key': `{{ config('constants.api_key') }}`,
                    'Accept': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log(data.data); 
                        psychicContainer.innerHTML = createPsychicContent(data.data);
                    } else {
                        throw new Error(data.message || 'Failed to load psychic details');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    psychicContainer.innerHTML = `
                        <div style="text-align: center; padding: 50px;">
                            <p>Failed to load psychic details. Please try again later.</p>
                        </div>`;
                });
        });
    </script>
@endsection