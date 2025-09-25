@extends('layouts.panel')

@section('content')
<h1 class="text-3xl text-black px-2 mb-5">Create Repair Request</h1>
<div class="w-1/2">
    <div class="p-7 bg-white shadow-lg w-full">
        <form method="POST" action="{{ route('repair-requests.store') }}">
            @csrf
            <div id="request-form" class="relative">
                <div class="w-full mb-5">
                    <label class="mt-3 text-gray-800 text-sm leading-8" for="propertyAddress">
                        Full Address
                    </label>
                    <input name="address" value="{{ old('address', auth()->user()->full_address) }}" id="propertyAddress" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" type="text">
                    <x-input-error for="address" class="mt-2" />
                </div>
                <div class="mb-2 flex-row flex-wrap">
                    <div class="w-full">
                        <label class="mt-3 text-gray-800 text-sm leading-8" for="grid-maintenance">
                            Maintenance
                        </label>
                    </div>
                    <div class="w-full pb-3">
                        <x-multi-select name="maintenance" :values="$maintenanceSelect" />
                        <x-input-error for="maintenance" class="mt-2" />
                    </div>
                </div>
                <div class="mb-6 flex flex-wrap">
                    <div class="w-full">
                        <label class="text-gray-800 text-sm leading-8" for="grid-landscaping">
                            Landscaping
                        </label>
                    </div>
                    <div class="w-full">
                        <div class="relative">
                            <select name="landscaping" class="text-sm font-light bg-gray-100 flex border border-gray-300 rounded py-3 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="grid-maintenance">
                                <option>Select Option</option>
                                <option>1 week</option>
                                <option>2 weeks</option>
                                <option>3 weeks</option>
                                <option>4 weeks</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83 c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25 L17.418,6.109z"></path>
                            </svg>
                            </div>
                        </div>
                        <x-input-error for="landscaping" class="mt-2" />
                    </div>
                </div>
                <div class="mb-4">
                    <div class="w-full">
                        <label class="block tracking-wide text-gray-700 text-sm font-light mt-3" for="grid-management-needs">
                            Management Needs
                        </label>
                        <div class="mt-2">
                            <x-multi-select name="management_needs" :values="$mgtNeedsSelect" />
                        </div>
                        <x-input-error for="management_needs" class="mt-2" />
                    </div>
                </div>
                <div class="mb-4 flex-row flex-wrap">
                    <div class="w-full">
                        <label class="mt-3 text-gray-800 text-sm leading-8" for="grid-inspections">
                            Inspections
                        </label>
                    </div>
                    <div class="w-full pb-3">
                        <x-multi-select name="inspections" :values="$inspectionsSelect" />
                        <x-input-error for="inspections" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <div class="w-full">
                            <div class="mt-1">
                                <label class="inline-flex items-center">
                                    <input name="frequency_of_inspection" type="radio" class="form-radio" value="Monthly">
                                    <span class="ml-2 text-gray-700 text-sm font-light">Monthly</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input name="frequency_of_inspection" type="radio" class="form-radio" value="Quarterly">
                                    <span class="ml-2 text-gray-700 text-sm font-light">Quarterly</span>
                                </label>
                            </div>
                            <x-input-error for="frequency_of_inspection" class="mt-2" />
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="w-full">
                            <div class="mt-2">
                                <label class="block text-gray-700 text-sm font-light leading-8" for="inline-no-unit">
                                    No. of Units
                                </label>
                                <input name="number_of_units" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-no-units" type="number">
                                <x-input-error for="number_of_units" class="mt-2" />
                            </div>
                            <div class="my-4">
                                <div class="w-full">
                                    <textarea name="remarks" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" placeholder="Further Information" type="text" id="grid-repair-description" rows="5"></textarea>
                                    <x-input-error for="remarks" class="mt-2" />
                                </div>
                            </div>
                            <div>
                                <button class="transition duration-500 ease-in-out w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline">
                                    <span class="inline-flex">
                                        Submit
                                    </span>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
