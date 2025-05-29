@extends('frontend.layouts.main')

@section('title', isset($seo_psychic_services) && $seo_psychic_services->meta_title ? $seo_psychic_services->meta_title : (isset($site) && $site->meta_title ? $site->meta_title : 'Top Rated Psychics - Your Guide to Trusted Psychics, Real Reviews & Accurate Readings'))
@section('meta_title', isset($seo_psychic_services) && $seo_psychic_services->meta_title ? $seo_psychic_services->meta_title : (isset($site) && $site->meta_title ? $site->meta_title : 'Top Rated Psychics - Your Guide to Trusted Psychics, Real Reviews & Accurate Readings'))
@section('meta_description', isset($seo_psychic_services) && $seo_psychic_services->meta_description ? $seo_psychic_services->meta_description : (isset($site) && $site->meta_description ? $site->meta_description : 'Discover honest reviews, top-rated psychic apps, and trusted advisors on TopRatedPsychics.org. Find your perfect psychic today!'))
@section('meta_tags')
    <meta name="keywords" content="{{ isset($seo_psychic_services) && $seo_psychic_services->meta_keywords ? $seo_psychic_services->meta_keywords : (isset($site) && $site->meta_keywords ? $site->meta_keywords : 'psychic, readings, top rated, trusted, reviews') }}" />
@endsection

@section('styles')
    <style>
        .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: none;
        }

        .wp-container-core-navigation-is-layout-d445cf74 {
            justify-content: flex-end;
        }

        .wp-container-core-group-is-layout-6c531013 {
            flex-wrap: nowrap;
        }

        .wp-container-core-navigation-is-layout-fc306653 {
            justify-content: flex-end;
        }

        .wp-container-core-group-is-layout-9fd45780 {
            flex-wrap: nowrap;
            gap: var(--wp--preset--spacing--10);
            justify-content: flex-start;
        }

        .wp-container-core-group-is-layout-fc9f69e7 {
            flex-wrap: nowrap;
            justify-content: flex-start;
        }

        .wp-container-core-buttons-is-layout-a89b3969 {
            justify-content: center;
        }

        .wp-container-core-columns-is-layout-85958d59 {
            flex-wrap: nowrap;
        }

        .wp-container-core-group-is-layout-f611be13>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--50) * -1);
            margin-left: calc(var(--wp--preset--spacing--50) * -1);
        }

        .wp-container-core-group-is-layout-023fd105> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: 1340px;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .wp-container-core-group-is-layout-023fd105>.alignwide {
            max-width: 1340px;
        }

        .wp-container-core-group-is-layout-023fd105 .alignfull {
            max-width: none;
        }

        .wp-container-core-navigation-is-layout-fe9cc265 {
            flex-direction: column;
            align-items: flex-start;
        }

        .wp-container-core-columns-is-layout-28f84493 {
            flex-wrap: nowrap;
        }

        .wp-container-core-navigation-is-layout-b2891da8 {
            justify-content: space-between;
        }

        .wp-container-core-group-is-layout-cbeee361 {
            justify-content: space-between;
            align-items: center;
        }

        .wp-container-core-group-is-layout-91e87306 {
            gap: var(--wp--preset--spacing--20);
            justify-content: space-between;
        }

        :root :where(.is-style-section-1--3 .wp-block-separator) {
            color: color-mix(in srgb, currentColor 25%, transparent);
        }

        :root :where(.is-style-section-1--3 .wp-block-site-title) {
            color: currentColor;
        }

        :root :where(.is-style-section-1--3 .wp-block-site-title a:where(:not(.wp-element-button))) {
            color: currentColor;
        }

        :root :where(.is-style-section-1--3 .wp-block-post-author-name) {
            color: currentColor;
        }

        :root :where(.is-style-section-1--3 .wp-block-post-author-name a:where(:not(.wp-element-button))) {
            color: currentColor;
        }

        :root :where(.is-style-section-1--3 .wp-block-post-date) {
            color: color-mix(in srgb, currentColor 85%, transparent);
        }

        :root :where(.is-style-section-1--3 .wp-block-post-date a:where(:not(.wp-element-button))) {
            color: color-mix(in srgb, currentColor 85%, transparent);
        }

        :root :where(.is-style-section-1--3 .wp-block-post-terms) {
            color: currentColor;
        }

        :root :where(.is-style-section-1--3 .wp-block-post-terms a:where(:not(.wp-element-button))) {
            color: currentColor;
        }

        :root :where(.is-style-section-1--3 .wp-block-comment-author-name) {
            color: currentColor;
        }

        :root :where(.is-style-section-1--3 .wp-block-comment-author-name a:where(:not(.wp-element-button))) {
            color: currentColor;
        }

        :root :where(.is-style-section-1--3 .wp-block-comment-date) {
            color: currentColor;
        }

        :root :where(.is-style-section-1--3 .wp-block-comment-date a:where(:not(.wp-element-button))) {
            color: currentColor;
        }

        :root :where(.is-style-section-1--3 .wp-block-comment-edit-link) {
            color: currentColor;
        }

        :root :where(.is-style-section-1--3 .wp-block-comment-edit-link a:where(:not(.wp-element-button))) {
            color: currentColor;
        }

        :root :where(.is-style-section-1--3 .wp-block-comment-reply-link) {
            color: currentColor;
        }

        :root :where(.is-style-section-1--3 .wp-block-comment-reply-link a:where(:not(.wp-element-button))) {
            color: currentColor;
        }

        :root :where(.is-style-section-1--3 .wp-block-pullquote) {
            color: currentColor;
        }

        :root :where(.is-style-section-1--3 .wp-block-quote) {
            color: currentColor;
        }

        :root :where(.wp-block-group.is-style-section-1--3) {
            background-color: var(--wp--preset--color--accent-5);
            color: var(--wp--preset--color--contrast);
        }

        :root :where(.is-style-section-5--4 .wp-element-button, .is-style-section-5--4 .wp-block-button__link) {
            background-color: var(--wp--preset--color--base);
            color: var(--wp--preset--color--contrast);
        }

        :root :where(.is-style-section-5--4 .wp-element-button:hover, .is-style-section-5--4 .wp-block-button__link:hover) {
            background-color: color-mix(in srgb, var(--wp--preset--color--base) 80%, transparent);
            color: var(--wp--preset--color--contrast);
        }

        :root :where(.is-style-section-5--4 .wp-block-separator) {
            color: color-mix(in srgb, currentColor 25%, transparent);
        }

        :root :where(.is-style-section-5--4 .wp-block-post-author-name) {
            color: currentColor;
        }

        :root :where(.is-style-section-5--4 .wp-block-post-author-name a:where(:not(.wp-element-button))) {
            color: currentColor;
        }

        :root :where(.is-style-section-5--4 .wp-block-post-date) {
            color: color-mix(in srgb, currentColor 85%, transparent);
        }

        :root :where(.is-style-section-5--4 .wp-block-post-date a:where(:not(.wp-element-button))) {
            color: color-mix(in srgb, currentColor 85%, transparent);
        }

        :root :where(.is-style-section-5--4 .wp-block-post-terms) {
            color: currentColor;
        }

        :root :where(.is-style-section-5--4 .wp-block-post-terms a:where(:not(.wp-element-button))) {
            color: currentColor;
        }

        :root :where(.is-style-section-5--4 .wp-block-comment-author-name) {
            color: currentColor;
        }

        :root :where(.is-style-section-5--4 .wp-block-comment-author-name a:where(:not(.wp-element-button))) {
            color: currentColor;
        }

        :root :where(.is-style-section-5--4 .wp-block-comment-date) {
            color: currentColor;
        }

        :root :where(.is-style-section-5--4 .wp-block-comment-date a:where(:not(.wp-element-button))) {
            color: currentColor;
        }

        :root :where(.is-style-section-5--4 .wp-block-comment-edit-link) {
            color: currentColor;
        }

        :root :where(.is-style-section-5--4 .wp-block-comment-edit-link a:where(:not(.wp-element-button))) {
            color: currentColor;
        }

        :root :where(.is-style-section-5--4 .wp-block-comment-reply-link) {
            color: currentColor;
        }

        :root :where(.is-style-section-5--4 .wp-block-comment-reply-link a:where(:not(.wp-element-button))) {
            color: currentColor;
        }

        :root :where(.is-style-section-5--4 .wp-block-pullquote) {
            color: currentColor;
        }

        :root :where(.is-style-section-5--4 .wp-block-quote) {
            color: currentColor;
        }

        :root :where(.wp-block-group.is-style-section-5--4) {
            background-color: var(--wp--preset--color--contrast);
            color: var(--wp--preset--color--base);
        }

        :root :where(.wp-block-separator.is-style-wide--6) {}

        :root :where(.wp-block-separator.is-style-wide--6:not(.alignfull)) {
            max-width: var(--wp--style--global--wide-size) !important;
        }

        .wp-container-core-navigation-is-layout-d445cf74 {
            justify-content: flex-end;
        }

        .wp-container-core-group-is-layout-6c531013 {
            flex-wrap: nowrap;
        }

        .wp-container-core-navigation-is-layout-fc306653 {
            justify-content: flex-end;
        }

        .wp-container-core-group-is-layout-9fd45780 {
            flex-wrap: nowrap;
            gap: var(--wp--preset--spacing--10);
            justify-content: flex-start;
        }

        .wp-container-core-group-is-layout-fc9f69e7 {
            flex-wrap: nowrap;
            justify-content: flex-start;
        }

        .wp-container-core-buttons-is-layout-a89b3969 {
            justify-content: center;
        }

        .wp-container-core-columns-is-layout-85958d59 {
            flex-wrap: nowrap;
        }

        .wp-container-core-group-is-layout-f611be13>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--50) * -1);
            margin-left: calc(var(--wp--preset--spacing--50) * -1);
        }

        .wp-container-core-group-is-layout-023fd105> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: 1340px;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .wp-container-core-group-is-layout-023fd105>.alignwide {
            max-width: 1340px;
        }

        .wp-container-core-group-is-layout-023fd105 .alignfull {
            max-width: none;
        }

        .wp-container-core-navigation-is-layout-fe9cc265 {
            flex-direction: column;
            align-items: flex-start;
        }

        .wp-container-core-columns-is-layout-28f84493 {
            flex-wrap: nowrap;
        }

        .wp-container-core-navigation-is-layout-b2891da8 {
            justify-content: space-between;
        }

        .wp-container-core-group-is-layout-cbeee361 {
            justify-content: space-between;
            align-items: center;
        }

        .wp-container-core-group-is-layout-91e87306 {
            gap: var(--wp--preset--spacing--20);
            justify-content: space-between;
        }

        .wp-block-spacer {
            clear: both
        }
        
    </style>
@endsection

@section('content')
    <main
        class="wp-block-group has-global-padding is-layout-constrained wp-container-core-group-is-layout-023fd105 wp-block-group-is-layout-constrained"
        style="margin-top: 0">
        <h1 class="wp-block-query-title">Psychics</h1>

        <p>
            Discover our handpicked selection of the most trusted and highly rated
            psychics from around the world. Whether you&#8217;re seeking clarity
            in love, insight into your career, or answers from the spiritual
            realm, our gifted advisors are here to guide you. Each psychic listed
            here has been thoroughly reviewed for accuracy, experience, and
            professionalism—so you can connect with confidence. Explore their
            profiles, read verified reviews, and find the perfect match for your
            journey.
        </p>

        <div style="height: 40px" aria-hidden="true" class="wp-block-spacer"></div>

        <h2 class="wp-block-heading has-text-align-center">
            Browse Top Rated Psychics
        </h2>

        <!-- Filter Section Start -->
        <div id="psychic-filter-section" style="background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(0,0,0,0.04); display: flex; flex-wrap: wrap; gap: 16px; align-items: center; justify-content: center;">
            <input id="filter-name" type="text" class="form-control" placeholder="Enter Psychic Name" style="flex: 2 1 200px; min-width: 180px; padding: 10px 14px; border-radius: 8px; border: 1px solid #ccc;">
            <select id="filter-service" class="form-control" style="flex: 2 1 200px; min-width: 180px; padding: 10px 14px; border-radius: 8px; border: 1px solid #ccc;">
                <option value=""> -- Psychic Services -- </option>
                @foreach ($psyhicServices as $item)
                    <option value="{{ $item->id }}">{{ $item->service }}</option>
                    
                @endforeach
            </select>
            <button id="filter-search" class="btn btn-primary" style="flex: 1 1 100px; min-width: 100px; padding: 10px 0; border-radius: 8px; background: #222; color: #fff; border: none;">Search</button>
            <a id="filter-clear" style="flex: 1 1 60px; cursor:pointer; min-width: 60px; text-align: right; color: #3b3b3b; text-decoration: underline;">Clear</a>
        </div>
        <div id="filter-message" style="text-align: center; margin-top: 10px; color: #dc3545; font-size: 14px;"></div>
        <!-- Filter Section End -->

        <div id="psychics-container">
            <!-- Psychics will be loaded here dynamically -->
        </div>

        <div style="height: 40px" aria-hidden="true" class="wp-block-spacer"></div>

        <h2 class="wp-block-heading">
            Psychic Reading From Top Rated Psychics
        </h2>

        <p>
            No matter where you are on your spiritual path, finding the right
            advisor can make all the difference. Our top-rated psychics are
            available for live chat, phone, or email readings—ready to help you
            gain clarity, make empowered decisions, and move forward with
            confidence. New to psychic readings? Don't worry. Each profile
            includes specialties, tools used, and user reviews to help you choose
            the right guide. Start your journey to deeper insight today.
        </p>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const psychicsContainer = document.getElementById('psychics-container');
            const filterName = document.getElementById('filter-name');
            const filterService = document.getElementById('filter-service');
            const filterSearch = document.getElementById('filter-search');
            const filterClear = document.getElementById('filter-clear');
            let allPsychics = [];
            let allServices = [];

            // Fetch services for dropdown
            fetch('/api/psychic-services', {
                headers: {
                    'X-API-Key': `{{ config('constants.api_key') }}`,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    allServices = data.data;
                    data.data.forEach(service => {
                        const option = document.createElement('option');
                        option.value = service.slug;
                        option.textContent = service.service;
                        filterService.appendChild(option);
                    });
                }
            });

            // Function to create psychic card HTML
            function createPsychicCard(psychic) {
                return `
                    <div class="wp-block-group alignwide is-style-section-1 has-global-padding is-layout-constrained wp-container-core-group-is-layout-f611be13 wp-block-group-is-layout-constrained is-style-section-1--3"
                        style="padding-right: var(--wp--preset--spacing--50); padding-left: var(--wp--preset--spacing--50);">
                        <div style="height: 40px" aria-hidden="true" class="wp-block-spacer"></div>
                        <div class="wp-block-columns alignwide is-layout-flex wp-container-core-columns-is-layout-85958d59 wp-block-columns-is-layout-flex"
                            style="border-width: 1px; padding-top: var(--wp--preset--spacing--40); padding-right: var(--wp--preset--spacing--40); padding-bottom: var(--wp--preset--spacing--40); padding-left: var(--wp--preset--spacing--40);">
                            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="border-style: none; border-width: 0px; padding: 0; flex-basis: 33%;">
                                <figure class="wp-block-image size-large">
                                    <a href="/psychics/${psychic.slug}">
                                        <img width="1024" height="1024" src="${psychic.profile_photo}" alt="${psychic.profile_name}"
                                            class="wp-image-66" />
                                    </a>
                                </figure>
                            </div>
                            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="padding: 0; flex-basis: 33%;">
                                <p class="has-text-align-left has-x-large-font-size">
                                    <strong><span style="text-decoration: underline">
                                        <a href="/psychics/${psychic.slug}">${psychic.profile_name}</a>
                                    </span></strong>
                                </p>
                                <div class="wp-block-group is-content-justification-left is-nowrap is-layout-flex wp-container-core-group-is-layout-fc9f69e7 wp-block-group-is-layout-flex">
                                    <figure class="wp-block-image size-full">
                                        <img width="100" height="20" src="{{ asset('frontend/images/home/5starrating.png') }}" alt=""
                                            class="wp-image-69" />
                                    </figure>
                                    <p class="has-small-font-size">(${psychic.reviews_count || 0} Reviews)</p>
                                </div>
                                <p>${psychic.tagline || ''}</p>
                            </div>
                            <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow"
                                style="border-style: none; border-width: 0px; padding: 0; flex-basis: 33%;">
                                <div class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-core-buttons-is-layout-a89b3969 wp-block-buttons-is-layout-flex">
                                    <div class="wp-block-button">
                                        <a class="wp-block-button__link wp-element-button" href="/psychics/${psychic.slug}">Get Reading</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }

            // Fetch psychics from API with optional filters
            function fetchPsychicsAndRender(filters = {}) {
                let url = '/api/psychics';
                const params = [];
                if (filters.name) params.push(`name=${encodeURIComponent(filters.name)}`);
                if (filters.service) params.push(`service=${encodeURIComponent(filters.service)}`);
                if (params.length) url += '?' + params.join('&');
                fetch(url, {
                    headers: {
                        'X-API-Key': `{{ config('constants.api_key') }}`,
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        renderPsychics(data.data);
                    } else {
                        throw new Error(data.message || 'Failed to load psychics');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    psychicsContainer.innerHTML = `<p>Failed to load psychics. Please try again later.</p>`;
                });
            }

            function renderPsychics(psychics) {
                if (psychics.length === 0) {
                    psychicsContainer.innerHTML = '<p>No psychics matched your search. Please adjust your search criteria and try again.</p>';
                    return;
                }
                const psychicsHTML = psychics.map(psychic => createPsychicCard(psychic)).join('');
                psychicsContainer.innerHTML = psychicsHTML;
            }

            // Filter logic (server-side)
            function filterPsychics() {
                const name = filterName.value.trim();
                const serviceSlug = filterService.value;
                const filterMessage = document.getElementById('filter-message');
                
                // Check if any filter is selected
                if (!name && !serviceSlug) {
                    filterMessage.textContent = 'Please select at least one filter (name or service) before searching.';
                    return;
                }
                
                // Clear any previous message
                filterMessage.textContent = '';
                
                fetchPsychicsAndRender({
                    name: name,
                    service: serviceSlug
                });
            }

            // Remove filter calls from input/change events
            filterName.removeEventListener && filterName.removeEventListener('input', filterPsychics);
            filterService.removeEventListener && filterService.removeEventListener('change', filterPsychics);

            // Only filter when Search is clicked
            filterSearch.addEventListener('click', function(e) {
                e.preventDefault();
                filterPsychics();
            });
            filterClear.addEventListener('click', function(e) {
                e.preventDefault();
                filterName.value = '';
                filterService.value = '';
                document.getElementById('filter-message').textContent = '';
                fetchPsychicsAndRender();
            });

            // Initial load
            fetchPsychicsAndRender();
        });
    </script>
@endsection