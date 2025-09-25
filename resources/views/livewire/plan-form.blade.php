<div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    @if($successMessage)
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ $successMessage }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="flex mb-2">
            <div class="w-full flex flex-wrap">
                <div class="w-full md:w-1/2 md:pr-3">
                    <label for="fname" class="block text-gray-700 font-medium mb-2">First Name<span class="text-red-600">*</span></label>
                    <input type="text" id="fname" wire:model="fname" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('fname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="w-full md:w-1/2 md:pr-3">
                    <label for="lname" class="block text-gray-700 font-medium mb-2">Last Name<span class="text-red-600">*</span></label>
                    <input type="text" id="lname" wire:model="lname" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('lname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="flex mb-2">
            <div class="w-full flex flex-wrap">
                <div class="w-full md:w-1/2 md:pr-3">
                    <label for="phone" class="block text-gray-700 font-medium mb-2">Phone<span class="text-red-600">*</span></label>
                    <input type="text" id="phone" wire:model="phone" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="w-full md:w-1/2 md:pr-3">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email<span class="text-red-600">*</span></label>
                    <input type="email" id="email" wire:model="email" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label for="plan" class="block text-gray-700 font-medium mb-2">Plan<span class="text-red-600">*</span></label>
            <select id="plan" wire:model="plan" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Select a Plan</option>
                <option value="premier">Premier 1 Year</option>
                <option value="advanced">Advanced 3 Years</option>
                <option value="paramount">Paramount 5 Years</option>
            </select>
            @error('plan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="message" class="block text-gray-700 font-medium mb-2">Message<span class="text-red-600">*</span></label>
            <textarea name="message" id="message" rows="5" wire:model="message" class="resize-none w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4" wire:ignore>
            {!! NoCaptcha::display(['data-callback' => 'onRecaptchaSuccess']) !!}
            @error('recaptchaResponse') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <input type="hidden" wire:model="recaptchaResponse" id="recaptchaResponse">

        <button type="submit" id="submitBtn" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition">Submit</button>
    </form>
</div>

<script>
    window.onRecaptchaSuccess = function(response) {
        document.getElementById('recaptchaResponse').value = response;
        @this.set('recaptchaResponse', response);
    };

    document.addEventListener('livewire:load', function () {
        // Listen for the reset event (Livewire 2.x)
        Livewire.on('formSubmitted', () => {
            grecaptcha.reset(); // Reset reCAPTCHA
            document.getElementById('fname').value = '';
            document.getElementById('lname').value = '';
            document.getElementById('phone').value = '';
            document.getElementById('email').value = '';
            document.getElementById('plan').value = '';
            document.getElementById('message').value = '';
            document.getElementById('recaptchaResponse').value = '';
        });
        Livewire.on('formSubmitting', () => {
            document.getElementById('fname').disabled = true;
            document.getElementById('lname').disabled = true;
            document.getElementById('phone').disabled = true;
            document.getElementById('email').disabled = true;
            document.getElementById('plan').disabled = true;
            document.getElementById('message').disabled = true;
            document.getElementById('submitBtn').disabled = true;
            document.getElementById('submitBtn').classList.add("cursor-not-allowed");
            document.getElementById('submitBtn').classList.add("opacity-50");
        });
        Livewire.on('clearSuccessMessage', () => {
            document.getElementById('submitBtn').remove();
            
            setTimeout(() => {
                @this.set('successMessage', '');
                location.reload();
            }, 5000);
        });
    });
</script>