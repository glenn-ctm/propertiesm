@extends('layouts.panel')

@push('css')
<style>
.inputGroup input:checked ~ label {
    border: 1px solid #54E0C7;
}
.inputGroup label:before {
    width: 14px;
    height: 10px;
    border-radius: 50%;
    content: "";
    background-color: #e4fffa;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%) scale3d(1, 1, 1);
    transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
    opacity: 0;
    z-index: -1;
}
.inputGroup label:after {
    width: 28px;
    height: 28px;
    content: "";
    border: 2px solid #D1D7DC;
    background-color: #fff;
    background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
    background-repeat: no-repeat;
    background-position: .75px 1.5px;
    border-radius: 50%;
    z-index: 2;
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    transition: all 200ms ease-in;
}
.inputGroup input:checked ~ label:before {
  transform: translate(-50%, -50%) scale3d(56, 56, 1);
  opacity: 1;
}
.inputGroup input:checked ~ label:after {
  background-color: #54E0C7;
  border-color: #54E0C7;
}
.inputGroup input {
  z-index: 2;
  position: absolute;
  right: 30px;
  top: 50%;
  transform: translateY(-50%);
}

</style>
@endpush

@section('content')
<div class="w-full md:w-1/2 lg:w-1/2 px-2 mb-5">
    <h1 class="text-3xl text-black">Edit Property</h1>
</div>
<div>
<form  wire:submit.prevent="update" class="p-7 bg-white shadow-lg w-full">
        <div class="flex-column lg:flex">
            <div class="w-full lg:w-1/2 mr-6">
                <div class="flex-1 m-2 pb-2">
                    <label class="mt-3 text-gray-800 text-sm leading-8" for="address">
                        Address:
                    </label>
                    <input wire:model.defer="property.address" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="address" type="text">
                    <x-input-error for="property.address" class="mt-2" />
                </div>


                <div class="flex items-center mb-2">
                    <div class="flex-1 m-2">
                        <label class="mt-3 text-gray-800 text-sm leading-8" for="units">
                            No. of Units:
                        </label>
                        <input type="number" wire:model.defer="property.number_of_units" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="units" name="units">
                        <x-input-error for="property.number_of_units" class="mt-2" />
                    </div>
                    <div class="flex-1 m-2">
                        <label class="mt-3 text-gray-800 text-sm leading-8" for="rooms">
                            Rooms:
                        </label>
                        <input type="number" wire:model.defer="property.rooms"  class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="rooms">
                        <x-input-error for="property.rooms" class="mt-2" />
                    </div>
                </div>

                <div class="flex items-center mb-2">
                    <div class="flex-1 m-2">
                        <label class="mt-3 text-gray-800 text-sm leading-8" for="bath">
                            Bathrooms:
                        </label>
                        <input type="number" wire:model.defer="property.bathrooms" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="bath">
                        <x-input-error for="property.bathrooms" class="mt-2" />
                    </div>
                    <div class="flex-1 m-2">
                        <label class="mt-3 text-gray-800 text-sm leading-8" for="sqft">
                            Square Footage:
                        </label>
                        <input type="number" wire:model.defer="property.square_footage" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="sqft">
                        <x-input-error for="property.square_footage" class="mt-2" />
                    </div>
                </div>

                <div class="flex flex-wrap items-center mx-2 mb-4">
                    <label class="mt-3 text-gray-800 text-sm leading-8" for="pets">Pets:</label>
                    <input wire:model.defer="property.pets"  class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="pets" type="text">
                    <x-input-error for="property.pets" class="mt-2" />
                </div>

                <div class="mx-2 mb-4">
                    <label for="ownerPays" class="mt-3 text-gray-800 text-sm leading-8">Owner Pays:</label>
                    <input id="ownerPays" wire:model.defer="property.owner_pays" type="text"   class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                    <x-input-error for="property.owner_pays" class="mt-2" />
                </div>

            <div class="flex justify-between items-start">
                <div class="w-5/11 mx-2 mb-4 w-full">
                    <label for="rent" class="mt-3 text-gray-800 text-sm leading-8"> Rent:</label>
                    <div class="flex flex-wrap items-stretch w-full relative shadow-sm appearance-none border rounded w-full rounded">
                        <div class="flex">
                            <span class="flex items-center bg-white leading-normal bg-grey-lighter rounded rounded-r-none border-r px-4 py-2 whitespace-no-wrap text-gray-400">$</span>
                        </div>
                        <input id="rent" wire:model.defer="property.rent" type="number" type="text" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1  px-3 py-2 relative leading-tight focus:outline-none focus:shadow-outline rounded-r bg-gray-100 focus:bg-white">
                    </div>
                    <x-input-error for="property.rent" class="mt-2" />
                </div>
                <div class="w-1/11 mx-2 mb-4 self-center pb-8 sm:pb-4">
                    <p class="text-4xl text-green-500">+</p>
                </div>
                <div class="w-5/11 mx-2 mb-4 w-full">
                    <label for="security" class="mt-3 text-gray-800 text-sm leading-8"> Security:</label>
                    <div class="flex flex-wrap items-stretch w-full relative shadow-sm appearance-none border rounded w-full rounded">
                        <div class="flex">
                            <span class="flex items-center bg-white leading-normal bg-grey-lighter rounded rounded-r-none border-r px-4 py-2 whitespace-no-wrap text-gray-400">$</span>
                        </div>
                        <input id="security" wire:model.defer="property.security" type="number" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1  px-3 py-2 relative leading-tight focus:outline-none focus:shadow-outline rounded-r bg-gray-100 focus:bg-white">
                    </div>
                    <x-input-error for="property.security" class="mt-2" />
                    <div class="mt-4">
                        <input name="securityRelief" id="securityRelief" wire:model.defer="property.security_relief_available" type="checkbox" class="form-checkbox h-4 w-4">
                        <label for="securityRelief">Security Relief Available</label>
                        <x-input-error for="property.security_relief_available" class="mt-2" />
                    </div>
                </div>
            </div>

            </div>

            <div class="w-full lg:w-1/2">
                <div class="border rounded border-gray-200 mx-2 px-4 pb-6 my-8">
                    <div class="flex flex-wrap items-center ml-2 mb-2 -mt-7">
                        <span class="uppercase mt-3 px-2 bg-white text-gray-700 leading-8 font-semibold">
                            Property Amenities
                        </span>
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        {{-- TODO: --}}
                        {{-- @foreach ($available_aminities as $index => $item)
                        <div class="inputGroup flex-1 bg-white block my-1 mx-1 relative">
                            <input id="amenities_{{ $index }}" wire:model.defer="property.amenities" name="option1" type="checkbox" class="h-8 w-8 order-1 cursor-pointer invisible" value="{{ $item }}"/>
                            <label for="amenities_{{ $index }}" class="py-2 px-7 w-100 block text-left text-gray-700 cursor-pointer relative z-10 transition-11 duration-300 ease-in overflow-hidden border border-2 border-gray-300 rounded">{{ $item }}</label>
                        </div>
                        @endforeach --}}
                        <x-input-error for="property.amenities" class="mt-2" />
                    </div>
                </div>

                <div class="border rounded border-gray-200 mx-2 px-4 pb-6 mt-8">
                    {{-- TODO: save regulations data --}}
                    <div class="flex flex-wrap items-center ml-2 mb-2 -mt-7">
                        <span class="uppercase mt-3 px-2 bg-white text-gray-700 leading-8 font-semibold">
                            Regulations
                        </span>
                    </div>

                    <p class="my-2 mx-1 mr-2 text-center">Water Field Funiture</p>
                    <div class="flex items-center">
                        <div class="inputGroup flex-1 bg-white block my-2 mx-1 relative">
                            <input id="okay1" name="wff" type="radio" class="h-8 w-8 order-1 cursor-pointer invisible"/>
                            <label for="okay1" class="py-2 px-7 w-100 block text-left text-gray-700 cursor-pointer relative z-10 transition-11 duration-300 ease-in overflow-hidden border border-2 border-gray-300 rounded">Okay</label>
                        </div>
                        <div class="inputGroup flex-1 bg-white block my-2 mx-1 relative">
                            <input id="np1" name="wff" type="radio" class="h-8 w-8 order-1 cursor-pointer invisible"/>
                            <label for="np1" class="py-2 px-7 w-100 block text-left text-gray-700 cursor-pointer relative z-10 transition-11 duration-300 ease-in overflow-hidden border border-2 border-gray-300 rounded">Not Permitted</label>
                        </div>
                    </div>

                    <p class="my-2 mx-1 mr-2 text-center">Low Income</p>
                    <div class="flex items-center">
                        <div class="inputGroup flex-1 bg-white block my-2 mx-1 relative">
                            <input id="okay2" name="lowIncome" type="radio" class="h-8 w-8 order-1 cursor-pointer invisible"/>
                            <label for="okay2" class="py-2 px-7 w-100 block text-left text-gray-700 cursor-pointer relative z-10 transition-11 duration-300 ease-in overflow-hidden border border-2 border-gray-300 rounded">Okay</label>
                        </div>

                        <div class="inputGroup flex-1 bg-white block my-2 mx-1 relative">
                            <input id="np2" name="lowIncome" type="radio" class="h-8 w-8 order-1 cursor-pointer invisible"/>
                            <label for="np2" class="py-2 px-7 w-100 block text-left text-gray-700 cursor-pointer relative z-10 transition-11 duration-300 ease-in overflow-hidden border border-2 border-gray-300 rounded">Not Permitted</label>
                        </div>
                    </div>

                    <p class="my-2 mx-1 mr-2 text-center">Section 3</p>
                    <div class="flex items-center">
                        <div class="inputGroup flex-1 bg-white block my-2 mx-1 relative">
                            <input id="okay3" name="sectionB" type="radio" class="h-8 w-8 order-1 cursor-pointer invisible"/>
                            <label for="okay3" class="py-2 px-7 w-100 block text-left text-gray-700 cursor-pointer relative z-10 transition-11 duration-300 ease-in overflow-hidden border border-2 border-gray-300 rounded">Okay</label>
                        </div>

                        <div class="inputGroup flex-1 bg-white block my-2 mx-1 relative">
                            <input id="np3" name="sectionB" type="radio" class="h-8 w-8 order-1 cursor-pointer invisible"/>
                            <label for="np3" class="py-2 px-7 w-100 block text-left text-gray-700 cursor-pointer relative z-10 transition-11 duration-300 ease-in overflow-hidden border border-2 border-gray-300 rounded">Not Permitted</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="mx-2 mb-4">
                <label class="mt-3 text-gray-800 text-sm leading-8" for="portal-id">
                    Select Files:
                </label>
                <input type="file" class="bg-gray-100 focus:bg-white border w-full text-gray-700 px-3 py-2 border rounded focus:outline-none focus:shadow-outline">
            </div>

            <div class="mx-2 mb-4">
                <label class="mt-3 text-gray-800 text-sm leading-8" for="propertyDesc">
                    Property Description:
                </label>
                <textarea wire:model.defer="property.description" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="propertyDesc" rows="4"></textarea>
                <x-input-error for="property.description" class="mt-2" />
            </div>

        <div class="mx-2 mb-4">
            <label class="mt-3 text-gray-800 text-sm leading-8" for="adminComment">
                Comment/s:
            </label>
            <textarea  wire:model.defer="property.comment" class="resize-y bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" rows="4" id="adminComment">Lorem ipsum dolor sit amet consectetur, adipisicing elit. A molestias fuga numquam magni! Amet dolore id molestiae? Deserunt numquam, animi, modi assumenda sit dolores commodi, consequuntur aperiam saepe explicabo reprehenderit!</textarea>
            <x-input-error for="property.comment" class="mt-2" />
         </div>

         <div class="w-full lg:w-1/4 mx-2 mb-4">
            <label for="property_owners" class="mt-3 text-gray-800 text-sm leading-8" for="portal-id">
                Property Owner
            </label>
            <select wire:model.defer="property.user_id" id="property_owner" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                <option value="">Select option</option>
                    {{-- TODO: --}}
                    {{-- @foreach ($property_owners as $po)
                    <option value="{{ $po->id }}">{{ $po->name }}</option>
                    @endforeach --}}
            </select>
        </div>

        <div class="flex justify-end mt-6">
            <a href="#" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:shadow-outline">Save</a>
            <button class="text-center bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">Cancel</button>
        </div>
    </form>
@endsection
