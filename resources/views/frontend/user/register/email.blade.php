@extends('layouts.user-auth')
@section('title', 'Registration')
@section('content')
    <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
        @if($site && $site->logo)
            <div class="flex justify-center mb-4">
                <img src="{{ asset('storage/' . $site->logo) }}" alt="Logo" style="max-height: 100px;">
            </div>
        @endif
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-2">{{ $site->name ?? 'NY Psyhics' }}</h2>
        <p class="text-center text-gray-600 mb-2">Join {{ $site->name ?? 'NY Psyhics' }}</p>
        <p class="text-center text-gray-600 mb-6">Create an account to join us.</p>
        <form class="space-y-6" action="{{ route('user.register.send') }}" method="POST">
            @csrf
            <div>
                <label for="email-address" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email-address" name="email" autocomplete="email"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#EA5455] focus:border-[#EA5455] sm:text-sm"
                    placeholder="Enter your email">
            </div>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white"
                    style="background-color: #EA5455; transition: background 0.2s;"
                    onmouseover="this.style.backgroundColor='#d63c3d'"
                    onmouseout="this.style.backgroundColor='#EA5455'">Next</button>
            </div>
            <div class="text-center text-sm text-gray-600">
                Already have an account? <a href="{{ route('user.login') }}" class="text-[#EA5455] hover:text-[#d63c3d]"
                    style="color: #EA5455">Sign in instead</a>
            </div>
            <div class="flex items-center justify-center mt-4">
                <span class="border-b w-1/5 lg:w-1/4"></span>
                <span class="text-xs text-gray-500 uppercase px-2">or</span>
                <span class="border-b w-1/5 lg:w-1/4"></span>
            </div>
            <div>
                <a href="#"
                    class="w-full flex justify-center py-2 px-4 border border-gray-300 bg-white text-sm font-medium rounded-md text-gray-700 hover:bg-gray-50">
                    <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="w-5 h-5 mr-2"
                        alt="Google logo"> Sign in with Google
                </a>
            </div>
        </form>
    </div>
@endsection