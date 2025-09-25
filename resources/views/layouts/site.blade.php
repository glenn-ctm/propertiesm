
@extends('layouts.app', ['body_class' => 'font-family-poppins-sans-serif'])

@prepend('css')
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
        .font-family-poppins-sans-serif { font-family: 'Poppins', sans-serif; }
    </style>

    @livewireStyles
    {!! NoCaptcha::renderJs() !!}
@endprepend

@section('body')
    @livewire('site.components.loggedin-nav-details')
    <x-alert-message class="mt-3 mb-3" />
    <div class="min-h-screen bg-gray-100">
        @include('includes.site.nav')

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        @include('includes.site.footer')
    </div>
@endsection

@prepend('script')
    @livewireScripts

    @if ($useSpruce ?? null)
        <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/spruce@2.x.x/dist/spruce.umd.js"></script>
    @endif
@endprepend

