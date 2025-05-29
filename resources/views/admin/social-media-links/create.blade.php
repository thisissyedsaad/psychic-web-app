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
                            <h2 class="content-header-title float-left mb-0">Add New Social Media Link</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('social-media-links.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="social_site">Social Site</label>
                                <input type="text" class="form-control @error('social_site') is-invalid @enderror"
                                    id="social_site" name="social_site" value="{{ old('social_site') }}">
                                @error('social_site')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="url_prefix">URL Prefix</label>
                                <input class="form-control @error('url_prefix') is-invalid @enderror"
                                    id="url_prefix" name="url_prefix" value="{{ old('url_prefix') }}">
                                @error('url_prefix')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Enter the full URL including http:// or https://</small>
                            </div>

                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('logo') is-invalid @enderror"
                                        id="logo" name="logo" accept="image/*">
                                    <label class="custom-file-label" for="logo">Choose file</label>
                                </div>
                                @error('logo')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Accepted formats: JPG, JPEG, PNG, GIF, WEBP. Max size:
                                    5MB</small>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary mr-1">Add</button>
                                <a href="{{ route('social-media-links.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.querySelector('.custom-file-input').addEventListener('change', function (e) {
        var fileName = e.target.files[0].name;
        var label = e.target.nextElementSibling;
        label.innerHTML = fileName;
    });
</script>
@endpush 