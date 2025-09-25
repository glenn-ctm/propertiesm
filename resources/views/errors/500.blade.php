@extends('layouts.site')

@push('css')
    @include('errors.errors-css')
@endpush

@section('content')
<div id="error" class="flex justify-center items-center relative">
    <div class="absolute text-center w-100">
        <img src="/static/error-img.png" class="absolute error_img z-10" width="50%">
        <p class="error-num uppercase m-0 text-gray-500 leading-none relative z-30">500</p>
        <p class="font-bold uppercase text-blue-500 subtitle">Internal server error</p>
        <p class="text-gray-600 tracking-wider mb-8 mt-4 text-lg md:text-xl">We're experiencing a problem. Please try again later.</p>
        <a href="/" class="shadow-md inline-block text-base md:text-lg uppercase inline-block py-3 px-8 rounded-full font-semibold border-2 border-white text-gray-500 bg-white mr-3 hover:shadow-lg">Go Home</a>
        <a href="/contact-us" class="shadow-md inline-block bg-blue-500 text-base md:text-lg uppercase inline-block py-3 px-6 rounded-full font-semibold border-2 border-blue-500 text-white hover:shadow-lg">Contact us</a>
    </div>
</div>
@endsection



