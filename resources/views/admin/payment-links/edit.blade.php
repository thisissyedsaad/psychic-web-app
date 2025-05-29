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
                        <h2 class="content-header-title float-left mb-0">Edit Payment Link</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('payment-links.update', $paymentLink) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="payment_provider">Payment Provider</label>
                            <input type="text" 
                                   class="form-control @error('payment_provider') is-invalid @enderror" 
                                   id="payment_provider" 
                                   name="payment_provider" 
                                   value="{{ old('payment_provider', $paymentLink->payment_provider) }}" >
                            @error('payment_provider')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="url_prefix">URL Prefix</label>
                            <input type="url" 
                                   class="form-control @error('url_prefix') is-invalid @enderror" 
                                   id="url_prefix" 
                                   name="url_prefix" 
                                   value="{{ old('url_prefix', $paymentLink->url_prefix) }}" >
                            @error('url_prefix')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Enter the full URL including http:// or https://</small>
                        </div>

                        <div class="form-group">
                            <label for="logo">Logo</label>
                            @if($paymentLink->logo)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($paymentLink->logo) }}" 
                                         alt="{{ $paymentLink->payment_provider }}" 
                                         class="img-thumbnail" style="max-height: 100px;">
                                </div>
                            @endif
                            <div class="custom-file">
                                <input type="file" 
                                       class="custom-file-input @error('logo') is-invalid @enderror" 
                                       id="logo" 
                                       name="logo"
                                       accept="image/*">
                                <label class="custom-file-label" for="logo">Choose new file</label>
                            </div>
                            @error('logo')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Accepted formats: JPG, JPEG, PNG, GIF, WEBP. Max size: 5MB</small>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary mr-1">Update</button>
                            <a href="{{ route('payment-links.index') }}" class="btn btn-outline-secondary">Cancel</a>
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