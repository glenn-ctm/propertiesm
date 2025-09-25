@extends('layouts.panel', [ 'useFileUploadAssets' => true ])

@php
    $property = isset($property) ? $property : null;
@endphp

@push('css')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('content')
    <div class="w-full md:w-1/2 lg:w-1/2 px-2 mb-4">
        <h1 class="text-3xl text-black">{{ is_null($property) ? 'Create Property' : 'Edit Property' }}</h1>
    </div>
    <div class="p-8 bg-white shadow-sm">
    <form action="{{ is_null($property) ? route('properties.store') : route('properties.update', $property->id) }}" method="POST">
            @if($property)
                @method('PUT')
            @endif
            @csrf
            <div class="flex flex-col md:flex-row">
                <div class="w-full lg:w-1/2 mr-6">
                    <div class="flex-1 pb-3">
                        <label for="address" class="mt-3 text-gray-800 text-sm leading-8"> Address <span class="text-sm font-thin text-gray-400 pl-1">(Apt/Property Name, Street Number, Street Name)</span></label>
                        <input required value="{{ old('address', optional($property)->address) }}" id="address" name="address" type="text" name="address" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                        <x-input-error for="address" class="mt-2" />
                    </div>

                    <div class="flex items-center pb-3">
                        <div class="flex-1 mr-4">
                            <label for="city" class="mt-3 text-gray-800 text-sm leading-8"> City</label>
                            <input required value="{{ old('city', optional($property)->city) }}" id="city" name="city" type="text" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                            <x-input-error for="city" class="mt-2" />
                        </div>
                        <div class="flex-1">
                            <label for="zipCode" class="mt-3 text-gray-800 text-sm leading-8"> ZIP</label>
                            <input required value="{{ old('zip_code', optional($property)->zip_code) }}" id="zipCode" name="zip_code" type="number" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                            <x-input-error for="zipCode" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center pb-3">
                        <div class="flex-1 mr-4">
                            <label for="units" class="mt-3 text-gray-800 text-sm leading-8"> No. of Unit</label>
                            <input required value="{{ old('number_of_units', optional($property)->number_of_units) }}" id="units" name="number_of_units" type="number" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                            <x-input-error for="number_of_units" class="mt-2" />
                        </div>
                        <div class="flex-1">
                            <label for="rooms" class="mt-3 text-gray-800 text-sm leading-8"> Bedrooms</label>
                            <input required value="{{ old('rooms', optional($property)->rooms) }}" id="rooms" name="rooms" type="number" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                            <x-input-error for="rooms" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center pb-3">
                        <div class="flex-1 mr-4">
                            <label for="bathrooms" class="mt-3 text-gray-800 text-sm leading-8"> Bathrooms</label>
                            <input required value="{{ old('bathrooms', optional($property)->bathrooms) }}" id="bathrooms" name="bathrooms" type="number" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                            <x-input-error for="bathrooms" class="mt-2" />
                        </div>
                        <div class="flex-1">
                            <label for="sqft" class="mt-3 text-gray-800 text-sm leading-8"> Square Footage</label>
                            <input required value="{{ old('square_footage', optional($property)->square_footage) }}" id="sqft" name="square_footage" type="number" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                            <x-input-error for="square_footage" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex-1 pb-3">
                        <label for="pets" class="mt-3 text-gray-800 text-sm leading-8"> Pets</label>
                        <input required value="{{ old('pets', optional($property)->pets) }}" id="pets" name="pets" type="text" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                        <x-input-error for="pets" class="mt-2" />
                    </div>

                    <div class="flex-1 pb-3">
                        <label for="ownerPays" class="mt-3 text-gray-800 text-sm leading-8"> Owner Pays</label>
                        <input required value="{{ old('owner_pays', optional($property)->owner_pays) }}" id="ownerPays" name="owner_pays" type="text"   class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                        <x-input-error for="owner_pays" class="mt-2" />
                    </div>

                    <div class="flex justify-between items-start">
                        <div class="w-5/11 my-3 w-full">
                            <label for="rent" class="mt-3 text-gray-800 text-sm leading-8"> Rent</label>
                            <div class="flex flex-wrap items-stretch w-full relative shadow-sm appearance-none border rounded w-full rounded">
                                <div class="flex">
                                    <span class="flex items-center bg-white leading-normal bg-grey-lighter rounded rounded-r-none border-r px-4 py-2 whitespace-no-wrap text-gray-400">$</span>
                                </div>
                                <input required value="{{ old('rent', optional($property)->rent) }}" id="rent" name="rent" type="number" type="text" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1  px-3 py-2 relative leading-tight focus:outline-none focus:shadow-outline rounded-r bg-gray-100 focus:bg-white">
                            </div>
                            <x-input-error for="rent" class="mt-2" />
                        </div>
                        <div class="w-1/11 mx-3 my-3 self-center pb-8 sm:pb-4">
                            <p class="text-4xl text-green-500">+</p>
                        </div>
                        <div class="w-5/11 my-3 w-full">
                            <label for="security" class="mt-3 text-gray-800 text-sm leading-8"> Security</label>
                            <div class="flex flex-wrap items-stretch w-full relative shadow-sm appearance-none border rounded w-full rounded">
                                <div class="flex">
                                    <span class="flex items-center bg-white leading-normal bg-grey-lighter rounded rounded-r-none border-r px-4 py-2 whitespace-no-wrap text-gray-400">$</span>
                                </div>
                                <input required value="{{ old('security', optional($property)->security) }}" id="security" name="security" type="number" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1  px-3 py-2 relative leading-tight focus:outline-none focus:shadow-outline rounded-r bg-gray-100 focus:bg-white">
                            </div>
                            <x-input-error for="security" class="mt-2" />
                            <div class="mt-4">
                                <input @if( old('security_relief_available', optional($property)->security_relief_available) ) checked @endif id="securityRelief" name="security_relief_available" type="checkbox" class="form-checkbox">
                                <label for="securityRelief">Security Relief Available</label>
                                <x-input-error for="security_relief_available" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/2">
                    <div class="my-5">
                        <div class="border rounded border-gray-200 mx-2 px-4 pb-6 my-8">
                            <div class="flex flex-wrap items-center ml-2 mb-2 -mt-7">
                                <span class="uppercase mt-3 px-2 bg-white text-gray-700 leading-8 font-semibold">
                                    Property Amenities
                                </span>
                            </div>
                            <div class="bg-white border-gray-200 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800">
                                <div class="md:grid grid-cols-6 gap-4">
                                    @foreach ($available_amenities as $index => $item)
                                        <div class="py-2 col-span-3">
                                            <input
                                                @if ( in_array( $item, old('amenities', optional($property)->amenities ?? []) ) )
                                                    checked
                                                @endif
                                                id="amenities_{{ $index }}" name="amenities[]" type="checkbox" class="form-checkbox" value="{{ $item }}">
                                            <label for="amenities_{{ $index }}"> {{ $item }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <x-input-error for="amenities" class="mt-2" />
                            </div>
                        </div>

                        <div class="border rounded border-gray-200 mx-2 px-4 pb-6 mt-8">
                            <div class="flex flex-wrap items-center ml-2 mb-2 -mt-7">
                                <span class="uppercase mt-3 px-2 bg-white text-gray-700 leading-8 font-semibold">
                                    Regulations
                                </span>
                            </div>
                            <div class="w-1/2 bg-white border-gray-200 rounded appearance-none outline-none w-full text-gray-800">
                                <div class="flex-row lg:flex items-stretch">
                                    <div class="w-full lg:flex-1 text-left">
                                        {{-- TODO: save regulations data --}}
                                        <x-regulation-radio-checkbox class="py-2" selected="{{ old('regulation.waterFieldFurniture', data_get(optional($property)->regulation, 'waterFieldFurniture')) }}" id="waterFieldFurniture" name="regulation[waterFieldFurniture]" label="Water Field Furniture" :values="['OK', 'Not Permitted']" />
                                        <x-regulation-radio-checkbox class="py-2" selected="{{ old('regulation.lowIncome', data_get(optional($property)->regulation, 'lowIncome')) }}" id="lowIncome" name="regulation[lowIncome]" label="Low Income" :values="['OK', 'Not Permitted']" />
                                        <x-regulation-radio-checkbox class="py-2" selected="{{ old('regulation.sectionB', data_get(optional($property)->regulation, 'sectionB')) }}" id="sectionB" name="regulation[sectionB]" label="Section 8" :values="['OK', 'Not Permitted']" />
                                    </div>
                                </div>
                                 <x-input-error for="regulation" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full">
                <div class="flex-1 pb-3">
                    <label for="description" class="mt-3 text-gray-800 text-sm leading-8"> Property Description</label>
                    <textarea required id="description" name="description" rows="4" type="text" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">{{ old('description', optional($property)->description) }}</textarea>
                    <x-input-error for="description" class="mt-2" />
                </div>

                <div class="flex-1 pb-3">
                    <label for="comment" class="mt-3 text-gray-800 text-sm leading-8">
                        Admin Comment/s
                    </label>
                    <textarea required id="comment" name="comment" rows="4" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">{{ old('comment', optional($property)->comment) }}</textarea>
                    <x-input-error for="comment" class="mt-2" />
                </div>

                <div class="pb-3 w-1/2">
                    <label for="property_owners" class="mt-3 text-gray-800 text-sm leading-8">
                        Property Owner
                    </label>
                    <div class="relative">
                        <select name="user_id" id="property_owner" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                            <option value="">Select option</option>
                            @foreach ($property_owners as $po)
                                <option @if( old('user_id', optional($property)->owner_id) == $po->id  ) selected @endif value="{{ $po->id }}">{{ $po->name }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83 c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25 L17.418,6.109z"></path>
                            </svg>
                        </div>
                    </div>
                    <x-input-error for="user_id" class="mt-2" />
                </div>
            </div>

            <div class="flex-1 pb-3">
                <label class="mt-3 text-gray-800 text-sm leading-8" for="portal-id">
                    Select Images
                </label>

                @livewire('file-upload', [
                    'isMultiple' => true,
                    'accepts' => [ 'image/jpeg', 'image/png', 'image/gif' ],
                    'model' => $property
                ])
            </div>

            <div class="flex p-2 mt-4">
                <div class="flex-auto flex flex-row-reverse">
                    <a class="text-center bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2" href="{{ url()->previous() }}">Cancel</a>
                    <input type="submit" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                </div>
            </div>
        </form>
    </div>
@endsection
