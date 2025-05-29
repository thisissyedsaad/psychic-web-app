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
                        <h2 class="content-header-title float-left mb-0">Edit Service</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('psychic-services.update', $psychicService) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="service">Service Name</label>
                            <input type="text" 
                                   class="form-control @error('service') is-invalid @enderror" 
                                   id="service" 
                                   name="service" 
                                   value="{{ old('service', $psychicService->service) }}" >
                            @error('service')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $psychicService->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                            @if($psychicService->logo)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $psychicService->logo) }}" alt="Logo" style="max-height: 80px;">
                                </div>
                            @endif
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" 
                                   class="form-control @error('meta_title') is-invalid @enderror" 
                                   id="meta_title" 
                                   name="meta_title" 
                                   value="{{ old('meta_title', $psychicService->meta_title) }}" >
                            @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                                      id="meta_description" 
                                      name="meta_description" 
                                      rows="3" >{{ old('meta_description', $psychicService->meta_description) }}</textarea>
                            @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="meta_keywords">Meta Keywords</label>
                            <input type="text" 
                                   class="form-control @error('meta_keywords') is-invalid @enderror" 
                                   id="meta_keywords" 
                                   name="meta_keywords" 
                                   value="{{ old('meta_keywords', $psychicService->meta_keywords) }}" >
                            @error('meta_keywords')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary mr-1">Update</button>
                            <a href="{{ route('psychic-services.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 