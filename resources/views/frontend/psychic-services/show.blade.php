@extends('frontend.layouts.main')
@php use Illuminate\Support\Str; @endphp

@section('title', isset($seo_psychic_services) && $seo_psychic_services->meta_title ? $seo_psychic_services->meta_title : 'Psychic Service - Top Rated Psychics')
@section('meta_title', isset($seo_psychic_services) && $seo_psychic_services->meta_title ? $seo_psychic_services->meta_title : 'Psychic Service - Top Rated Psychics')
@section('meta_description', isset($seo_psychic_services) && $seo_psychic_services->meta_description ? $seo_psychic_services->meta_description : 'Discover our psychic services and find the perfect match for your needs.')
@section('meta_tags')
    <meta name="keywords"
        content="{{ isset($seo_psychic_services) && $seo_psychic_services->meta_keywords ? $seo_psychic_services->meta_keywords : 'psychic, services, readings, top rated' }}" />
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

        .wp-container-core-post-content-is-layout-1a5a651a> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: 1340px;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .wp-container-core-post-content-is-layout-1a5a651a>.alignwide {
            max-width: 1340px;
        }

        .wp-container-core-post-content-is-layout-1a5a651a .alignfull {
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
    </style>
@endsection

@section('content')
    <main class="wp-block-group is-layout-flow wp-block-group-is-layout-flow" style="margin-top: 0">
        <div id="service-container"
            class="wp-block-group alignfull has-global-padding is-layout-constrained wp-block-group-is-layout-constrained"
            style="padding-top: 0; padding-bottom: 0">
            <div class="loading-spinner" style="text-align: center; padding: 50px;">Loading service details...</div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const serviceContainer = document.getElementById('service-container');
            const serviceSlug = window.location.pathname.split('/').pop();

            // Function to create service content
            const createServiceContent = (service) => {
                return `
                                    <h1 style="padding-bottom: var(--wp--preset--spacing--50); margin: 0px; margin-left: 7.5px" class="alignwide wp-block-post-title">
                                        ${service.service}
                                    </h1>

                                    <div class="entry-content alignwide wp-block-post-content has-global-padding is-layout-constrained wp-container-core-post-content-is-layout-1a5a651a wp-block-post-content-is-layout-constrained">
                                        <h2 class="wp-block-heading">${service.meta_title || service.service}</h2>

                                        <p>${service.description || ''}</p>

                                        <figure class="wp-block-image alignright size-full is-resized">
                                            <img fetchpriority="high" 
                                                 decoding="async" 
                                                 width="682" 
                                                 height="682"
                                                 src="${service.logo}" 
                                                 alt="${service.service}"
                                                 class="wp-image-237" 
                                                 style="width: 491px; height: auto" />
                                        </figure>

                                        ${service.meta_description ? `<p>${service.meta_description}</p>` : ''}

                                        ${service.meta_keywords ? `
                                            <h3 class="wp-block-heading">Key Features</h3>
                                            <ul class="wp-block-list">
                                                ${service.meta_keywords.split(',').map(keyword => `
                                                    <li>${keyword.trim()}</li>
                                                `).join('')}
                                            </ul>
                                        ` : ''}
                                    </div>
                                    <div style="height: var(--wp--preset--spacing--80)" aria-hidden="true" class="wp-block-spacer"></div>
                                `;
            };

            // Fetch service details from API
            fetch(`/api/psychic-services/${serviceSlug}`, {
                headers: {
                    'X-API-Key': `{{ config('constants.api_key') }}`,
                    'Accept': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        serviceContainer.innerHTML = createServiceContent(data.data);
                        // Fetch and render top psychics for this service
                        fetch(`/api/psychic-services/${serviceSlug}/top-psychics`, {
                            headers: {
                                'X-API-Key': `{{ config('constants.api_key') }}`,
                                'Accept': 'application/json'
                            }
                        })
                            .then(response => response.json())
                            .then(topData => {
                                if (topData.data && topData.data.length > 0) {
                                    let html = `
                                            <div class="wp-block-group alignwide is-style-section-1 has-global-padding is-layout-constrained wp-container-core-group-is-layout-f611be13 wp-block-group-is-layout-constrained is-style-section-1--5" style="padding-top: var(--wp--preset--spacing--50); padding-right: var(--wp--preset--spacing--50); padding-bottom: var(--wp--preset--spacing--50); padding-left: var(--wp--preset--spacing--50);">
                                                <h2 id="top-psychics-heading" class="wp-block-heading has-text-align-center">Browse Top Psychics</h2>
                                                <div style="height: 40px" aria-hidden="true" class="wp-block-spacer"></div>
                                                <div class="wp-block-columns alignwide is-layout-flex wp-container-core-columns-is-layout-28f84493 wp-block-columns-is-layout-flex">
                                            `;
                                    topData.data.forEach(psychic => {
                                        html += `
                                                <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="border-width: 1px; padding-top: var(--wp--preset--spacing--40); padding-right: var(--wp--preset--spacing--40); padding-bottom: var(--wp--preset--spacing--40); padding-left: var(--wp--preset--spacing--40); flex-basis: 33%;">
                                                    <figure class="wp-block-image size-large">
                                                        <a href="/psychics/${psychic.slug}">
                                                            <img width="1024" height="1024" src="${psychic.profile_photo}" alt="${psychic.profile_name}" class="wp-image-66" />
                                                        </a>
                                                    </figure>
                                                    <p class="has-text-align-center">
                                                        <strong><span style="text-decoration: underline"><a href="/psychics/${psychic.slug}">${psychic.profile_name}</a></span></strong>
                                                    </p>
                                                    <div class="wp-block-group is-content-justification-center is-nowrap is-layout-flex wp-container-core-group-is-layout-23441af8 wp-block-group-is-layout-flex">
                                                        <figure class="wp-block-image size-full">
                                                            <img width="100" height="20" src="{{ asset('frontend/images/home/5starrating.png') }}" alt="" class="wp-image-69" />
                                                        </figure>
                                                        <p class="has-small-font-size">(${psychic.reviews_count} Reviews)</p>
                                                    </div>
                                                    <p>${psychic.tagline || ''}</p>
                                                    <div class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-core-buttons-is-layout-a89b3969 wp-block-buttons-is-layout-flex">
                                                        <div class="wp-block-button">
                                                            <a class="wp-block-button__link wp-element-button" href="/psychics/${psychic.slug}">Get Reading</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                `;
                                    });
                                    html += `</div></div>`;
                                    serviceContainer.insertAdjacentHTML('beforeend', html);
                                    const h1El = document.querySelector('.wp-block-post-title');
                                    const h2El = document.getElementById('top-psychics-heading');

                                    if (h1El && h2El) {
                                        const serviceName = h1El.innerText.trim();
                                        h2El.innerText = `Browse Top Psychics for ${serviceName}`;
                                    }
                                }
                            });
                    } else {
                        throw new Error(data.message || 'Failed to load service details');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    serviceContainer.innerHTML = `
                                    <div style="text-align: center; padding: 50px;">
                                        <p>Failed to load service details. Please try again later.</p>
                                    </div>
                                `;
                });
        });
    </script>
@endsection