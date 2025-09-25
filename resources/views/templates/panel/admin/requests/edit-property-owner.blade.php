@extends('layouts.panel')

@section('content')
<div class="w-full mb-5">
    <h1 class="text-3xl text-black">Edit Request</h1>
</div>
    <form class="p-7 bg-white shadow-lg w-full">
        <div class="w-full">
            <div class="flex items-center mb-2">
                <div class="flex-1 m-2">
                    <label class="font-bold mt-3 text-gray-600 text-sm leading-8" for="inline-name">
                        Full Name:
                    </label>
                    <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-name" type="text" value="Ricky Gill">
                </div>

                <div class="flex-1 m-2">
                    <label class="font-bold mt-3 text-gray-600 text-sm leading-8" for="inline-pin">
                        PIN:
                    </label>
                    <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-pin" type="text" value="RG0001">
                </div>

                <div class="flex-1 m-2"></div>
            </div>

            <div class="flex items-center mb-2">
                <div class="flex-1 m-2">
                    <label class="font-bold mt-3 text-gray-600 text-sm leading-8" for="dateTime">
                        Date/Time:
                    </label>
                    <input type="datetime-local" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="dateTime" name="dateTime" value="2021-02-14T00:00" min="2021-02-14T00:00" max="2025-02-14T00:00">
                </div>
                <div class="flex-1 m-2">
                    <label class="font-bold mt-3 text-gray-600 text-sm leading-8" for="inline-contact">
                        Contact Number:
                    </label>
                    <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-contact" type="tel" value="03154546545">
                </div>
                <div class="flex-1 m-2">
                    <label class="font-bold mt-3 text-gray-600 text-sm leading-8" for="inline-email">
                        Email:
                    </label>
                    <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-email" type="email" value="sample@email.com">
                </div>
            </div>

            <div class="flex items-center mb-2">
                <div class="flex-1 m-2">
                    <label class="font-bold mt-3 text-gray-600 text-sm leading-8" for="inline-address">
                        Address:
                    </label>
                    <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-address" type="text" value="3112 Doctors Drive">
                </div>
                <div class="flex-1 m-2">
                    <label class="font-bold mt-3 text-gray-600 text-sm leading-8" for="inline-city">
                        City:
                    </label>
                    <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-city" type="text" value="Los Angeles, CA">
                </div>
                <div class="flex-1 m-2">
                    <label class="font-bold mt-3 text-gray-600 text-sm leading-8" for="inline-zip">
                        Zip:
                    </label>
                    <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-zip" type="text" value="91007">
                </div>
            </div>
        </div>

        <div class="w-full border rounded border-gray-200 mx-2 px-4 pb-5 my-8">
            <div class="flex flex-wrap items-center ml-2 mb-2 -mt-7">
                <label class="uppercase mt-3 px-2 bg-white text-gray-700 leading-8 font-semibold" for="inline-description">
                    Project/Job Description
                </label>
            </div>
            <div class="mb-4">
                <label class="font-bold mt-3 text-gray-600 text-sm leading-8" for="inline-maintenance">
                    Maintenance:
                </label>
                <div class="w-full mb-4">
                    <x-multiple-select>
                        <select x-cloak id="select" class="mx-2">
                            <option value="Interior Upkeep Complete">Interior Upkeep Complete</option>
                            <option value="Exterior Upkeep Complete">Exterior Upkeep Complete</option>
                            <option value='Landscaping "Complete"'>Landscaping "Complete"</option>
                        </select>
                    </x-multiple-select>
                </div>
            </div>
            <div class="mb-4">
                <label class="font-bold mt-3 text-gray-600 text-sm leading-8" for="inline-maintenance" for="grid-landscaping">
                    Landscaping:
                </label>
                <div class="w-full">
                    <div class="relative">
                        <select class="text-sm font-light shadow-sm mr-2 bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="grid-maintenance">
                            <option>1 week</option>
                            <option selected>2 weeks</option>
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
                <label class="font-bold mt-3 text-gray-600 text-sm leading-8" for="inline-maintenance-services">
                    Management Services:
                </label>
                <div class="w-full">
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
            <div class="mb-4">
                <label class="font-bold mt-3 text-gray-600 text-sm leading-8" for="inline-inspections">
                    Inspections:
                </label>
                <div class="w-full mb-4">
                    <x-multiple-select>
                        <select x-cloak>
                            <option value="Locks">Locks</option>
                            <option value="Seals">Seals</option>
                            <option value="Leaks">Leaks</option>
                            <option value="Smoke Detector">Smoke Detector</option>
                            <option value="Extermination">Extermination</option>
                            <option value="Site Check">Site Check</option>
                        </select>
                    </x-multiple-select>
                </div>
            </div>
            <div class="mb-4">
                <label class="font-bold mt-3 text-gray-600 text-sm leading-8" for="repairDescription">
                    Further Information:
                </label>
                <textarea class="resize-y bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" rows="4" id="repairDescription">Lorem ipsum dolor sit amet consectetur, adipisicing elit. A molestias fuga numquam magni! Amet dolore id molestiae? Deserunt numquam, animi, modi assumenda sit dolores commodi, consequuntur aperiam saepe explicabo reprehenderit!</textarea>
            </div>
        </div>

        <div class="w-full">
            <div class="w-full">
                <label for="status" class="font-bold mt-3 text-gray-600 text-sm leading-8"> Status:</label>
                <div class="relative">
                    <select class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="status">
                        <option>Pending</option>
                        <option>Ongoing</option>
                        <option>Completed</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                            <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83 c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25 L17.418,6.109z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="mb-4">
                    <label class="font-bold mt-3 text-gray-600 text-sm leading-8" for="adminComment">
                        Admin Comment/s:
                    </label>
                    <textarea class="resize-y bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" rows="4" id="adminComment">Lorem ipsum dolor sit amet consectetur, adipisicing elit. A molestias fuga numquam magni! Amet dolore id molestiae? Deserunt numquam, animi, modi assumenda sit dolores commodi, consequuntur aperiam saepe explicabo reprehenderit!
                    </textarea>
                </div>

                <div class="flex justify-end mt-4 sm:mt-0">
                    <input type="submit" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:shadow-outline" value="Save">
                    <button class="text-center bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">Cancel</button>
                </div>
            </div>
        </div>

    </form>
@endsection

