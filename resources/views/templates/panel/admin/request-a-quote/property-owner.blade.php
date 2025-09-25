<x-slot name="page_title">Request A Quote</x-slot>
<p class="text-sm mb-4">*Must see property to complete quote.</p>
<div class="w-1/3">
    <form class="bg-white shadow-md rounded px-8 py-6 mb-4">
        <div class="mb-4 flex-row flex-wrap">
            <div class="w-full pl-2">
                <label class="block tracking-wide text-gray-700 text-sm font-light my-3" for="grid-maintenance">
                    Maintenance:
                </label>
            </div>
            <div class="w-full mb-4">
                <select x-cloak id="select">
                    @foreach($mservices as $mservice)
                        <option value="{{ $mservice }}">{{ $mservice }}</option>
                    @endforeach
                </select>
                @livewire('site.pages.multiple-select')
            </div>
        </div>
                        <div class="mb-4 flex flex-wrap">
                            <div class="w-full pl-2">
                                <label class="block tracking-wide text-gray-700 text-sm font-light my-3" for="grid-landscaping">
                                    Landscaping:
                                </label>
                            </div>
                            <div class="w-full">
                                <div class="relative">
                                    <select class="text-sm font-light shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="grid-maintenance">
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
                            <div class="w-full pl-2">
                                <label class="block tracking-wide text-gray-700 text-sm font-light mt-3" for="grid-management-needs">
                                    Management Needs:
                                </label>
                                <div class="mt-2">
                                    <div>
                                        <label class="inline-flex items-center font-light">
                                            <input type="checkbox" class="form-checkbox">
                                            <span class="ml-2 text-gray-700 text-sm" >Rent Collection</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="inline-flex items-center font-light">
                                            <input type="checkbox" class="form-checkbox">
                                            <span class="ml-2 text-gray-700 text-sm">Tenant Occupancy</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="inline-flex items-center font-light">
                                            <input type="checkbox" class="form-checkbox">
                                            <span class="ml-2 text-gray-700 text-sm">Evictions</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="inline-flex items-center font-light">
                                            <input type="checkbox" class="form-checkbox">
                                            <span class="ml-2 text-gray-700 text-sm">Monthly Statements</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 flex-row flex-wrap">
                            <div class="w-full pl-2">
                                <label class="block tracking-wide text-gray-700 text-sm font-light my-3" for="grid-inspections">
                                    Inspections:
                                </label>
                            </div>
                            <div class="w-full mb-4">
                                @livewire('site.pages.multiple-select')
                                <select x-cloak id="select">
                                        @foreach($inspections as $inspection)
                                            <option value="{{ $inspection }}">{{ $inspection }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <div class="w-full pl-2">
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
                                <div class="w-full pl-2">
                                    <div class="mt-2">
                                        <div class="md:flex md:items-center mb-6">
                                            <div class="w-1/3 pl-2">
                                                <label class="block text-gray-700 text-sm font-light mb-1 md:mb-0" for="inline-no-unit">
                                                    No. of Units:
                                                </label>
                                            </div>
                                            <div class="w-2/3">
                                                <input class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="inline-no-units" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <div class="md:flex md:items-center mb-6">
                                            <div class="w-1/3 pl-2">
                                                <label class="block text-gray-700 text-sm font-light mb-1 md:mb-0" for="inline-no-buildings" >
                                                    No. Of Buildings:
                                                </label>
                                            </div>
                                            <div class="w-2/3">
                                                <input class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 text-sm font-light leading-tight focus:outline-none focus:shadow-outline" id="inline-no-buildings" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <div class="w-full">
                                            <textarea class="resize-y block shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 text-sm font-light leading-tight focus:outline-none focus:shadow-outline" placeholder="Further Information" type="text" id="grid-repair-description" rows="5"></textarea>
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
