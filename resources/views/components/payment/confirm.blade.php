<div>
    @if($payment->exists)
        <div class="mb-8 text-center">
            <p class="text-2xl">Confirm Payment</p>
            <p class="text-sm text-gray-600">Please review details and confirm payment.</p>
        </div>
        <div class="p-6 mb-4 text-sm bg-white rounded shadow-md sm:p-10">
            <div class="px-2 py-5 mt-0 mb-4 rounded bg-cyan-100 bg-lead sm:py-8 sm:mt-5 sm:mb-8">
                <table class="flex justify-center text-xs table-fixed sm:text-sm">
                    <tr>
                        <td class="py-1 pr-3 text-right sm:py-0">Card Name</td>
                        <td class="py-1 pl-3 font-semibold text-left sm:py-0">{{ $payment->name_on_card }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 pr-3 text-right sm:py-0">Card Number</td>
                        <td class="py-1 pl-3 font-semibold text-left sm:py-0">XXXX-XXXX-XXXX-{{$payment->last4}}</td>
                    </tr>
                </table>
            </div>

            <div class="flex justify-between my-2">
                <p class="text-gray-500">Service</p>
                <span class="text-lg font-semibold text-green-400">{{$payment->repair_description}}</span>
            </div>
            <div class="flex justify-between my-2">
                <p>Amount to Pay</p>
                <span>{{ $payment->amount->formatByDecimal() }} {{ $payment->currency }}</span>
            </div>
            <hr class="my-6 border-gray-200">
            <div class="flex justify-between my-2 text-lg font-bold">
                <p>Total</p>
                <span>{{ $payment->amount->formatByDecimal() }} {{ $payment->currency }}</span>
            </div>

            <div class="flex">
                <div class="w-1/3 mr-1">
                    <x-button wire:click="goBack" :block="true" color-type="primary" :outline="true">&larr; Go Back</x-button>
                </div>
                <div class="w-2/3 ml-1">
                    <x-button wire:click="confirm" :block="true" color-type="primary">Confirm</x-button>
                </div>
            </div>
        </div>

    @endif
</div>
