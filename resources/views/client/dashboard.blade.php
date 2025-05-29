@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h1 class="text-2xl font-semibold mb-4">Welcome, {{ auth()->user()->name }}!</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Profile Information -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h2 class="text-xl font-semibold mb-3">Profile Information</h2>
                <div class="space-y-2">
                    <p><span class="font-medium">Email:</span> {{ auth()->user()->email }}</p>
                    <p><span class="font-medium">Phone:</span> {{ auth()->user()->phone_number ?? 'Not provided' }}</p>
                    <p><span class="font-medium">Member since:</span> {{ auth()->user()->created_at->format('M d, Y') }}</p>
                </div>
                <div class="mt-4">
                    <a href="#" class="text-indigo-600 hover:text-indigo-800">Edit Profile</a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h2 class="text-xl font-semibold mb-3">Recent Activity</h2>
                @if(auth()->user()->purchases->count() > 0)
                    <div class="space-y-3">
                        @foreach(auth()->user()->purchases()->latest()->limit(5)->get() as $purchase)
                            <div class="border-b pb-2">
                                <p class="font-medium">{{ $purchase->created_at->format('M d, Y') }}</p>
                                <p class="text-gray-600">Purchase ID: {{ $purchase->id }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-600">No recent activity</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Featured Psychics -->
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Featured Psychics</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach(\App\Models\Psychic::where('is_featured', true)->limit(3)->get() as $psychic)
                <div class="bg-gray-50 p-4 rounded-lg">
                    @if($psychic->profile_picture)
                        <img src="{{ $psychic->profile_picture }}" alt="{{ $psychic->name }}" class="w-full h-48 object-cover rounded-lg mb-3">
                    @endif
                    <h3 class="text-lg font-semibold">{{ $psychic->name }}</h3>
                    <p class="text-gray-600">{{ Str::limit($psychic->description, 100) }}</p>
                    <a href="#" class="mt-3 inline-block text-indigo-600 hover:text-indigo-800">View Profile</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection