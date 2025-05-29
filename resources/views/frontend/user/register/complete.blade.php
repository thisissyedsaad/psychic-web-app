@extends('layouts.user-auth')
@section('title', 'Registration Complete')
@section('content')
    <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
        @if($site && $site->logo)
            <div class="flex justify-center mb-4">
                <img src="{{ asset('storage/' . $site->logo) }}" alt="Logo" style="max-height: 100px;">
            </div>
        @endif
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-2">{{ $site->name ?? 'Site Name' }}</h2>
        <p class="text-center mb-2">Join {{ $site->name ?? 'Site Name' }}</p>
        <p class="text-center text-gray-600 mb-6">Create an account to join us</p>
        <form class="space-y-6" action="{{ route('user.register.complete.submit') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Join As</label>
                <div class="flex space-x-4 justify-between">
                    <label
                        class="flex items-center px-6 py-2 border rounded-lg cursor-pointer transition-colors duration-200"
                        style="border-color: #EA5455; color: #EA5455;">
                        <input type="radio" name="type" value="psychic" class="form-radio text-indigo-600" 
                            {{ old('type', 'psychic') === 'psychic' ? 'checked' : '' }}>
                        <span class="ml-2 font-medium">Psychic</span>
                    </label>
                    <label
                        class="flex items-center px-6 py-2 border rounded-lg cursor-pointer transition-colors duration-200"
                        style="border-color: #EA5455; color: #EA5455;">
                        <input type="radio" name="type" value="customer" class="form-radio text-indigo-600"
                            {{ old('type') === 'customer' ? 'checked' : '' }}>
                        <span class="ml-2 font-medium">Customer</span>
                    </label>
                </div>
                @error('type')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                <input id="name" name="name" type="text" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#EA5455] focus:border-[#EA5455] sm:text-sm"
                    placeholder="Enter your name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#EA5455] focus:border-[#EA5455] sm:text-sm"
                    placeholder="Password" value="{{ old('password') }}">
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <ul class="text-xs text-left mb-4">
                <li class="flex items-center mb-1" id="length-check">
                    <span class="text-red-500 mr-2">&#10060;</span>Be at least 8 characters
                </li>
                <li class="flex items-center mb-1" id="uppercase-check">
                    <span class="text-red-500 mr-2">&#10060;</span>Include at least one uppercase letter
                </li>
                <li class="flex items-center mb-1" id="lowercase-check">
                    <span class="text-red-500 mr-2">&#10060;</span>Include at least one lowercase letter
                </li>
                <li class="flex items-center mb-1" id="number-check">
                    <span class="text-red-500 mr-2">&#10060;</span>Include at least one number
                </li>
                <li class="flex items-center" id="special-check">
                    <span class="text-red-500 mr-2">&#10060;</span>Include at least one special character (@, $, !, %, *, ?, &)
                </li>
            </ul>
            <div class="flex items-center mb-4">
                <input id="terms" name="terms" type="checkbox" required
                    class="h-4 w-4 text-[#EA5455] focus:ring-[#EA5455] border-gray-300 rounded"
                    {{ old('terms') ? 'checked' : '' }}>
                <label for="terms" class="ml-2 block text-sm text-gray-900">
                    I agree to
                    <a style="color: #EA5455" href="/privacy-policy" class="text-[#EA5455] hover:text-[#d63c3d] underline"
                        target="_blank">privacy
                        policy</a>
                    &amp;
                    <a style="color: #EA5455" href="/terms-and-conditions"
                        class="text-[#EA5455] hover:text-[#d63c3d] underline" target="_blank">terms</a>
                </label>
            </div>
            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white"
                    style="background-color: #EA5455; transition: background 0.2s;"
                    onmouseover="this.style.backgroundColor='#d63c3d'"
                    onmouseout="this.style.backgroundColor='#EA5455'">Sign Up</button>
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const password = document.getElementById('password');
    const checks = {
        length: document.getElementById('length-check'),
        uppercase: document.getElementById('uppercase-check'),
        lowercase: document.getElementById('lowercase-check'),
        number: document.getElementById('number-check'),
        special: document.getElementById('special-check')
    };

    function updateCheck(element, isValid) {
        const icon = element.querySelector('span');
        if (isValid) {
            icon.innerHTML = '&#10004;';
            icon.className = 'text-green-500 mr-2';
        } else {
            icon.innerHTML = '&#10060;';
            icon.className = 'text-red-500 mr-2';
        }
    }

    function validatePassword() {
        const value = password.value;
        
        // Check length
        updateCheck(checks.length, value.length >= 8);
        
        // Check uppercase
        updateCheck(checks.uppercase, /[A-Z]/.test(value));
        
        // Check lowercase
        updateCheck(checks.lowercase, /[a-z]/.test(value));
        
        // Check number
        updateCheck(checks.number, /[0-9]/.test(value));
        
        // Check special character
        updateCheck(checks.special, /[@$!%*?&]/.test(value));
    }

    // Run validation on page load if there's a password value
    if (password.value) {
        validatePassword();
    }

    password.addEventListener('input', validatePassword);
});
</script>
@endpush