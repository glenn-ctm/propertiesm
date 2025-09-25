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
    <div class="p-4 bg-white shadow-sm">
        <form action="{{ is_null($property) ? route('properties.store') : route('properties.update', $property->id) }}" method="POST">
            @if($property)
                @method('PUT')
            @endif
            @csrf
            <div class="flex flex-col md:flex-row">
                <div class="w-full flex-1 mr-0 md:mr-3 my-2">
                    <label for="address" class="font-bold mt-3 text-gray-600 text-sm leading-8"> Address</label>
                    <input required value="{{ old('address', optional($property)->address) }}" id="address" name="address" type="text" name="address" placeholder="Address" class="bg-white flex border border-gray-200 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline">
                    <x-input-error for="address" class="mt-2" />
                </div>
                <div class="w-full flex-1 my-2">
                    <label for="description" class="font-bold mt-3 text-gray-600 text-sm leading-8"> Property Description</label>
                    <input required value="{{ old('description', optional($property)->description) }}" id="description" name="description" type="text" placeholder="Short description of the property here..." class="bg-white flex border border-gray-200 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline">
                    <x-input-error for="description" class="mt-2" />
                </div>
            </div>

            <div class="flex-row lg:flex my-5">
                <div class="w-full lg:flex-1 border border-gray-200 rounded appearance-none outline-none w-full text-gray-800 mr-0 md:mr-3">
                    <div class="px-3 py-2 font-bold text-gray-600 text-sm leading-8 bg-gray-100">Property Amenities</div>
                    <div class="bg-white border-t border-gray-200 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800">
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

                <div class="w-full lg:flex-1 border border-gray-200 rounded appearance-none outline-none w-full text-gray-800">
                    <div class="px-3 py-2 font-bold text-gray-600 text-sm leading-8 bg-gray-100">Regulations</div>
                    <div class="w-1/2 bg-white border-t border-gray-200 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800">
                        <div class="flex-row lg:flex items-stretch">
                            <div class="w-full lg:flex-1 text-left px-4 py-0 lg:py-2 m-0 lg:m-2">
                                {{-- TODO: save regulations data --}}
                                <x-regulation-radio-checkbox class="py-2" selected="{{ old('regulation.waterFieldFurniture', data_get(optional($property)->regulation, 'waterFieldFurniture')) }}" id="waterFieldFurniture" name="regulation[waterFieldFurniture]" label="Water Field Furniture" :values="['OK', 'Not Permitted']" />
                                <x-regulation-radio-checkbox class="py-2" selected="{{ old('regulation.lowIncome', data_get(optional($property)->regulation, 'lowIncome')) }}" id="lowIncome" name="regulation[lowIncome]" label="Low Income" :values="['OK', 'Not Permitted']" />
                            </div>

                            <div class="w-full lg:flex-1 text-left px-4 py-0 lg:py-2 m-0 lg:m-2">
                                <x-regulation-radio-checkbox class="py-2" selected="{{ old('regulation.sectionB', data_get(optional($property)->regulation, 'sectionB')) }}" id="sectionB" name="regulation[sectionB]" label="section 8" :values="['OK', 'Not Permitted']" />
                            </div>
                        </div>
                        <x-input-error for="regulation" class="mt-2" />
                    </div>
                </div>
            </div>

            <div class="flex-row md:flex">
                <div class="w-full md:w-1/4 my-3 mr-0 md:mr-3">
                    <label for="units" class="font-bold mt-3 text-gray-600 text-sm leading-8"> No. of Units</label>
                    <input required value="{{ old('number_of_units', optional($property)->number_of_units) }}" id="units" name="number_of_units" type="number" placeholder="" class="bg-white flex border border-gray-200 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline">
                    <x-input-error for="number_of_units" class="mt-2" />
                </div>
                <div class="w-full md:w-1/4 my-3 mr-0 md:mr-3">
                    <label for="rooms" class="font-bold mt-3 text-gray-600 text-sm leading-8"> Rooms</label>
                    <input required value="{{ old('rooms', optional($property)->rooms) }}" id="rooms" name="rooms" type="number" placeholder="" class="bg-white flex border border-gray-200 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline">
                    <x-input-error for="rooms" class="mt-2" />
                </div>
                <div class="w-full md:w-1/4 my-3 mr-0 md:mr-3">
                    <label for="bathrooms" class="font-bold mt-3 text-gray-600 text-sm leading-8"> Bathrooms</label>
                    <input required value="{{ old('bathrooms', optional($property)->bathrooms) }}" id="bathrooms" name="bathrooms" type="number" placeholder="" class="bg-white flex border border-gray-200 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline">
                    <x-input-error for="bathrooms" class="mt-2" />
                </div>
                <div class="w-full md:w-1/4 my-3">
                    <label for="sqft" class="font-bold mt-3 text-gray-600 text-sm leading-8"> Square Footage</label>
                    <input required value="{{ old('square_footage', optional($property)->square_footage) }}" id="sqft" name="square_footage" type="number" placeholder="" class="bg-white flex border border-gray-200 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline">
                    <x-input-error for="square_footage" class="mt-2" />
                </div>
            </div>

            <div class="my-3">
                <label for="pets" class="font-bold text-gray-600 text-sm leading-8"> Pets</label>
                <input required value="{{ old('pets', optional($property)->pets) }}" id="pets" name="pets" type="text" placeholder="Pets" class="bg-white flex border border-gray-200 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline">
                <x-input-error for="pets" class="mt-2" />
            </div>

            <div class="my-3">
                <label for="ownerPays" class="font-bold text-gray-600 text-sm leading-8"> Owner Pays</label>
                <input required value="{{ old('owner_pays', optional($property)->owner_pays) }}" id="ownerPays" name="owner_pays" type="number"   class="bg-white flex border border-gray-200 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline">
                <x-input-error for="owner_pays" class="mt-2" />
            </div>

            <div class="flex justify-between items-start">
                <div class="w-5/11 my-3 w-full">
                    <label for="rent" class="font-bold text-gray-600 text-sm leading-8"> Rent</label>
                    <div class="flex flex-wrap items-stretch w-full relative shadow-sm appearance-none border rounded w-full rounded">
                        <div class="flex">
                            <span class="flex items-center bg-gray-100 leading-normal bg-grey-lighter rounded rounded-r-none border-r px-4 py-2 whitespace-no-wrap text-gray-400">$</span>
                        </div>
                        <input required value="{{ old('rent', optional($property)->rent) }}" id="rent" name="rent" type="number" type="text" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1  px-3 py-2 relative leading-tight focus:outline-none focus:shadow-outline rounded-r">
                    </div>
                    <x-input-error for="rent" class="mt-2" />
                </div>
                <div class="w-1/11 mx-3 my-3 self-center pb-8 sm:pb-4">
                    <p class="text-4xl text-green-500">+</p>
                </div>
                <div class="w-5/11 my-3 w-full">
                    <label for="security" class="font-bold text-gray-600 text-sm leading-8"> Security</label>
                    <div class="flex flex-wrap items-stretch w-full relative shadow-sm appearance-none border rounded w-full rounded">
                        <div class="flex">
                            <span class="flex items-center bg-gray-100 leading-normal bg-grey-lighter rounded rounded-r-none border-r px-4 py-2 whitespace-no-wrap text-gray-400">$</span>
                        </div>
                        <input required value="{{ old('security', optional($property)->security) }}" id="security" name="security" type="number" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1  px-3 py-2 relative leading-tight focus:outline-none focus:shadow-outline rounded-r">
                    </div>
                    <x-input-error for="security" class="mt-2" />
                    <div class="mt-4">
                        <input @if( old('security_relief_available', optional($property)->security_relief_available) ) checked @endif id="securityRelief" name="security_relief_available" type="checkbox" class="form-checkbox">
                        <label for="securityRelief">Security Relief Available</label>
                        <x-input-error for="security_relief_available" class="mt-2" />
                    </div>
                </div>
            </div>

            <div class="">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="portal-id">
                    Select Images
                </label>

                @livewire('file-upload', [
                    'isMultiple' => true,
                    'accepts' => [ 'image/jpeg', 'image/png', 'image/gif' ],
                    'model' => $property
                ])
            </div>

            <div class="my-4">
                <label for="comment" class="block text-gray-700 text-sm font-bold mb-2" for="portal-id">
                    Comments
                </label>
                <textarea required id="comment" name="comment" rows="6" class="bg-white border w-full text-gray-700 px-3 py-2 border rounded focus:outline-none focus:shadow-outline">{{ old('comment', optional($property)->comment) }}</textarea>
                <x-input-error for="comment" class="mt-2" />
            </div>

            <div class="my-4">
                <label for="property_owners" class="block text-gray-700 text-sm font-bold mb-2" for="portal-id">
                    Property Owner
                </label>
                <select name="user_id" id="property_owner">
                    <option value="">Select option</option>
                    @foreach ($property_owners as $po)
                        <option @if( old('user_id', optional($property)->owner_id) === $po->id  ) selected @endif value="{{ $po->id }}">{{ $po->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="user_id" class="mt-2" />
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
