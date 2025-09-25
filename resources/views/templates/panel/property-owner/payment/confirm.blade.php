@extends('layouts.panel')

@push('css')
<style>

.material-icons.text-sm {
    font-size: 17px;
}
.bg-lead {
    background-color: #d1ecf1;
    border-color: #bee5eb;
}
@media (min-width: 1300px) {
    .container {
        width: 60%
    }
}

</style>

@endpush

@section('content')
    <div class="p-0 sm:p-5 mt-10 container m-auto">
        <div class="mx-4 p-4">
            <div class="flex items-center">
                <div class="flex items-center text-white relative">
                    <div class="absolute bottom-10 -ml-12 text-center mt-12 w-32 font-medium text-sm sm:text-md text-green-500">Details</div>
                    <div class="flex items-center justify-center rounded-full transition duration-500 ease-in-out h-8 w-8 py-2 border-2 border-green-500 bg-green-500">
                        <span class="material-icons text-white text-sm">
                            done
                        </span>
                    </div>
                </div>
                <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-green-500"></div>
                <div class="flex items-center text-gray-500 relative">
                    <div class="absolute bottom-10 -ml-12 text-center mt-12 w-32 font-medium text-sm sm:text-md text-green-500">Confirm</div>
                    <div class="flex items-center justify-center rounded-full transition duration-500 ease-in-out h-8 w-8 py-2 border-2 border-green-500">
                        <span class="material-icons text-green-500 text-sm">
                            fiber_manual_record
                        </span>
                    </div>
                </div>
                <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-gray-300"></div>
                <div class="flex items-center text-gray-500 relative">
                    <div class="absolute bottom-10 -ml-12 text-center mt-12 w-32 font-medium text-sm sm:text-md text-gray-500">Success</div>
                    <div class="flex items-center justify-center rounded-full transition duration-500 ease-in-out h-8 w-8 py-2 border-2 border-gray-300">

                    </div>
                </div>
            </div>
        </div>

        <div class="mt-2 sm:mt-8 w-full lg:w-2/3 mx-auto">
            <div class="text-center mb-8">
                <p class="text-3xl sm:text-4xl">Confirm Payment</p>
                <p class="text-lg text-gray-600">Please review details and confirm payment.</p>
            </div>
            <div class="bg-white shadow-md rounded p-6 sm:p-10 mb-4 text-sm sm:text-base">
                <div class="bg-lead py-5 sm:py-8 px-2 rounded mt-0 sm:mt-5 mb-4 sm:mb-8">
                    <table class="flex justify-center table-fixed">
                        <tr>
                            <td class="pr-3 text-right">Card Name</td>
                            <td class="pl-3 font-semibold text-left">John Doe</td>
                        </tr>
                        <tr>
                            <td class="pr-3 text-right">Card Number</td>
                            <td class="pl-3 font-semibold text-left">XXXX-XXXX-XXXX-9025</td>
                        </tr>
                    </table>
                </div>

                <div class="flex justify-between my-2">
                    <p class="text-gray-500">Service</p>
                    <span class="text-green-400 text-lg font-semibold">Plumbing</span>
                </div>
                <div class="flex justify-between my-2">
                    <p>Amount to Pay</p>
                    <span>100.00 USD</span>
                </div>
                <div class="flex justify-between my-2">
                    <p>Other Fees</p>
                    <span>50.00 USD</span>
                </div>
                <hr class="my-6 border-gray-200">
                <div class="flex justify-between my-2 text-lg font-bold">
                    <p>Total</p>
                    <span>150.00 USD</span>
                </div>

                <div class="flex">
                    <div class="w-1/3 mr-1">
                        <a href="details" type="button" href="#" class=" text-center transition duration-500 ease-in-out w-full button border border-8 border-blue-500 bg-blue-100 text-blue-500 font-bold block py-3 text-white rounded no-underline mt-8 transition-colors duration-350 ease-in-out focus:outline-none focus:shadow-none">&larr; Go Back</a>
                    </div>
                    <div class="w-2/3 ml-1">
                        <a href="success" type="button" href="#" class=" text-center transition duration-500 ease-in-out w-full button border border-8 border-blue-500 primary-bg-color hover:bg-blue-600 font-bold block py-3 text-white rounded no-underline mt-8 transition-colors duration-350 ease-in-out focus:outline-none focus:shadow-none">Confirm</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
