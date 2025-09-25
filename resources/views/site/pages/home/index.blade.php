@extends('layouts.site')

@push('css')
    @include('site.pages.home.home-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.css">
@endpush

@section('content')
    <div class="home">
        @include('site.pages.home.first-section')
        @include('site.pages.home.second-section')
        @include('site.pages.home.third-section')
        @include('site.pages.home.fourth-section')
        @include('site.pages.home.fifth-section')
    </div>
@endsection

@push('script')
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script>
        var Swipes = new Swiper('.swiper-container', {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
            },
            autoplay:
            {
                delay: 5000,
                pauseOnMouseEnter: true,
            },
            speed: 4000,
        });
    </script>
@endpush
