@push('css')
    <style>
        .container {
            color: #777;
        }
        .section-one{
            background:  radial-gradient(#000000d9, #00000033),url(/static/services/rent-collection.jpg);
            background-size: cover;
            background-position: center;
        }
    </style>
@endpush
<div class="container m-auto">
    <div class="max-w-2xl mx-auto flex flex-wrap mt-10 pb-20">
        <div class="px-2">
            <div class="flex flex-wrap lg:flex -mx-2">
                @if ($user === null)
                <div class="w-full px-0 px-5">
                    <div class="bg-white shadow-md rounded px-8 py-10 mb-4">
                            <div>
                                <div class="mb-3 pb-5 text-center">
                                    <p class="text-gray-700 text-lg font-bold pb-1">Property Owner Register</p>
                                    <div class="text-center mt-3 mb-8 text-sm">Already have a PIN number?
                                        <a class="font-bold text-blue-500 hover:text-blue-600" href="#enter-pin">Enter PIN</a>
                                         – no registration needed.
                                    </div>
                                    <p class="text-sm">Fill in the necessary fields below.</p>
                                </div>
                                @livewire('site.components.registration', ['type' => 'property_owner'])
                            </div>
                    </div>
                </div>
                @else
                @endif
                <div class="w-full px-0 px-5" id="enter-pin">
                    <div class="bg-white shadow-md rounded px-8 py-10 mb-4">
                        <div class="mb-3 pb-5 text-center">
                            <p class="text-gray-700 text-lg font-bold pb-1">Enter PIN Number</p>
                            <p class="text-sm">Please enter your PIN number to access the Quote Request form.</p>
                        </div>
                        <div class="mb-4">
                            @livewire('site.components.input-pin')
                        </div>
                    </div>
                </div>
                <div class="w-full px-0 px-5" id="quote-request-section" style="display: @if ($user === null) none @else block @endif;">
                    <form class="bg-white shadow-md rounded px-8 py-10 mb-4" wire:submit.prevent="onSubmit">
                        <div class="mb-3 pb-5 text-center">
                            <p class="text-gray-700 text-lg font-bold pb-1">Quote Request</p>
                            <p class="text-sm">*Must see property to complete quote.</p>
                        </div>
                        <div id="request-form" class="relative" x-data="{isLoggedIn: false}">
                            <div x-show="!isLoggedIn" class="absolute w-full f-full inset-0 bg-transparent z-10"></div>
                            <div x-show="!isLoggedIn" class="mt-2 mb-4 text-center text-red-700 text-xs -mt-1">PIN number is required.</div>
                            <div class="mb-4 flex-row flex-wrap">
                                <div class="w-full pl-2">
                                    <label class="block tracking-wide text-gray-700 text-sm font-light my-3" for="grid-maintenance">
                                        Construction:
                                    </label>
                                </div>
                                <div class="w-full mb-4">
                                    <x-multi-select2 modelName="maintenance" :values="$maintenanceSelect" :withServiceLink="true" />
                                    <x-input-error for="maintenance" class="mt-2" />
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="w-full">
                                    <label class="block tracking-wide text-gray-700 text-sm font-light mt-3" for="grid-management-needs">
                                        Management Needs:
                                    </label>
                                    <div class="mt-2">
                                        <x-multi-select2 modelName="management_needs" :values="$mgtNeedsSelect" />
                                    </div>
                                    <x-input-error for="management_needs" class="mt-2" />
                                </div>
                            </div>
                            <div class="mb-4 flex-row flex-wrap">
                                <div class="w-full pl-2">
                                    <label class="block tracking-wide text-gray-700 text-sm font-light my-3" for="grid-inspections">
                                        Inspections:
                                    </label>
                                </div>
                                <div class="w-full mb-4">
                                    <x-multi-select2 modelName="inspections" :values="$inspectionsSelect" />
                                    <x-input-error for="inspections" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <div class="w-full pl-2">
                                        <div class="mt-2">
                                            <label class="inline-flex items-center">
                                                <input wire:model.defer="frequency_of_inspection" type="radio" name="frequency_of_inspection" class="form-radio" value="Monthly">
                                                <span class="ml-2 text-gray-700 text-sm font-light">Monthly</span>
                                            </label>
                                            <label class="inline-flex items-center ml-6">
                                                <input wire:model.defer="frequency_of_inspection" type="radio" name="frequency_of_inspection" class="form-radio" value="Quarterly">
                                                <span class="ml-2 text-gray-700 text-sm font-light">Quarterly</span>
                                            </label>
                                        </div>
                                        <x-input-error for="frequency_of_inspection" class="mt-2" />
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
                                                    <input wire:model.defer="number_of_units" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="inline-no-units" type="number">
                                                </div>
                                            </div>
                                            <x-input-error for="number_of_units" class="mt-2" />
                                        </div>
                                        <div class="my-4">
                                            <div class="w-full">
                                                <textarea wire:model.defer="remarks" class="resize-y block shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 text-sm font-light leading-tight focus:outline-none focus:shadow-outline" placeholder="Further Information" type="text" id="grid-repair-description" rows="5"></textarea>
                                                <x-input-error for="remarks" class="mt-2" />
                                            </div>
                                        </div>
                                        <div>
                                            <button wire:loading.attr="disabled" wire:target="onSubmit" class="transition duration-500 ease-in-out w-full bg-blue-500 hover:bg-red-700 text-white font-bold py-3 px-4 text-sm rounded focus:outline-none focus:shadow-outline">
                                                <span class="inline-flex">
                                                    <svg wire:loading wire:target="onSubmit" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                    </svg>
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
        </div>
    </div>
</div>

@push('script')
<script>
    Livewire.on('pinValidationSuccess', () => {
        var box = document.getElementById('request-form');
        box.__x.$data.isLoggedIn = true;
        window.scrollTo({ top: 0, left: 0, behavior: "smooth" });
    });
</script>
@endpush
