@extends('frontend.layouts.main')

@section('title', 'Articles - Top Rated Psychics')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/article.css') }}">
@endsection
@section('content')
    <main
        class="wp-block-group has-global-padding is-layout-constrained wp-container-core-group-is-layout-023fd105 wp-block-group-is-layout-constrained"
        style="margin-top: 0">
        <h1 class="wp-block-query-title">Articles</h1>

        <div class="wp-block-query is-layout-flow wp-block-query-is-layout-flow">
            <ul class="wp-block-post-template is-layout-flow wp-block-post-template-is-layout-flow">
                <li
                    class="wp-block-post post-181 post type-post status-publish format-standard has-post-thumbnail hentry category-articles">
                    <div class="wp-block-group alignfull is-layout-flow wp-block-group-is-layout-flow" style="
                                                                              padding-top: var(--wp--preset--spacing--60);
                                                                              padding-bottom: var(--wp--preset--spacing--60);
                                                                            ">
                        <div
                            class="wp-block-columns is-layout-flex wp-container-core-columns-is-layout-28f84493 wp-block-columns-is-layout-flex">
                            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow"
                                style="flex-basis: 33.33%">
                                <figure style="aspect-ratio: auto" class="wp-block-post-featured-image">
                                    <a href="{{ route('article.show') }}" target="_self">
                                        <img width="1024" height="1024"
                                            src="{{ asset('frontend/images/home/Psychic-Reading.jpg') }}"
                                            class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                            alt="Top 10 Signs You Should Get a Psychic Reading"
                                            style="width: 100%; height: 100%; object-fit: cover" decoding="async"
                                            fetchpriority="high" srcset="
                                                {{ asset('frontend/images/home/Psychic-Reading.jpg') }}         1024w,
                                                {{ asset('frontend/images/home/Psychic-Reading-300x300.jpg') }}  300w,
                                                {{ asset('frontend/images/home/Psychic-Reading-150x150.jpg') }}  150w,
                                                {{ asset('frontend/images/home/Psychic-Reading-768x768.jpg') }}  768w"
                                            sizes="(max-width: 1024px) 100vw, 1024px" /></a>
                                </figure>
                            </div>

                            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow"
                                style="flex-basis: 66.66%">
                                <h2 class="wp-block-post-title has-x-large-font-size">
                                    <a href="articles/1" target="_self">Top 10 Signs You Should Get a Psychic
                                        Reading</a>
                                </h2>

                                <div class="wp-block-post-date">
                                    <time datetime="2025-04-17T17:19:47+00:00">April 17, 2025</time>
                                </div>

                                <div class="wp-block-post-excerpt">
                                    <p class="wp-block-post-excerpt__excerpt">
                                        Feeling stuck or unsure about life? Here are 10 clear
                                        signs it’s time to seek guidance through a trusted
                                        psychic reading.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="wp-block-group has-global-padding is-layout-constrained wp-block-group-is-layout-constrained" style="
                                                                          padding-top: var(--wp--preset--spacing--60);
                                                                          padding-bottom: var(--wp--preset--spacing--60);
                                                                        "></div>

            <div
                class="wp-block-group alignwide has-global-padding is-layout-constrained wp-block-group-is-layout-constrained">
            </div>
        </div>
    </main>
@endsection