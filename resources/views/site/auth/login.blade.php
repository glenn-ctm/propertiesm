@push('css') 
    <style>
        .login {
            color: #777;
        }
    </style>
@endpush


@extends('layouts.site')

@push('css')
    @include('site.pages.home.home-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.css">
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endpush

@section('content')
    <div class="login bg-gray py-10 px-2 sm:py-20">
        <div class="w-full max-w-md m-auto text-sm">
            <form class="bg-white shadow-md rounded px-5 sm:px-8 py-10 mb-4" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3 pb-5 text-center">
                    <p class="text-gray-700 text-3xl font-semibold">Login</p>
                    <p class="text-md">Enter your account credentials to continue.</p>
                </div>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4">
                        <div class="font-medium text-red-600">
                            {{ __('Whoops! Something went wrong.') }}
                        </div>

                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if( $redirect = request()->input('redirect') )
                    <input type="hidden" name="redirect" value="{{ $redirect }}">
                @endif

                <div class="mb-4">
                    <input class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="">
                    <input class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="pin" type="password" name="password" placeholder="PIN (Portal ID Number)" required>
                </div>
                <div>
                    <button class="transition duration-500 ease-in-out w-full bg-blue-500 hover:bg-red-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline">Sign In</button>
                </div>
                <div class="text-center mt-3">Don't have an account?
                    <a class="font-bold text-blue-500 hover:text-blue-600" href="/register">Register.</a>
                </div>
            </form>
        </div>
    </div>
@endsection
