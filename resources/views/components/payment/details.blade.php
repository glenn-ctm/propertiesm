<div class="mb-8 text-center">
    <p class="text-2xl">Payment Details</p>
    <p class="text-sm text-gray-600">Enter Credentials and Payment Details.</p>
</div>

    <div class="p-6 mb-4 bg-white rounded shadow-md sm:p-10">
        <x-user-card />

        <form action="#" x-on:submit.prevent="$store.form.submit(form, $refs.clientSecret.value)">
            <div class="flex-1 w-full mb-4">
                <label for="rdescription" class="h-6 my-3 text-xs font-semibold leading-8 text-gray-600 uppercase">
                    Rent Description</label>
                <input x-bind:disabled="$store.form.loading" x-model="form.repair_description" id="rdescription" type="text" placeholder="Month, For, ETC"
                    class="w-full px-3 py-3 leading-tight text-gray-700 border rounded shadow-sm appearance-none focus:outline-none focus:shadow-outline">
                <span x-show="$store.paymentFormErrors.repair_description" x-text="$store.paymentFormErrors.repair_description" class="text-red-700"></span>
            </div>

            <div class="flex-1 w-full mb-4">
                <label for="amount" class="h-6 my-3 text-xs font-semibold leading-8 text-gray-600 uppercase">
                    Amount</label>
                <div class="relative flex flex-wrap items-stretch w-full border rounded shadow-sm appearance-none">
                    <div class="flex">
                        <span class="flex items-center px-4 py-2 text-lg leading-normal text-gray-400 whitespace-no-wrap bg-gray-100 border-r rounded rounded-r-none bg-grey-lighter">$</span>
                    </div>
                    <input x-bind:disabled="$store.form.loading" x-model="form.amount" id="amount" required type="number" type="text" min=".01" step=".01"
                        class="relative flex-auto flex-grow flex-shrink w-px px-3 py-2 leading-normal rounded-r focus:outline-none focus:shadow-outline">
                </div>

                <span x-show="$store.paymentFormErrors.amount" x-text="$store.paymentFormErrors.amount" class="text-red-700"></span>
            </div>

            <div class="flex-1 w-full my-4">
                <label class="h-6 my-3 text-xs font-semibold leading-8 text-gray-600 uppercase">
                    Card Information
                </label>

                <div class="relative" wire:ignore>
                    <div class="mb-2">
                        <div id="payment-card-number" x-bind:class="{'bg-gray-100': $store.form.loading || $store.form.elements.cards.cardNumber.disabled, 'bg-white': !$store.form.loading}" class="w-full p-3 border rounded shadow-sm appearance-none"></div>
                        <span x-show="$store.form.elements.getError('cardNumber')" x-text="$store.form.elements.getError('cardNumber')" class="text-red-500"></span>
                    </div>
                    <div class="flex">
                        <div class="w-2/4 mr-1">
                            <div id="payment-card-expiry" x-bind:class="{'bg-gray-100': $store.form.loading || $store.form.elements.cards.cardExpiry.disabled, 'bg-white': !$store.form.loading}" class="p-3 bg-white border rounded shadow-sm appearance-none "></div>
                            <span x-show="$store.form.elements.getError('cardExpiry')" x-text="$store.form.elements.getError('cardExpiry')" class="text-red-500"></span>
                        </div>
                        <div class="w-2/4 ml-1">
                            <div id="payment-card-cvc" x-bind:class="{'bg-gray-100': $store.form.loading || $store.form.elements.cards.cardCvc.disabled, 'bg-white': !$store.form.loading}" class="p-3 bg-white border rounded shadow-sm appearance-none"></div>
                            <span x-show="$store.form.elements.getError('cardCvc')" x-text="$store.form.elements.getError('cardCvc')" class="text-red-500"></span>
                        </div>
                    </div>

                    <div class="absolute inset-0 flex justify-center bg-gray-900 bg-opacity-25" x-cloak x-show="$wire.form.payment_method">
                        <x-button type="button" class="self-center" wire:click="changePaymentMethod">Change</x-button>
                    </div>
                </div>
            </div>

            <div class="flex-1 w-full my-4">
                <label for="cardname" class="h-6 my-3 text-xs font-semibold leading-8 text-gray-600 uppercase">
                    Name on card
                </label>
                <input x-bind:disabled="$store.form.loading" x-model="form.name_on_card" id="cardname" name="cardname" type="text"
                    placeholder="Enter Name on Card"
                    class="w-full px-3 py-3 leading-tight text-gray-700 border rounded shadow-sm appearance-none focus:outline-none focus:shadow-none">
                <span x-show="$store.paymentFormErrors.name_on_card" x-text="$store.paymentFormErrors.name_on_card" class="text-red-700"></span>
            </div>

            <div class="w-full">
                <x-button  type="submit" ::disabled="$store.form.loading" color-type="primary" :block="true">Continue &rarr;</x-button>
            </div>

            <input type="hidden" readonly x-bind:value="form.payment_method" />

            <input x-ref="clientSecret" type="hidden" readonly value="{{$clientSecret}}" />
        </form>
    </div>


