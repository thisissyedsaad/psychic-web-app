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
                            <h2 class="content-header-title float-left mb-0">Sitemap Settings</h2>
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
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('sitemap.generate') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="font-weight-bold">XML Sitemap Link</label><br>
                                @if(isset($site) && !empty($site->domain))
                                    <a href="https://{{ $site->domain }}/sitemap.xml" target="_blank">https://{{ $site->domain }}/sitemap.xml</a>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">Frequency/Priority</label>
                                    <div class="form-group">
                                        <label for="home_frequency">Home Page</label>
                                        <select class="form-control @error('home_frequency') is-invalid @enderror"
                                            id="home_frequency" name="home_frequency">
                                            <option value="Daily" {{ old('home_frequency', $sitemap->home_frequency ?? '') == 'Daily' ? 'selected' : '' }}>Daily</option>
                                            <option value="Weekly" {{ old('home_frequency', $sitemap->home_frequency ?? '') == 'Weekly' ? 'selected' : '' }}>Weekly</option>
                                            <option value="Monthly" {{ old('home_frequency', $sitemap->home_frequency ?? '') == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                                        </select>
                                        @error('home_frequency')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>&nbsp;</label>
                                    <div class="form-group">
                                        <label for="home_priority">&nbsp;</label>
                                        <input type="number" step="0.01" min="0" max="1"
                                            class="form-control @error('home_priority') is-invalid @enderror"
                                            id="home_priority" name="home_priority"
                                            value="{{ old('home_priority', $sitemap->home_priority ?? '1.0') }}">
                                        <small class="form-text text-muted">Values will be from 0.00 to 1.0</small>
                                        @error('home_priority')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="static_frequency">Static Page</label>
                                        <select class="form-control @error('static_frequency') is-invalid @enderror"
                                            id="static_frequency" name="static_frequency">
                                            <option value="Daily" {{ old('static_frequency', $sitemap->static_frequency ?? '') == 'Daily' ? 'selected' : '' }}>Daily</option>
                                            <option value="Weekly" {{ old('static_frequency', $sitemap->static_frequency ?? '') == 'Weekly' ? 'selected' : '' }}>Weekly</option>
                                            <option value="Monthly" {{ old('static_frequency', $sitemap->static_frequency ?? '') == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                                        </select>
                                        @error('static_frequency')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>&nbsp;</label>
                                    <div class="form-group">
                                        <input type="number" step="0.01" min="0" max="1"
                                            class="form-control @error('static_priority') is-invalid @enderror"
                                            id="static_priority" name="static_priority"
                                            value="{{ old('static_priority', $sitemap->static_priority ?? '0.5') }}">
                                        <small class="form-text text-muted">Values will be from 0.00 to 1.0</small>
                                        @error('static_priority')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Generate</button>
                            </div>
                        </form>
                        <form action="{{ route('sitemap.update') }}" method="POST" class="mt-4">
                            @csrf
                            <label class="font-weight-bold">Submit to search engine</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engines[]" value="google"
                                    id="engine_google" {{ in_array('google', old('engines', $sitemap->engines ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="engine_google">Google</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engines[]" value="bing"
                                    id="engine_bing" {{ in_array('bing', old('engines', $sitemap->engines ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="engine_bing">Bing</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engines[]" value="yahoo"
                                    id="engine_yahoo" {{ in_array('yahoo', old('engines', $sitemap->engines ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="engine_yahoo">Yahoo</label>
                            </div>
                            @error('engines')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection