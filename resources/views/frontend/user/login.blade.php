@extends('layouts.user-auth')
@section('title', 'Login')

@section('content')
    <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
        @if($site && $site->logo)
            <div class="flex justify-center mb-4">
                <img src="{{ asset('storage/' . $site->logo) }}" alt="Logo" style="max-height: 100px;">
            </div>
        @endif
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-2">{{ $site->name ?? 'Site Name' }}</h2>
        <p class="text-center text-gray-800 mb-6 mt-6">Welcome to {{ $site->name ?? 'Site Name' }}!
            <br>
            <span class="text-sm">Please login to your account.</span>
        </p>

        @if($errors->any())
            <div class="p-4 rounded mb-4 text-sm text-center" style="background: #fff1f0; color: #EA5455;">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <form class="space-y-6" action="{{ route('user.login') }}" method="POST">
            @csrf
            <div>
                <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                <input id="email-address" name="email" type="email" autocomplete="email" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#EA5455] focus:border-[#EA5455] sm:text-sm"
                    placeholder="Enter your email" value="{{ old('email') }}">
            </div>
            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#EA5455] focus:border-[#EA5455] sm:text-sm"
                    placeholder="Password">
                <a href="#" style="color:rgb(234, 84, 85)" class="absolute right-0 top-0 mt-2 mr-3 text-xs">Forgot
                    Password?</a>
            </div>
            <div class="flex items-center">
                <input id="remember_me" name="remember" type="checkbox"
                    class="h-4 w-4 text-[#EA5455] focus:ring-[#EA5455] border-gray-300 rounded">
                <label for="remember_me" class="ml-2 block text-sm text-gray-900"> Remember me </label>
            </div>
            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white"
                    style="background-color: #EA5455; transition: background 0.2s;"
                    onmouseover="this.style.backgroundColor='#d63c3d'"
                    onmouseout="this.style.backgroundColor='#EA5455'">Login</button>
            </div>
            <div class="text-center text-sm text-gray-600">
                New on our platform? <a href="{{ route('user.register.email') }}"
                    class="text-[#EA5455] hover:text-[#d63c3d]" style="color: rgb(234, 84, 85)">Create an
                    account</a>
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