<div>
    <form wire:submit.prevent="submit">
        <div class="mb-4">
            <input wire:model.defer="fullName" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Full Name*">
            <x-input-error for="fullName" class="mt-2" />
        </div>
        <div class="mb-5">
            <input wire:model.defer="address" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Address*">
            <x-input-error for="address" class="mt-2" />
        </div>
        <div class="flex flex-wrap -mx-2">
            @if($selectedType !== 'property_owner')
                <div class="w-full md:w-1/3 px-2 mb-4">
                    <input wire:model.defer="unitNumber" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" placeholder="Unit #*">
                    <x-input-error for="unitNumber" class="mt-2" />
                </div>
            @endif
            <div class="w-full {{ $selectedType === 'property_owner' ?: 'md:w-1/3' }} px-2 mb-4">
                <input wire:model.defer="city" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="City*">
                <x-input-error for="city" class="mt-2" />
            </div>
            <div class="w-full {{ $selectedType === 'property_owner' ?: 'md:w-1/3' }} px-2 mb-4">
                <input wire:model.defer="zipCode" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Zip*">
                <x-input-error for="zipCode" class="mt-2" />
            </div>
        </div>
        <div class="mb-4">
            <input wire:model.defer="email" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" placeholder="Email*">
            <x-input-error for="email" class="mt-2" />
        </div>

        <div class="flex flex-wrap -mx-3">
            <div class="w-full {{ !$isOneTime ?: 'md:w-1/2' }} px-3 mb-5">
                <input wire:model.defer="contactNumber" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="tel" placeholder="Contact Number*">
                <x-input-error for="contactNumber" class="mt-2" />
            </div>
        </div>

        <div class="w-full {{ !$isOneTime ?: 'md:w-1/2' }} px-3">
            <button wire:loading.attr="disabled" class="primary-bg-color hover:bg-red-700 text-white text-sm font-bold h-11 w-full rounded focus:outline-none focus:shadow-outline">
                <span class="inline-flex">
                    <svg wire:loading wire:target="submit" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    {{ !$isOneTime ? 'Register' : 'Submit' }}
                </span>
            </button>
        </div>
    </form>
</div>
