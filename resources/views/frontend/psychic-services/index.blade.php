@extends('frontend.layouts.main')

@section('title', isset($seo_psychic_services) && $seo_psychic_services->meta_title ? $seo_psychic_services->meta_title : (isset($site) && $site->meta_title ? $site->meta_title : 'Top Rated Psychics - Your Guide to Trusted Psychics, Real Reviews & Accurate Readings'))
@section('meta_title', isset($seo_psychic_services) && $seo_psychic_services->meta_title ? $seo_psychic_services->meta_title : (isset($site) && $site->meta_title ? $site->meta_title : 'Top Rated Psychics - Your Guide to Trusted Psychics, Real Reviews & Accurate Readings'))
@section('meta_description', isset($seo_psychic_services) && $seo_psychic_services->meta_description ? $seo_psychic_services->meta_description : (isset($site) && $site->meta_description ? $site->meta_description : 'Discover honest reviews, top-rated psychic apps, and trusted advisors on TopRatedPsychics.org. Find your perfect psychic today!'))
@section('meta_tags')
    <meta name="keywords" content="{{ isset($seo_psychic_services) && $seo_psychic_services->meta_keywords ? $seo_psychic_services->meta_keywords : (isset($site) && $site->meta_keywords ? $site->meta_keywords : 'psychic, readings, top rated, trusted, reviews') }}" />
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/psychic-services.css') }}">
@endsection

@section('content')
    <div class="wp-block-group has-global-padding is-layout-constrained wp-block-group-is-layout-constrained">
        <div class="wp-block-group alignwide is-layout-flow wp-block-group-is-layout-flow">
            <h1 class="wp-block-query-title">Psychic Services</h1>

            <div id="services-container" class="wp-block-query is-layout-flow wp-block-query-is-layout-flow">
                <div class="loading-spinner">Loading services...</div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const servicesContainer = document.getElementById('services-container');

            // Function to create service card
            const createServiceCard = (service) => {
                return `
                    <li class="wp-block-post post-${service.id} post type-post status-publish format-standard has-post-thumbnail hentry category-psychic-services">
                        <div class="wp-block-group is-layout-flow wp-block-group-is-layout-flow" style="
                            border-width: 1px;
                            padding-top: 30px;
                            padding-right: 30px;
                            padding-bottom: 30px;
                            padding-left: 30px;
                        ">
                            <figure class="wp-block-post-featured-image">
                                <a href="/psychic-services/${service.slug}" target="_self">
                                    <img width="684" height="685"
                                        src="${service.logo}"
                                        class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                        alt="${service.service}"
                                        style="object-fit: cover"
                                        decoding="async" />
                                </a>
                            </figure>

                            <h2 class="wp-block-post-title">
                                <a href="/psychic-services/${service.slug}" target="_self">${service.service}</a>
                            </h2>

                            <div class="wp-block-post-excerpt">
                                <p class="wp-block-post-excerpt__excerpt">
                                    ${service.description || 'No description available'}
                                </p>
                            </div>
                        </div>
                    </li>
                `;
            };

            // Fetch services from API
            fetch('/api/psychic-services', {
                headers: {
                    'X-API-Key': `{{ config('constants.api_key') }}`,
                    'Accept': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (data.data.length === 0) {
                            servicesContainer.innerHTML = '<p>No services available at the moment.</p>';
                            return;
                        }
                        const servicesHTML = data.data.map(service => createServiceCard(service)).join('');
                        servicesContainer.innerHTML = `
                        <ul class="columns-3 wp-block-post-template is-layout-grid wp-container-core-post-template-is-layout-6d3fbd8f wp-block-post-template-is-layout-grid">
                            ${servicesHTML}
                        </ul>
                    `;
                    } else {
                        throw new Error(data.message || 'Failed to load services');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    servicesContainer.innerHTML = `
                    <p>Failed to load services. Please try again later.</p>
                `;
                });
        });
    </script>
@endsection