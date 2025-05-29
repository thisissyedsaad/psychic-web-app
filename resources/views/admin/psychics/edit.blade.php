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
                            <h2 class="content-header-title float-left mb-0">Edit Psychic</h2>
                        </div>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <div class="alert-body">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="content-body">
                <!-- Basic Info -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Information</h4>
                    </div>
                    <div class="card-body">
                        <form id="psychicForm" action="{{ route('psychics.update', $psychic) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="full_name">Full Name</label>
                                        <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                            id="full_name" name="full_name"
                                            value="{{ old('full_name', $psychic->full_name) }}" >
                                        <small class="text-muted">Not visible publicly</small>
                                        @error('full_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profile_name">Profile Name</label>
                                        <input type="text" class="form-control @error('profile_name') is-invalid @enderror"
                                            id="profile_name" name="profile_name"
                                            value="{{ old('profile_name', $psychic->profile_name) }}" >
                                        @error('profile_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email', $psychic->email) }}" >
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profile_photo">Profile Photo</label>
                                        @if($psychic->profile_photo)
                                            <div class="mb-2">
                                                <img src="{{ Storage::url($psychic->profile_photo) }}"
                                                    alt="{{ $psychic->full_name }}" class="img-thumbnail"
                                                    style="max-height: 100px;">
                                            </div>
                                        @endif
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('profile_photo') is-invalid @enderror"
                                                id="profile_photo" name="profile_photo" accept="image/*">
                                            <label class="custom-file-label" for="profile_photo">Choose new file</label>
                                        </div>
                                        @error('profile_photo')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tagline">Tagline</label>
                                        <input type="text" class="form-control @error('tagline') is-invalid @enderror"
                                            id="tagline" name="tagline" value="{{ old('tagline', $psychic->tagline) }}"
                                            maxlength="50">
                                        <small class="text-muted">Maximum 50 characters</small>
                                        @error('tagline')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="website_title">Website Title</label>
                                        <input type="text" class="form-control @error('website_title') is-invalid @enderror"
                                            id="website_title" name="website_title" value="{{ old('website_title', $psychic->website_title) }}"
                                            placeholder="Enter website title">
                                        @error('website_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="url" class="form-control @error('website') is-invalid @enderror"
                                            id="website" name="website" value="{{ old('website', $psychic->website) }}"
                                            placeholder="https://example.com">
                                        @error('website')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Phone Numbers Row -->
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mobile_number">Mobile Number</label>
                                                <input type="tel"
                                                    class="form-control phone-input @error('mobile_number') is-invalid @enderror"
                                                    id="mobile_number" name="mobile_number"
                                                    value="{{ old('mobile_number', $psychic->mobile_number) }}">
                                                @error('mobile_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="whatsapp_number">WhatsApp Number</label>
                                                <input type="tel"
                                                    class="form-control phone-input @error('whatsapp_number') is-invalid @enderror"
                                                    id="whatsapp_number" name="whatsapp_number"
                                                    value="{{ old('whatsapp_number', $psychic->whatsapp_number) }}">
                                                @error('whatsapp_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="profile_description">Profile Description</label>
                                        <textarea
                                            class="form-control editor @error('profile_description') is-invalid @enderror"
                                            id="profile_description"
                                            name="profile_description">{{ old('profile_description', $psychic->profile_description) }}</textarea>
                                        @error('profile_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Address Section -->
                                <div class="col-12 mt-2">
                                    <h4>Address Information</h4>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address_line_1">Address Line 1</label>
                                        <input type="text" class="form-control @error('address_line_1') is-invalid @enderror"
                                            id="address_line_1" name="address_line_1" 
                                            value="{{ old('address_line_1', $psychic->address->address_line_1 ?? '') }}">
                                        <small class="text-muted">Not visible publicly</small>
                                        @error('address_line_1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address_line_2">Address Line 2</label>
                                        <input type="text" class="form-control @error('address_line_2') is-invalid @enderror"
                                            id="address_line_2" name="address_line_2" 
                                            value="{{ old('address_line_2', $psychic->address->address_line_2 ?? '') }}">
                                        <small class="text-muted">Not visible publicly</small>
                                        @error('address_line_2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            id="city" name="city" value="{{ old('city', $psychic->address->city ?? '') }}">
                                        <div class="form-check mt-1">
                                            <input class="form-check-input" type="checkbox" name="show_city" id="show_city" value="1"
                                                {{ old('show_city', $psychic->address && $psychic->address->show_city ? 'checked' : '') }}>
                                            <label class="form-check-label" for="show_city">
                                                Show city publicly
                                            </label>
                                        </div>
                                        @error('city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country_id">Country</label>
                                        <select class="form-control @error('country_id') is-invalid @enderror" id="country_id" name="country_id">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}" {{ old('country_id', $psychic->address->country_id ?? '') == $country->id ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="form-check mt-1">
                                            <input class="form-check-input" type="checkbox" name="show_country" id="show_country" value="1"
                                                {{ old('show_country', $psychic->address && $psychic->address->show_country ? 'checked' : '') }}>
                                            <label class="form-check-label" for="show_country">
                                                Show country publicly
                                            </label>
                                        </div>
                                        @error('country_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 mt-2">
                                    <h4>Psychic Services Offered</h4>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div>
                                            @foreach($psychicServices as $service)
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input" type="checkbox" name="services[]"
                                                        value="{{ $service->id }}" id="service_{{ $service->id }}" 
                                                        {{ (is_array(old('services')) && in_array($service->id, old('services'))) || 
                                                           (old('services') === null && $psychic->services->contains($service->id)) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="service_{{ $service->id }}">
                                                        {{ $service->service }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('services')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 mt-2">
                                    <h4>SEO</h4>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                                            id="meta_title" name="meta_title" value="{{ old('meta_title', $psychic->meta_title) }}">
                                        @error('meta_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <input type="text"
                                            class="form-control @error('meta_description') is-invalid @enderror"
                                            id="meta_description" name="meta_description"
                                            value="{{ old('meta_description', $psychic->meta_description) }}">
                                        @error('meta_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror"
                                            id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $psychic->meta_keywords) }}">
                                        @error('meta_keywords')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-outline-primary btn-block" data-toggle="modal" data-target="#appLinksModal">
                                        <i data-feather="link"></i> Add App Links
                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-outline-primary btn-block" data-toggle="modal" data-target="#paymentLinksModal">
                                        <i data-feather="credit-card"></i> Add Payment Links
                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-outline-primary btn-block" data-toggle="modal" data-target="#socialLinksModal">
                                        <i data-feather="share-2"></i> Add Social Links
                                    </button>
                                </div>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary mr-1">Update</button>
                                <a href="{{ route('psychics.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            </div>

                            <!-- App Links Modal -->
                            <div class="modal fade" id="appLinksModal" tabindex="-1" role="dialog" aria-labelledby="appLinksModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="appLinksModalLabel">Add App Links</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="app-links-container">
                                                @forelse($appLinks as $appLink)
                                                    @php
                                                        $providerName = strtolower(str_replace(' ', '_', $appLink->app_name));
                                                        $existingValue = $existingLinks['app_links'][$providerName] ?? '';
                                                    @endphp
                                                    <div class="app-link-item mb-3">
                                                        <div class="d-flex align-items-center mb-1">
                                                            @if($appLink->logo)
                                                                <img src="{{ Storage::url($appLink->logo) }}" alt="{{ $appLink->app_name }}" class="mr-2" style="width: 24px;">
                                                            @else
                                                                <span class="text-muted mr-2">No logo</span>
                                                            @endif
                                                            <span>{{ $appLink->app_name }}</span>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" value="{{ $appLink->url_prefix }}" readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" 
                                                                    name="app_links[{{ $providerName }}]" 
                                                                    value="{{ $existingValue }}"
                                                                    placeholder="Enter your profile Id">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p class="text-center">No app links available.</p>
                                                @endforelse
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-start">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Links Modal -->
                            <div class="modal fade" id="paymentLinksModal" tabindex="-1" role="dialog" aria-labelledby="paymentLinksModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="paymentLinksModalLabel">Add Payment Links</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="payment-links-container">
                                                @forelse($paymentLinks as $paymentLink)
                                                    @php
                                                        $providerName = strtolower(str_replace(' ', '_', $paymentLink->payment_provider));
                                                        $existingValue = $existingLinks['payment_links'][$providerName] ?? '';
                                                        $existingQR = $existingLinks['payment_qr'][$providerName] ?? null;
                                                    @endphp
                                                    <div class="payment-link-item mb-4">
                                                        <div class="d-flex align-items-center mb-1">
                                                            @if($paymentLink->logo)
                                                                <img src="{{ Storage::url($paymentLink->logo) }}" alt="{{ $paymentLink->payment_provider }}" class="mr-2" style="width: 24px;">
                                                            @else
                                                                <span class="text-muted mr-2">No logo</span>
                                                            @endif
                                                            <span>{{ $paymentLink->payment_provider }}</span>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" value="{{ $paymentLink->url_prefix }}" readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" 
                                                                    name="payment_links[{{ $providerName }}]" 
                                                                    value="{{ $existingValue }}"
                                                                    placeholder="Enter your username/ID">
                                                            </div>
                                                        </div>
                                                        <div class="mt-2">
                                                            <label>QR CODE</label>
                                                            @if($existingQR)
                                                                <div class="mb-2">
                                                                    <img src="{{ Storage::url($existingQR) }}" alt="Existing QR Code" class="img-thumbnail" style="max-height: 100px;">
                                                                </div>
                                                            @endif
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" 
                                                                    name="payment_qr[{{ $providerName }}]" 
                                                                    accept="image/*">
                                                                <label class="custom-file-label">{{ $existingQR ? 'Change QR Code' : 'Upload QR Code' }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p class="text-center">No payment links available.</p>
                                                @endforelse
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-start">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Links Modal -->
                            <div class="modal fade" id="socialLinksModal" tabindex="-1" role="dialog" aria-labelledby="socialLinksModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="socialLinksModalLabel">Add Social Links</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="social-links-container">
                                                @forelse($socialMediaLinks as $socialLink)
                                                    @php
                                                        $providerName = strtolower(str_replace(' ', '_', $socialLink->social_site));
                                                        $existingValue = $existingLinks['social_links'][$providerName] ?? '';
                                                    @endphp
                                                    <div class="social-link-item mb-3">
                                                        <div class="d-flex align-items-center mb-1">
                                                            @if($socialLink->logo)
                                                                <img src="{{ Storage::url($socialLink->logo) }}" alt="{{ $socialLink->social_site }}" class="mr-2" style="width: 24px;">
                                                            @else
                                                                <span class="text-muted mr-2">No logo</span>
                                                            @endif
                                                            <span>{{ $socialLink->social_site }}</span>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" value="{{ $socialLink->url_prefix }}" readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" 
                                                                    name="social_links[{{ $providerName }}]" 
                                                                    value="{{ $existingValue }}"
                                                                    placeholder="Enter your profile name/handle/id">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p class="text-center">No social media links available.</p>
                                                @endforelse
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-start">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <style>
        .ck-editor__editable {
            min-height: 400px !important;
            max-height: 800px !important;
        }
        .iti { width: 100%; }
        .app-link-item, .payment-link-item, .social-link-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }
        .custom-file-label::after {
            content: "Browse";
        }
    </style>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if any service checkboxes have error after validation
            const serviceCheckboxes = document.querySelectorAll('input[name="services[]"]');
            let hasServiceError = document.querySelector('.text-danger.small');
            
            if (hasServiceError) {
                // Scroll to the services section
                const servicesSection = document.querySelector('.form-group label.font-weight-bold');
                if (servicesSection) {
                    servicesSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
            // Check for app links values
            const appLinksInputs = document.querySelectorAll('input[name^="app_links["]');
            let hasAppLinkValues = false;
            appLinksInputs.forEach(input => {
                if (input.value) {
                    hasAppLinkValues = true;
                }
            });
            
            // Check for payment links values
            const paymentLinksInputs = document.querySelectorAll('input[name^="payment_links["]');
            let hasPaymentLinkValues = false;
            paymentLinksInputs.forEach(input => {
                if (input.value) {
                    hasPaymentLinkValues = true;
                }
            });
            
            // Check for social links values
            const socialLinksInputs = document.querySelectorAll('input[name^="social_links["]');
            let hasSocialLinkValues = false;
            socialLinksInputs.forEach(input => {
                if (input.value) {
                    hasSocialLinkValues = true;
                }
            });
            
            // No modals are auto-opened in edit view
        });

        // Initialize phone inputs
        const phoneInputs = document.querySelectorAll('.phone-input');
        const phoneInstances = [];
        phoneInputs.forEach(input => {
            const instance = window.intlTelInput(input, {
                preferredCountries: ['us', 'gb'],
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
            });
            phoneInstances.push(instance);
        });

        // File input display
        document.querySelectorAll('.custom-file-input').forEach(function(input) {
            input.addEventListener('change', function (e) {
                var fileName = e.target.files[0].name;
                var label = e.target.nextElementSibling;
                label.innerHTML = fileName;
            });
        });

        // Handle form submission to include full international number
        document.getElementById('psychicForm').addEventListener('submit', function(e) {
            // Get the full international number for both phone fields
            const mobileInput = document.getElementById('mobile_number');
            const whatsappInput = document.getElementById('whatsapp_number');
            
            if (mobileInput) {
                const mobileInstance = phoneInstances[0]; // First phone input is mobile
                if (mobileInstance && mobileInput.value.trim() !== '') {
                    mobileInput.value = mobileInstance.getNumber(); // Get full international number
                }
            }
            
            if (whatsappInput) {
                const whatsappInstance = phoneInstances[1]; // Second phone input is whatsapp
                if (whatsappInstance && whatsappInput.value.trim() !== '') {
                    whatsappInput.value = whatsappInstance.getNumber(); // Get full international number
                }
            }
        });

        // CKEditor
        ClassicEditor
            .create(document.querySelector('#profile_description'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo'],
                table: {
                    contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
@endsection