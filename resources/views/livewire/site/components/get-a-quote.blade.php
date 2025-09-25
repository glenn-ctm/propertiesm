<div id="get-a-quote-box">
    <div class="px-3">
        <div class="flex flex-wrap p-8 my-8">
            <p class="w-full text-center text-gray-700 text-lg">Need Repairs?</p>
            <p class="w-full text-center mb-8 text-gray-700 text-3xl font-semibold">Get A Quote</p>
            <p class="w-full mb-2 ml-3 text-red-700 text-xs">* $75 Service Charge will be added to repairs made.</p>

            @if(($user = auth()->user()) !== null)
                <div class="w-full">
                    @livewire('site.components.loggedin-form-details', ['user' => $user])
                </div>
            @else
                @livewire('site.components.registration')
                <div class="w-full text-center text-sm mb-10">Already have an account?
                    <a class="font-bold text-blue-500 hover:text-blue-600" href="/login?redirect={{ url()->current() }}">Log In.</a>
                </div>
            @endif

            @livewire('site.components.input-pin')
            <div class="w-full md:w-1/1 mb-4">
                <textarea wire:model.defer="repairDescription" {{ $pinValidated ? '' : 'disabled' }} rows="5" class="resize-y block shadow-sm appearance-none border rounded w-full py-3 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Repair Description" type="text" id="grid-repair-description"></textarea>
            </div>
            <div class="w-full md:w-1/1 mb-4">
                <button {{ $pinValidated ? '' : 'disabled' }} wire:click="descriptionSubmit" wire:loading.attr="disabled" class="{{ $pinValidated ? '' : 'cursor-not-allowed' }} primary-bg-color text-sm hover:bg-red-700 text-white font-bold h-11 w-full rounded focus:outline-none focus:shadow-outline" type="button">
                    <span class="inline-flex">
                        <svg wire:loading wire:target="descriptionSubmit" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
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
@push('script')
    <script>
        Livewire.on('pinValidationSuccess', () => {
            @this.pinValidated = true;
        });
    </script>
@endpush
