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
                        <h2 class="content-header-title float-left mb-0">Site Settings</h2>
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
                    <form action="{{ route('site.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Site Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $site->name ?? '') }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="domain">Site Domain</label>
                            <input type="text" class="form-control" id="domain" name="domain" value="{{ old('domain', $site->domain ?? '') }}" required>
                            @error('domain')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                            @error('logo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @if(!empty($site->logo))
                                <div class="mt-4">
                                    <img src="{{ asset('storage/' . $site->logo) }}" alt="Logo" style="max-height: 80px;">
                                </div>
                            @endif
                        </div>
                        <div class="form-group form-check">
                            <input type="hidden" name="maintenance_mode" value="0">
                            <input type="checkbox" class="form-check-input" id="maintenance_mode" name="maintenance_mode" value="1" {{ old('maintenance_mode', $site->maintenance_mode ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label" for="maintenance_mode">Put site in maintenance</label>
                            @error('maintenance_mode')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="maintenance_message">Maintenance Message</label>
                            <textarea class="form-control" id="maintenance_message" name="maintenance_message" rows="2">{{ old('maintenance_message', $site->maintenance_message ?? '') }}</textarea>
                            @error('maintenance_message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-check ">
                            <input type="hidden" name="registration_disabled" value="0">
                            <input type="checkbox" class="form-check-input" id="registration_disabled" name="registration_disabled" value="1" {{ old('registration_disabled', $site->registration_disabled ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label" for="registration_disabled">Disable New User Registration</label>
                            @error('registration_disabled')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="registration_message">Registration Message</label>
                            <textarea class="form-control" id="registration_message" name="registration_message" rows="2">{{ old('registration_message', $site->registration_message ?? '') }}</textarea>
                            @error('registration_message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 