<div id="input-pin-box" class="w-full md:w-1/1 mb-4" x-data="{errorMessage: null, errorShown: false, errorTimeout: null, disablePin: false}">
    <div class="relative">
        @if( $pinValidated )
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg class="inline text-green-700 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        @else
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg wire:loading wire:target="pin" class="animate-spin -ml-1 mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        @endif

        <input
            wire:model.debounce.500ms="pin"
            class="text-sm text-gray-400 shadow-sm appearance-none border rounded w-full pr-10 py-3 px-3 leading-tight focus:outline-none focus:shadow-outline"
            placeholder="Enter PIN"
            type="password"
            x-bind:disabled="disablePin"
        />
        <p class="text-sm mt-2 text-red-700" x-show.transition.opacity.out.duration.1500ms="errorShown" x-text="errorMessage"></p>
    </div>
</div>
@push('script')
    <script>
        Livewire.on('pinValidationError', (message) => {
            var pinBox = document.getElementById('input-pin-box');

            clearTimeout(pinBox.__x.$data.errorTimeout);

            pinBox.__x.$data.errorShown = true;
            pinBox.__x.$data.errorMessage = message;

            pinBox.__x.$data.errorTimeout = setTimeout(() => { pinBox.__x.$data.errorShown = false }, 3000);
        });

        Livewire.on('pinValidationSuccess', () => {
            var pinBox = document.getElementById('input-pin-box');
            pinBox.__x.$data.disablePin = true;
        });
    </script>
@endpush
