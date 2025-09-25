@extends('layouts.site')

@push('css')
<style>
.property-listing {
    color: #777;
}
.ellipsis-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.material-icons.icon-nav {
    font-size: 17px;
}
.material-icons.icon-amenities {
    font-size: 26px;
}
.featured-img-container {
    overflow: hidden;
}
.featured-img-container img {
    height: 210px;
    width: 100%;
    display: block;
	object-fit: cover;
	transition: transform 400ms ease-out;
}
.featured-img-container img:hover {
    transform: scale(1.15);
}
</style>
@endpush

@section('content')
<div class="property-listing pt-8 pb-10 px-4 sm:px-0 sm:pt-16 sm:pb-20">
    <div class="container m-auto">
        <p class="text-4xl sm:text-5xl text-center text-gray-700 mb-8 font-medium">Property Listing</p>
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            @foreach ($properties as $property)
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
                    <div class="w-full rounded overflow-hidden shadow-lg">
                        <div class="featured-img-container relative inline-block w-full">
                            <img src="{{ $property->media?->first()?->getUrl('thumbnail') ?? '' }}" alt="Featured Image">
                        </div>
                        <a href="{{ route('site-properties.show', $property->id) }}" class="block px-6 py-4">
                            <p class="text-gray-800 text-lg capitalize leading-6 h-12 ellipsis-2">{{ $property->full_address }}</p>
                            <div class="flex justify-start items-center py-2">
                                <p class="font-medium text-blue-700 text-3xl mb-2">${{ number_format($property->rent) }}</p>
                                <p class="text-gray-800">/month</p>
                            </div>
                            <div class="flex flex-wrap justify-between items-center">
                                <div class="text-center">
                                    <span class="material-icons text-gray-300 icon-amenities">king_bed</span>
                                    <p class="text-gray-600 text-sm">{{ $property->rooms }} Beds</p>
                                </div>
                                <div class="text-center">
                                    <span class="material-icons text-gray-300 icon-amenities">bathtub</span>
                                    <p class="text-gray-600 text-sm">{{ $property->bathrooms }} Baths</p>
                                </div>
                                <div class="text-center">
                                    <span class="material-icons text-gray-300 icon-amenities">square_foot</span>
                                    <p class="text-gray-600 text-sm">{{ number_format($property->square_footage) }} sqft</p>
                                </div>
                            </div>
                        </a>
                        <div class="flex flex-wrap items-center text-xs">
                            <a href="{{ route('site-properties.show', $property->id) }}" class="transition duration-500 ease-in-out flex justify-center items-center inline-block w-1/2 py-3 px-2 bg-gray-700 text-center text-white font-light hover:bg-gray-800">
                                <span class="material-icons inline mr-2 text-gray-200 icon-nav">info</span>
                                <p>View Details</p>
                            </a>
                            <a href="contact-us" class="transition duration-500 ease-in-out flex justify-center items-center inline-block w-1/2 py-3 px-2 bg-blue-700 text-center text-white font-light hover:bg-blue-800">
                                <span class="material-icons inline mr-2 text-gray-200 icon-nav">mark_email_read</span>
                                <p>Inquire Now</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
