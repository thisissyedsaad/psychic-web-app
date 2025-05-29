@php
    use Illuminate\Support\Str;
@endphp

@extends('frontend.layouts.main')

@section('title', $page && $page->meta_title ? $page->meta_title : ($page ? $page->title : 'About Us'))
@section('meta_title', $page && $page->meta_title ? $page->meta_title : ($page ? $page->title : 'About Us'))
@section('meta_description', $page && $page->meta_description ? $page->meta_description : ($page ? Str::limit(strip_tags($page->content), 160) : 'About Top Rated Psychics'))
@section('meta_tags')
    <meta name="keywords" content="{{ $page && $page->meta_keywords ? $page->meta_keywords : '' }}" />
@endsection

@section('content')
    <main class="wp-block-group is-layout-flow wp-block-group-is-layout-flow" style="
                                  margin-top: 0;
                                  margin-bottom: 0;
                                  padding-top: 0;
                                  padding-right: 0;
                                  padding-bottom: 0;
                                  padding-left: 0;
                                ">
        <div class="wp-block-group alignwide has-global-padding is-layout-constrained wp-container-core-group-is-layout-2843ed05 wp-block-group-is-layout-constrained"
            style="padding-top: 0; padding-bottom: 0">
            <h1 style="
                                      padding-top: 0;
                                      padding-bottom: var(--wp--preset--spacing--40);
                                    " class="alignwide wp-block-post-title">
                {{ $page ? $page->title : 'About Us' }}
            </h1>

            <div class="entry-content alignwide wp-block-post-content is-layout-flow wp-block-post-content-is-layout-flow">
                {!! $page ? $page->content : '' !!}
            </div>
        </div>
    </main>
@endsection