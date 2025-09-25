@extends('layouts.site')

@push('css')
<style>
.property-listing {
    color: #777;
}
.material-icons.icon-nav {
    font-size: 19px;
}
.material-icons.icon-amenities {
    font-size: 30px;
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
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
                <div class="w-full rounded overflow-hidden shadow-lg">
                    <div class="featured-img-container relative inline-block">
                        <img src="/static/property-listing/sample1.jpg" alt="Featured Image">
                    </div>
                    <a href="property-page" class="block px-6 py-4">
                        <p class="text-gray-800 text-lg capitalize leading-6">2603 W. Imperial Hwy, Inglewood, CA 90303</p>
                        <div class="flex justify-start items-center py-2">
                            <p class="font-medium text-blue-700 text-3xl mb-2">$1,500</p>
                            <p class="text-gray-800">/month</p>
                        </div>
                        <div class="flex flex-wrap justify-between items-center">
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">king_bed</span>
                                <p class="font-medium text-gray-700 text-sm">2 Beds</p>
                            </div>
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">bathtub</span>
                                <p class="font-medium text-gray-700 text-sm">2 Baths</p>
                            </div>
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">square_foot</span>
                                <p class="font-medium text-gray-700 text-sm">1,000 sqft</p>
                            </div>
                        </div>
                    </a>
                    <div class="flex flex-wrap items-center">
                        <a href="property-page" class="transition duration-500 ease-in-out flex justify-center items-center py-3 inline-block w-1/2 p-2 bg-gray-700 text-center text-white text-sm font-light hover:bg-gray-800">
                            <span class="material-icons text-sm inline mr-2 text-gray-400 icon-nav">info</span>
                            <p>View Details</p>
                        </a>
                        <a href="contact-us" class="transition duration-500 ease-in-out flex justify-center items-center py-3 inline-block w-1/2 p-2 bg-blue-700 text-center text-white text-sm font-light hover:bg-blue-800">
                            <span class="material-icons text-sm inline mr-2 text-gray-400 icon-nav">mark_email_read</span>
                            <p>Inquire Now</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
                <div class="w-full rounded overflow-hidden shadow-lg">
                    <div class="featured-img-container relative inline-block">
                        <img src="/static/property-listing/sample2.jpg" alt="Featured Image">
                    </div>
                    <a href="property-page" class="block px-6 py-4">
                        <p class="text-gray-800 text-lg capitalize leading-6">2603 W. Imperial Hwy, Inglewood, CA 90303</p>
                        <div class="flex justify-start items-center py-2">
                            <p class="font-medium text-blue-700 text-3xl mb-2">$1,500</p>
                            <p class="text-gray-800">/month</p>
                        </div>
                        <div class="flex flex-wrap justify-between items-center">
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">king_bed</span>
                                <p class="font-medium text-gray-700 text-sm">2 Beds</p>
                            </div>
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">bathtub</span>
                                <p class="font-medium text-gray-700 text-sm">2 Baths</p>
                            </div>
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">square_foot</span>
                                <p class="font-medium text-gray-700 text-sm">1,000 sqft</p>
                            </div>
                        </div>
                    </a>
                    <div class="flex flex-wrap items-center">
                        <a href="property-page" class="transition duration-500 ease-in-out flex justify-center items-center py-3 inline-block w-1/2 p-2 bg-gray-700 text-center text-white text-sm font-light hover:bg-gray-800">
                            <span class="material-icons text-sm inline mr-2 text-gray-400 icon-nav">info</span>
                            <p>View Details</p>
                        </a>
                        <a href="contact-us" class="transition duration-500 ease-in-out flex justify-center items-center py-3 inline-block w-1/2 p-2 bg-blue-700 text-center text-white text-sm font-light hover:bg-blue-800">
                            <span class="material-icons text-sm inline mr-2 text-gray-400 icon-nav">mark_email_read</span>
                            <p>Inquire Now</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
                <div class="w-full rounded overflow-hidden shadow-lg">
                    <div class="featured-img-container relative inline-block">
                        <img src="/static/property-listing/sample3.jpg" alt="Featured Image">
                    </div>
                    <a href="property-page" class="block px-6 py-4">
                        <p class="text-gray-800 text-lg capitalize leading-6">2603 W. Imperial Hwy, Inglewood, CA 90303</p>
                        <div class="flex justify-start items-center py-2">
                            <p class="font-medium text-blue-700 text-3xl mb-2">$1,500</p>
                            <p class="text-gray-800">/month</p>
                        </div>
                        <div class="flex flex-wrap justify-between items-center">
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">king_bed</span>
                                <p class="font-medium text-gray-700 text-sm">2 Beds</p>
                            </div>
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">bathtub</span>
                                <p class="font-medium text-gray-700 text-sm">2 Baths</p>
                            </div>
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">square_foot</span>
                                <p class="font-medium text-gray-700 text-sm">1,000 sqft</p>
                            </div>
                        </div>
                    </a>
                    <div class="flex flex-wrap items-center">
                        <a href="property-page" class="transition duration-500 ease-in-out flex justify-center items-center py-3 inline-block w-1/2 p-2 bg-gray-700 text-center text-white text-sm font-light hover:bg-gray-800">
                            <span class="material-icons text-sm inline mr-2 text-gray-400 icon-nav">info</span>
                            <p>View Details</p>
                        </a>
                        <a href="contact-us" class="transition duration-500 ease-in-out flex justify-center items-center py-3 inline-block w-1/2 p-2 bg-blue-700 text-center text-white text-sm font-light hover:bg-blue-800">
                            <span class="material-icons text-sm inline mr-2 text-gray-400 icon-nav">mark_email_read</span>
                            <p>Inquire Now</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
                <div class="w-full rounded overflow-hidden shadow-lg">
                    <div class="featured-img-container relative inline-block">
                        <img src="/static/property-listing/sample4.jpg" alt="Featured Image">
                    </div>
                    <a href="property-page" class="block px-6 py-4">
                        <p class="text-gray-800 text-lg capitalize leading-6">2603 W. Imperial Hwy, Inglewood, CA 90303</p>
                        <div class="flex justify-start items-center py-2">
                            <p class="font-medium text-blue-700 text-3xl mb-2">$1,500</p>
                            <p class="text-gray-800">/month</p>
                        </div>
                        <div class="flex flex-wrap justify-between items-center">
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">king_bed</span>
                                <p class="font-medium text-gray-700 text-sm">2 Beds</p>
                            </div>
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">bathtub</span>
                                <p class="font-medium text-gray-700 text-sm">2 Baths</p>
                            </div>
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">square_foot</span>
                                <p class="font-medium text-gray-700 text-sm">1,000 sqft</p>
                            </div>
                        </div>
                    </a>
                    <div class="flex flex-wrap items-center">
                        <a href="property-page" class="transition duration-500 ease-in-out flex justify-center items-center py-3 inline-block w-1/2 p-2 bg-gray-700 text-center text-white text-sm font-light hover:bg-gray-800">
                            <span class="material-icons text-sm inline mr-2 text-gray-400 icon-nav">info</span>
                            <p>View Details</p>
                        </a>
                        <a href="contact-us" class="transition duration-500 ease-in-out flex justify-center items-center py-3 inline-block w-1/2 p-2 bg-blue-700 text-center text-white text-sm font-light hover:bg-blue-800">
                            <span class="material-icons text-sm inline mr-2 text-gray-400 icon-nav">mark_email_read</span>
                            <p>Inquire Now</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
                <div class="w-full rounded overflow-hidden shadow-lg">
                    <div class="featured-img-container relative inline-block">
                        <img src="/static/property-listing/sample1.jpg" alt="Featured Image">
                    </div>
                    <a href="property-page" class="block px-6 py-4">
                        <p class="text-gray-800 text-lg capitalize leading-6">2603 W. Imperial Hwy, Inglewood, CA 90303</p>
                        <div class="flex justify-start items-center py-2">
                            <p class="font-medium text-blue-700 text-3xl mb-2">$1,500</p>
                            <p class="text-gray-800">/month</p>
                        </div>
                        <div class="flex flex-wrap justify-between items-center">
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">king_bed</span>
                                <p class="font-medium text-gray-700 text-sm">2 Beds</p>
                            </div>
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">bathtub</span>
                                <p class="font-medium text-gray-700 text-sm">2 Baths</p>
                            </div>
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">square_foot</span>
                                <p class="font-medium text-gray-700 text-sm">1,000 sqft</p>
                            </div>
                        </div>
                    </a>
                    <div class="flex flex-wrap items-center">
                        <a href="property-page" class="transition duration-500 ease-in-out flex justify-center items-center py-3 inline-block w-1/2 p-2 bg-gray-700 text-center text-white text-sm font-light hover:bg-gray-800">
                            <span class="material-icons text-sm inline mr-2 text-gray-400 icon-nav">info</span>
                            <p>View Details</p>
                        </a>
                        <a href="contact-us" class="transition duration-500 ease-in-out flex justify-center items-center py-3 inline-block w-1/2 p-2 bg-blue-700 text-center text-white text-sm font-light hover:bg-blue-800">
                            <span class="material-icons text-sm inline mr-2 text-gray-400 icon-nav">mark_email_read</span>
                            <p>Inquire Now</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
                <div class="w-full rounded overflow-hidden shadow-lg">
                    <div class="featured-img-container relative inline-block">
                        <img src="/static/property-listing/sample2.jpg" alt="Featured Image">
                    </div>
                    <a href="property-page" class="block px-6 py-4">
                        <p class="text-gray-800 text-lg capitalize leading-6">2603 W. Imperial Hwy, Inglewood, CA 90303</p>
                        <div class="flex justify-start items-center py-2">
                            <p class="font-medium text-blue-700 text-3xl mb-2">$1,500</p>
                            <p class="text-gray-800">/month</p>
                        </div>
                        <div class="flex flex-wrap justify-between items-center">
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">king_bed</span>
                                <p class="font-medium text-gray-700 text-sm">2 Beds</p>
                            </div>
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">bathtub</span>
                                <p class="font-medium text-gray-700 text-sm">2 Baths</p>
                            </div>
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">square_foot</span>
                                <p class="font-medium text-gray-700 text-sm">1,000 sqft</p>
                            </div>
                        </div>
                    </a>
                    <div class="flex flex-wrap items-center">
                        <a href="property-page" class="transition duration-500 ease-in-out flex justify-center items-center py-3 inline-block w-1/2 p-2 bg-gray-700 text-center text-white text-sm font-light hover:bg-gray-800">
                            <span class="material-icons text-sm inline mr-2 text-gray-400 icon-nav">info</span>
                            <p>View Details</p>
                        </a>
                        <a href="contact-us" class="transition duration-500 ease-in-out flex justify-center items-center py-3 inline-block w-1/2 p-2 bg-blue-700 text-center text-white text-sm font-light hover:bg-blue-800">
                            <span class="material-icons text-sm inline mr-2 text-gray-400 icon-nav">mark_email_read</span>
                            <p>Inquire Now</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
                <div class="w-full rounded overflow-hidden shadow-lg">
                    <div class="featured-img-container relative inline-block">
                        <img src="/static/property-listing/sample3.jpg" alt="Featured Image">
                    </div>
                    <a href="property-page" class="block px-6 py-4">
                        <p class="text-gray-800 text-lg capitalize leading-6">2603 W. Imperial Hwy, Inglewood, CA 90303</p>
                        <div class="flex justify-start items-center py-2">
                            <p class="font-medium text-blue-700 text-3xl mb-2">$1,500</p>
                            <p class="text-gray-800">/month</p>
                        </div>
                        <div class="flex flex-wrap justify-between items-center">
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">king_bed</span>
                                <p class="font-medium text-gray-700 text-sm">2 Beds</p>
                            </div>
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">bathtub</span>
                                <p class="font-medium text-gray-700 text-sm">2 Baths</p>
                            </div>
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">square_foot</span>
                                <p class="font-medium text-gray-700 text-sm">1,000 sqft</p>
                            </div>
                        </div>
                    </a>
                    <div class="flex flex-wrap items-center">
                        <a href="property-page" class="transition duration-500 ease-in-out flex justify-center items-center py-3 inline-block w-1/2 p-2 bg-gray-700 text-center text-white text-sm font-light hover:bg-gray-800">
                            <span class="material-icons text-sm inline mr-2 text-gray-400 icon-nav">info</span>
                            <p>View Details</p>
                        </a>
                        <a href="contact-us" class="transition duration-500 ease-in-out flex justify-center items-center py-3 inline-block w-1/2 p-2 bg-blue-700 text-center text-white text-sm font-light hover:bg-blue-800">
                            <span class="material-icons text-sm inline mr-2 text-gray-400 icon-nav">mark_email_read</span>
                            <p>Inquire Now</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
                <div class="w-full rounded overflow-hidden shadow-lg">
                    <div class="featured-img-container relative inline-block">
                        <img src="/static/property-listing/sample4.jpg" alt="Featured Image">
                    </div>
                    <a href="property-page" class="block px-6 py-4">
                        <p class="text-gray-800 text-lg capitalize leading-6">2603 W. Imperial Hwy, Inglewood, CA 90303</p>
                        <div class="flex justify-start items-center py-2">
                            <p class="font-medium text-blue-700 text-3xl mb-2">$1,500</p>
                            <p class="text-gray-800">/month</p>
                        </div>
                        <div class="flex flex-wrap justify-between items-center">
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">king_bed</span>
                                <p class="font-medium text-gray-700 text-sm">2 Beds</p>
                            </div>
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">bathtub</span>
                                <p class="font-medium text-gray-700 text-sm">2 Baths</p>
                            </div>
                            <div class="text-center">
                                <span class="material-icons text-gray-500 icon-amenities">square_foot</span>
                                <p class="font-medium text-gray-700 text-sm">1,000 sqft</p>
                            </div>
                        </div>
                    </a>
                    <div class="flex flex-wrap items-center">
                        <a href="property-page" class="transition duration-500 ease-in-out flex justify-center items-center py-3 inline-block w-1/2 p-2 bg-gray-700 text-center text-white text-sm font-light hover:bg-gray-800">
                            <span class="material-icons text-sm inline mr-2 text-gray-400 icon-nav">info</span>
                            <p>View Details</p>
                        </a>
                        <a href="contact-us" class="transition duration-500 ease-in-out flex justify-center items-center py-3 inline-block w-1/2 p-2 bg-blue-700 text-center text-white text-sm font-light hover:bg-blue-800">
                            <span class="material-icons text-sm inline mr-2 text-gray-400 icon-nav">mark_email_read</span>
                            <p>Inquire Now</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
