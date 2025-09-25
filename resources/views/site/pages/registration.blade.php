@extends('layouts.site')

@push('css')
    <style>
        .register {
            color: #777;
        }
    </style>
@endpush

@section('content')
    <div class="register bg-gray py-10 px-2 sm:py-20">
        <div class="w-full max-w-lg m-auto bg-white shadow-md rounded px-5 sm:px-8 py-10 mb-4 text-sm">
            <div class="mb-3 pb-5 text-center">
                <p class="text-gray-700 text-3xl font-semibold">Register</p>
                <p class="text-md">Fill in the necessary fields below.</p>
            </div>
            @livewire('site.components.registration', ['type' => 'tenant'])
            <div class="mb-10"></div>
            <div class="text-center mt-3 text-sm">Already have an account?
                <a class="font-bold text-blue-500 hover:text-blue-600" href="/login">Log In.</a>
            </div>
        </div>
    </div>
@endsection
