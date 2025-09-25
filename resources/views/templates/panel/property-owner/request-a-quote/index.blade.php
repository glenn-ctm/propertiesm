@extends('layouts.panel')

@section('content')
<h1 class="text-3xl text-black px-2 mb-5">Request A Quote</h1>
<p class="text-sm mb-4">*Must see property to complete quote.</p>
<div class="w-full xl:w-1/3">
    <form class="bg-white shadow-lg rounded px-5 lg:px-8 py-6 mb-4">
        <div class="w-full mb-4">
            <label class="block tracking-wide text-gray-700 text-sm font-light mt-3 leading-8" for="propertyAddress">
                Address of Property:
            </label>
            <input name="propertyAddress" id="propertyAddress" class="mr-2 bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" type="text">
        </div>
        <div class="mb-8 w-full">
            <label class="block tracking-wide text-gray-700 text-sm font-light mt-3 leading-8" for="grid-maintenance">
                Maintenance:
            </label>
            <x-multiple-select>
                <select x-cloak id="select">
                    <option value="Interior Upkeep Complete">Interior Upkeep Complete</option>
                    <option value="Exterior Upkeep Complete">Exterior Upkeep Complete</option>
                    <option value='Landscaping "Complete"'>Landscaping "Complete"</option>
                </select>
            </x-multiple-select>
        </div>
        <div class="mb-4 flex flex-wrap">
            <div class="w-full">
                <label class="block tracking-wide text-gray-700 text-sm font-light mt-3 leading-8" for="grid-landscaping">
                    Landscaping:
                </label>
            </div>
            <div class="w-full">
                <div class="relative">
                    <select class="text-sm font-light shadow-sm mr-2 bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="grid-maintenance">
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
            </div>
        </div>
        <div class="mb-4">
            <div class="w-full">
                <label class="block tracking-wide text-gray-700 text-sm font-light mt-3 leading-8" for="grid-management-needs">
                    Management Needs:
                </label>
                <div class="w-full mb-4">
                    <x-multiple-select>
                        <select x-cloak id="select">
                            <option value="Rent Collection">Rent Collection</option>
                            <option value="Tenant Occupancy" selected>Tenant Occupancy</option>
                            <option value='Evictions'>Evictions</option>
                            <option value='Monthly Statements'>Monthly Statements</option>
                        </select>
                    </x-multiple-select>
                </div>
            </div>
        </div>
        <div class="mb-4 flex-row flex-wrap">
            <div class="w-full">
                <label class="block tracking-wide text-gray-700 text-sm font-light mt-3 leading-8" for="grid-inspections">
                    Inspections:
                </label>
            </div>
            <div class="w-full mb-4">
                <x-multiple-select>
                    <select x-cloak id="select2">
                         <option value="Locks">Locks</option>
                         <option value="Seals">Seals</option>
                         <option value="Leaks">Leaks</option>
                         <option value="Smoke Detector">Smoke Detector</option>
                         <option value="Extermination">Extermination</option>
                         <option value="Site Check">Site Check</option>
                     </select>
                </x-multiple-select>
            </div>
            <div class="mb-4">
                <div class="w-full">
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="accountType" value="personal">
                            <span class="ml-2 text-gray-700 text-sm font-light">Monthly</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" name="accountType" value="busines">
                            <span class="ml-2 text-gray-700 text-sm font-light">Quarterly</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="w-full">
                    <div class="mt-2">
                        <div class="flex-row md:flex md:items-center mb-6">
                            <div class="w-full lg:w-1/3">
                                <label class="block text-gray-700 text-sm font-light mb-1 md:mb-0" for="inline-no-units">
                                    No. of Units:
                                </label>
                            </div>
                            <div class="w-full lg:w-2/3">
                                <input class="mr-2 bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-no-units" type="number">
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="flex-row md:flex md:items-center mb-6">
                            <div class="w-full lg:w-1/3">
                                <label class="block text-gray-700 text-sm font-light mb-1 md:mb-0" for="inline-no-buildings" >
                                    No. Of Buildings:
                                </label>
                            </div>
                            <div class="w-full lg:w-2/3">
                                <input class="mr-2 bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-no-buildings" type="number">
                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        <div class="w-full">
                            <textarea class="resize-y block mr-2 bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" placeholder="Further Information" type="text" id="grid-repair-description" rows="5"></textarea>
                            <p class="w-full mb-4 text-red-700 text-xs mt-3">*Please allow 24 hours to be contacted for scheduling.</p>
                        </div>
                    </div>
                    <div>
                        <button class="transition duration-500 ease-in-out w-full bg-blue-500 hover:bg-red-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline" type="button">Submit
                        </button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
