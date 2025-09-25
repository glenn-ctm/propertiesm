@extends('layouts.site')

@push('css')
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@1.9.0/dist/css/lightgallery.css" />
<style>
.property-page .subtitles::before {
    content: '';
    position: relative;
    display: inline-block;
    background-color: #4786e5;
    width: 4px;
    height: 2px;
    bottom: 3.8px;
    padding-left: 30px;
    margin-right: 8px;
}
.property-page .list-circle {
    list-style-type: circle;
}
/* Image Gallery */
.property-page .lg-actions .lg-prev::after {
  content: '←';
}
.property-page .lg-actions .lg-next::before {
  content: '→';
}

.property-page .lg-toolbar .lg-close::after {
  content: '✖';
}

.property-page a#lg-download {
  display: none;
}

:root {
  --wrapper: calc(100vw - ( 2 * var(--gutter)));
  --noOfColumns: 2;
  --noOfGutters: calc(var(--noOfColumns) - 1);
  --ratioA: 16;
  --ratioB: 9;
  --factor: calc(var(--ratioB) / var(--ratioA));
  --rh: calc(( (var(--wrapper) - (var(--noOfGutters) * var(--gutter)))
  	/ var(--noOfColumns)) * var(--factor));
}
@media (min-width: 60em) {
  :root {
    --wrapper: 60em;
    --gutter: 20px;
    --noOfColumns: 4;
    --ratioA: 1;
    --ratioB: 1;
  }
}

.property-page  .grid {
  max-width: 100%;
  display: grid;
  grid-template-columns: repeat(var(--noOfColumns), minmax(0, 1fr));
  grid-auto-flow: dense;
  grid-auto-rows: minmax(var(--rh), auto);
}


@media (min-width: 60em) {
    .property-page .grid__item--right {
    grid-column: 3 / span 2;
  }
}

@media (min-width: 60em) {
    .property-page .grid__item--db {
    background-color: transparent;
    padding: 0;
  }
}

@media (max-width:959px) {
    .property-page .h-full {
        height: 300px;
    }
}
</style>
@endpush

@section('content')
<div class="property-page text-gray-700">
    <div class="container m-auto">
        <div class="property-img-gallery h-full bg-gray-400">
            <div class="grid" id="lightgallery">
                <a class="grid__item grid__item--lg col-span-2 row-span-2 relative block w-full h-full bg-grey-dark bg-no-repeat bg-center bg-cover" href="/static/property-listing/sample4.jpg" style="background-image: url(/static/property-listing/sample4.jpg);">
                </a>
                <a class="grid__item grid__item--sm block w-full h-full bg-grey-dark bg-no-repeat bg-center bg-cover" href="/static/property-listing/sample5.jpg" style="background-image: url(/static/property-listing/sample5.jpg);">
                </a>
                <a class="grid__item grid__item--sm block w-full h-full bg-grey-dark bg-no-repeat bg-center bg-cover" href="/static/property-listing/sample6.jpg" style="background-image: url(/static/property-listing/sample6.jpg);">
                </a>
                <a class="grid__item grid__item--db col-span-2 block w-full h-full bg-grey-dark bg-no-repeat bg-center bg-cover" href="/static/property-listing/sample7.jpg" style="background-image: url(/static/property-listing/sample7.jpg);">
                </a>

                <a class="hidden grid__item grid__item--db col-span-2 block w-full h-full bg-grey-dark bg-no-repeat bg-center bg-cover" href="/static/property-listing/sample8.jpg" style="background-image: url(/static/property-listing/sample8.jpg);">
                </a>
                <a class="hidden grid__item grid__item--db col-span-2 block w-full h-full bg-grey-dark bg-no-repeat bg-center bg-cover" href="/static/property-listing/sample9.jpg" style="background-image: url(/static/property-listing/sample9.jpg);">
                </a>
                <a class="hidden grid__item grid__item--db col-span-2 block w-full h-full bg-grey-dark bg-no-repeat bg-center bg-cover" href="/static/property-listing/sample10.jpg" style="background-image: url(/static/property-listing/sample10.jpg);">
                </a>
                <a class="hidden grid__item grid__item--db col-span-2 block w-full h-full bg-grey-dark bg-no-repeat bg-center bg-cover" href="/static/property-listing/sample11.jpg" style="background-image: url(/static/property-listing/sample11.jpg);">
                </a>
            </div>
        </div>
        <div class="property-content">
            <div class="flex flex-wrap md:flex-row">
                <div class="w-full order-last md:order-first md:w-1/2  lg:w-2/3">
                    <div class="bg-white py-10 px-8">
                        <p class="font-medium text-blue-700 text-3xl mb-2">2603 W. Imperial Hwy, Inglewood, CA 90303</p>
                        <p class="leading-7 my-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas provident odit deserunt deleniti dolorem repellat culpa amet beatae ipsa rerum minima, perspiciatis distinctio quibusdamet Laudantium, aspernatur. Libero dolores ducimus laudantium.</p>
                        <div class="w-full">
                            <div class="my-6">
                                <div class="flex primary-text-color mb-4 border-b-2 border-gray-200 pb-3 mr-8">
                                    <span class="material-icons mr-1 text-md">info</span>
                                    <p class="uppercase font-semibold">General</p>
                                </div>
                                <div class="flex">
                                    <ul class="leading-10 flex-1">
                                        <li>
                                            <span class="w-32 inline-block">Rooms:</span>
                                            <span class="font-semibold">2 Beds</span>
                                        </li>
                                        <li>
                                            <span class="w-32 inline-block">Bathrooms:</span>
                                            <span class="font-semibold">2 Baths</span>
                                        </li>
                                        <li>
                                            <span class="w-32 inline-block">Square Footage:</span>
                                            <span class="font-semibold">1,000 sqft.</span>
                                        </li>
                                        <li>
                                            <span class="w-32 inline-block">No. of Units:</span>
                                            <span class="font-semibold">50</span>
                                        </li>
                                    </ul>
                                    <ul class="leading-10 flex-1">
                                        <li>
                                            <span class="w-32 inline-block">Onwner Pays:</span>
                                            <span class="font-semibold">$1000</span>
                                        </li>
                                        <li>
                                            <span class="w-32 inline-block">Rent:</span>
                                            <span class="font-semibold">$500</span>
                                        </li>
                                        <li>
                                            <span class="w-32 inline-block">Security:</span>
                                            <span class="font-semibold">$500</span>
                                        </li>
                                        <li>
                                            <span class="w-100 inline-block"><span class="text-red-500 text-xl">*</span>Security Relief Available</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="w-full">
                                <div class="my-6">
                                    <div class="flex primary-text-color mb-4 border-b-2 border-gray-200 pb-3 mr-8">
                                        <span class="material-icons mr-1 text-md">apartment</span>
                                        <p class="uppercase font-semibold">Property Amenities</p>
                                    </div>
                                    <ul class="list-circle ml-4 leading-10">
                                        <li>Downstairs Unit</li>
                                        <li>Upstairs Unit</li>
                                        <li>Washer/Dryer Hook Up</li>
                                        <li>Community Laundry</li>
                                        <li>Parking Place</li>
                                        <li>Exterior Storage</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="w-full">
                                <div class="my-6">
                                    <div class="flex primary-text-color mb-4 border-b-2 border-gray-200 pb-3 mr-8">
                                        <span class="material-icons mr-1 text-md">fact_check</span>
                                        <p class="uppercase font-semibold">Regulations</p>
                                    </div>
                                    <ul class="leading-10">
                                        <li>Water Field Furniture — <span class="font-semibold">NOT PERMITTED</span></li>
                                        <li>Low Income — <span class="font-semibold">OK</span></li>
                                        <li>Section 3 — <span class="font-semibold">OK</span></li>
                                        <li>Pets — <span class="font-semibold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus placeat molestiae.</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="w-full order-first  md:order-last md:w-1/2 lg:w-1/3 bg-gray-200">
                    <div class="flex-row items-center text-center py-8 sm:py-16 px-8">
                        <div>
                            <p class="uppercase text-lg text-gray-700">Owner Pays</p>
                            <p class="font-medium text-blue-700 text-5xl mb-2">$1,500</p>
                        </div>
                        <div class="flex flex-wrap justify-center items-center mt-6">
                            <div class="text-center px-6">
                                <span class="material-icons text-gray-500 text-4xl">king_bed</span>
                                <p class="font-medium text-gray-700 text-sm">2 Beds</p>
                            </div>
                            <div class="text-center px-6 -mr-3">
                                <span class="material-icons text-gray-500 text-4xl">bathtub</span>
                                <p class="font-medium text-gray-700 text-sm">2 Baths</p>
                            </div>
                            <div class="text-center px-6">
                                <span class="material-icons text-gray-500 text-4xl">square_foot</span>
                                <p class="font-medium text-gray-700 text-sm">1,000 sqft</p>
                            </div>
                        </div>
                        <div class="mt-10 text-center flex justify-center">
                            <a href="contact-us" class="transition duration-500 ease-in-out flex justify-center items-center rounded py-3 px-20 inline-block primary-bg-color text-center text-white font-light hover:bg-red-700">
                                <span class="material-icons text-base inline mr-2 text-gray-400">mark_email_read</span>
                                <p>Inquire Now</p>
                            </a>
                        </div>
                        <div class="mt-5 text-center">
                            <a href="Tel: (555) 555-1234" class="transition duration-500 ease-in-out flex justify-center items-center inline-block text-center text-gray-700 text-lg">
                                <p>Call us now at <span class="font-semibold">562-535-6332!</span></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/lightgallery@1.9.0/dist/js/lightgallery.min.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
<script type="text/javascript">
      lightGallery(document.getElementById('lightgallery'));
    </script>
@endpush
