@extends('layouts.user-auth')
@section('title', 'Registration')
@section('content')
    <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10 flex flex-col items-center justify-center">
        @if($site && $site->logo)
            <div class="flex justify-center mb-4">
                <img src="{{ asset('storage/' . $site->logo) }}" alt="Logo" style="max-height: 100px;">
            </div>
        @endif
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-2">{{ $site->name ?? 'Site Name' }}</h2>
        <p class="text-center mb-2">Join {{ $site->name ?? 'Site Name' }}</p>
        <div class="bg-[#e6e6fa] text-[#5a5a99] p-4 rounded mb-6 text-sm text-center w-full">
            Your email has been verified.<br>
            You can now go back to the web and continue with registration.
        </div>
        <form action="{{ route('user.register.complete') }}" method="GET" class="w-full">
            <button type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white"
                style="background-color: #EA5455; transition: background 0.2s;"
                onmouseover="this.style.backgroundColor='#d63c3d'"
                onmouseout="this.style.backgroundColor='#EA5455'">Continue Registration</button>
        </form>
    </div>
@endsection