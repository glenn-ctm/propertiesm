@extends('layouts.panel')

@section('content')
    <div class="w-full md:w-1/2 lg:w-1/2 px-2 mb-4">
        <h1 class="text-3xl text-black">{{ $title }}</h1>
    </div>
    <div class="p-4 bg-white shadow-sm">
    <div class="container m-2">
        <div class="avatar w-32 h-32">
            @php
                $media = $user->getFirstMedia('avatar');
                $profilePhoto = $media ? $media->getUrl('thumbnail') : '/static/profile-placeholder.png'
            @endphp
            <img src="{{ $profilePhoto }}" alt="Avatar" class="rounded-full">
        </div>
        <div class="details mt-7 mb-5">
            <p class="mb-2">PIN: <span class="font-bold">{{ $user->pin }}</span></p>
            <p class="mb-2">Full Name: <span class="font-bold">{{ $user->name }}</span></p>
            <p class="mb-2">Email: <span class="font-bold">{{ $user->email }}</span></p>
            <p class="mb-2">Contact No.: <span class="font-bold">{{ $user->contact_number }}</span></p>
            <p class="mb-2">Address: <span class="font-bold">{{ $user->address }}</span></p>
            <p class="mb-2">City: <span class="font-bold">{{ $user->city }}</span></p>
            <p class="mb-2">ZIP: <span class="font-bold">{{ $user->zip_code }}</span></p>
            @if ($user->is_property_owner())
                <p class="mb-2">Number of Units on Contract: <span class="font-bold">{{ $user->properties_sum_number_of_units ?: 0 }}</span></p>
                <p class="mb-2">Number of Properties on Contract: <span class="font-bold">{{ $user->properties_count }}</span></p>
            @elseif ($user->is_tenant())
                <p class="mb-2">Unit Number: <span class="font-bold">{{ $user->unit_number }}</span></p>
            @endif
            @if ( !($user->is_admin() || $user->is_super_admin()) )
                <p class="mb-2">Status: <span class="font-bold">{{ $user->hasVerifiedEmail() ? 'Verified' : 'Pending' }}</span></p>
            @endunless
        </div>
        <div>
            <a class="text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('users.edit', $user->id) }}">
                {{ $btn_text }}
            </a>
        </div>
    </div>
    </div>

@endsection
