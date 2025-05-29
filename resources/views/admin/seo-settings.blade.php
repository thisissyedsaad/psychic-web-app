@extends('admin.layouts.app')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">SEO Settings</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <div class="alert-body">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <form action="{{ route('seo.settings.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        @foreach($pages as $pageKey => $pageLabel)
                            <h5 class="mb-2 mt-4 font-weight-bold">{{ $pageLabel }}</h5>
                            <div class="form-group">
                                <label for="pages_{{ $pageKey }}_meta_title">Meta Title</label>
                                <input type="text" class="form-control" id="pages_{{ $pageKey }}_meta_title" name="pages[{{ $pageKey }}][meta_title]" value="{{ old('pages.'.$pageKey.'.meta_title', $seoSettings[$pageKey]->meta_title ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="pages_{{ $pageKey }}_meta_description">Meta Description</label>
                                <input type="text" class="form-control" id="pages_{{ $pageKey }}_meta_description" name="pages[{{ $pageKey }}][meta_description]" value="{{ old('pages.'.$pageKey.'.meta_description', $seoSettings[$pageKey]->meta_description ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="pages_{{ $pageKey }}_meta_keywords">Meta Keywords</label>
                                <input type="text" class="form-control" id="pages_{{ $pageKey }}_meta_keywords" name="pages[{{ $pageKey }}][meta_keywords]" value="{{ old('pages.'.$pageKey.'.meta_keywords', $seoSettings[$pageKey]->meta_keywords ?? '') }}">
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary mt-2">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 