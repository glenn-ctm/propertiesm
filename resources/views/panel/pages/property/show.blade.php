@extends('layouts.panel')

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
                @foreach ($property->getMedia() as $index => $image)
                    @if ($index === 0)
                        <a class="grid__item grid__item--lg col-span-2 row-span-2 relative block w-full h-full bg-grey-dark bg-no-repeat bg-center bg-cover" href="{{ $image->getUrl() }}" style="background-image: url('{{ $image->getUrl('medium') }}');"></a>
                    @elseif ($index === 1)
                        <a class="grid__item grid__item--sm block w-full h-full bg-grey-dark bg-no-repeat bg-center bg-cover" href="{{ $image->getUrl() }}" style="background-image: url('{{ $image->getUrl('medium') }}');"></a>
                    @elseif ($index === 2)
                        <a class="grid__item grid__item--sm block w-full h-full bg-grey-dark bg-no-repeat bg-center bg-cover" href="{{ $image->getUrl() }}" style="background-image: url('{{ $image->getUrl('medium') }}');"></a>
                    @elseif ($index === 3)
                        <a class="grid__item grid__item--db col-span-2 block w-full h-full bg-grey-dark bg-no-repeat bg-center bg-cover" href="{{ $image->getUrl() }}" style="background-image: url('{{ $image->getUrl('medium') }}');"></a>
                    @else
                        <a class="hidden grid__item grid__item--db col-span-2 block w-full h-full bg-grey-dark bg-no-repeat bg-center bg-cover" href="{{ $image->getUrl() }}" style="background-image: url('{{ $image->getUrl('medium') }}');"></a>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="property-content mt-5">
            <div class="flex flex-wrap md:flex-row">
                <div class="w-full">
                    <div class="bg-white shadow-lg rounded py-10 px-8">
                        <p class="font-medium text-blue-700 text-3xl mb-2">{{ $property->full_address }}</p>
                        <p class="leading-7 my-6">{{ $property->description }}</p>
                        <div class="w-full">
                            <div class="my-6">
                                <div class="flex primary-text-color mb-4 border-b-2 border-gray-200 pb-2 mr-8">
                                    <p class="uppercase font-semibold">General</p>
                                </div>
                                <div class="flex">
                                    <ul class="leading-10 flex-1">
                                        <li>
                                            <span class="w-32 inline-block">Bedrooms:</span>
                                            <span class="font-semibold">{{ $property->rooms }}</span>
                                        </li>
                                        <li>
                                            <span class="w-32 inline-block">Bathrooms:</span>
                                            <span class="font-semibold">{{ $property->bathrooms }}</span>
                                        </li>
                                        <li>
                                            <span class="w-32 inline-block">Square Footage:</span>
                                            <span class="font-semibold">{{ $property->square_footage }} sqft.</span>
                                        </li>
                                        <li>
                                            <span class="w-32 inline-block">No. of Units:</span>
                                            <span class="font-semibold">{{ $property->number_of_units }}</span>
                                        </li>
                                    </ul>
                                    <ul class="leading-10 flex-1">
                                        <li>
                                            <span class="w-32 inline-block">Owner Pays:</span>
                                            <span class="font-semibold">${{ $property->owner_pays }}</span>
                                        </li>
                                        <li>
                                            <span class="w-32 inline-block">Rent:</span>
                                            <span class="font-semibold">${{ $property->rent }}</span>
                                        </li>
                                        <li>
                                            <span class="w-32 inline-block">Security:</span>
                                            <span class="font-semibold">${{ $property->security }}</span>
                                        </li>
                                        @if ($property->security_relief_available)
                                            <li>
                                                <span class="w-100 inline-block"><span class="text-red-500 text-xl">*</span>Security Relief Available</span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="w-full">
                                <div class="my-6">
                                    <div class="flex primary-text-color mb-4 border-b-2 border-gray-200 pb-2 mr-8">
                                        <p class="uppercase font-semibold">Property Amenities</p>
                                    </div>
                                    <ul class="list-circle ml-4 leading-10">
                                        @foreach ($property->amenities as $value)
                                            <li>{{ $value }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="w-full">
                                <div class="my-6">
                                    <div class="flex primary-text-color mb-4 border-b-2 border-gray-200 pb-2 mr-8">
                                        <p class="uppercase font-semibold">Regulations</p>
                                    </div>
                                    <ul class="leading-10">
                                        @foreach ($property->regulation as $name => $value)
                                            <li class="capitalize">{{ implode ( ' ', preg_split('/(?=[A-Z])/', $name) ) }} — <span class="font-semibold">{{ $value }}</span></li>
                                        @endforeach
                                        <li>Pets — <span class="font-semibold">{{ $property->pets }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('properties.edit', $property->id) }}" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:shadow-outline">Edit</a>
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
