@extends('layouts.site')
@section('content')

<div class="p-3 sm:p-5 mt-10 container m-auto">

    <div class="mx-4 p-4">
        <div class="flex items-center">
            <div class="flex items-center text-white relative">
                <div
                    class="absolute bottom-10 -ml-12 text-center mt-12 w-32 font-medium text-sm sm:text-md text-green-500">
                    Details</div>
                <div
                    class="flex items-center justify-center rounded-full transition duration-500 ease-in-out h-8 w-8 py-2 border-2 border-green-500">
                    <span class="material-icons text-green-500 text-sm">
                        fiber_manual_record
                    </span>
                </div>
            </div>
            <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-gray-300"></div>
            <div class="flex items-center text-gray-500 relative">
                <div
                    class="absolute bottom-10 -ml-12 text-center mt-12 w-32 font-medium text-sm sm:text-md text-gray-500">
                    Confirm
                </div>
                <div
                    class="flex items-center justify-center rounded-full transition duration-500 ease-in-out h-8 w-8 py-2 border-2 border-gray-300">

                </div>
            </div>
            <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-gray-300"></div>
            <div class="flex items-center text-gray-500 relative">
                <div
                    class="absolute bottom-10 -ml-12 text-center mt-12 w-32 font-medium text-sm sm:text-md text-gray-500">
                    Success
                </div>
                <div
                    class="flex items-center justify-center rounded-full transition duration-500 ease-in-out h-8 w-8 py-2 border-2 border-gray-300">

                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 w-3/3 sm:w-2/3 mx-auto">
        <div class="text-center mb-8">
            <p class="text-2xl">Payment Details</p>
            <p class="text-sm text-gray-600">Enter Credentials and Payment Details.</p>
        </div>

        <form action="#">

            <div class="bg-lead py-5 sm:py-8 px-2 rounded mt-0 sm:mt-5 mb-4 sm:mb-8">
                <table class="flex justify-center table-fixed text-xs sm:text-sm">
                    <tr>
                        <td class="py-1 sm:py-0 pr-3 text-right">Name</td>
                        <td class="py-1 sm:py-0 pl-3 font-semibold text-left">John Doe</td>
                    </tr>
                    <tr>
                        <td class="py-1 sm:py-0 pr-3 text-right">Email</td>
                        <td class="py-1 sm:py-0 pl-3 font-semibold text-left">johndoe@gmail.com</td>
                    </tr>
                    <tr>
                        <td class="py-1 sm:py-0 pr-3 text-right">Address</td>
                        <td class="py-1 sm:py-0 pl-3 font-semibold text-left">2603 W. Imperial Hwy, Inglewood, CA 90303
                        </td>
                    </tr>
                </table>
            </div>
            <div class="w-full flex-1 mb-4">
                <label for="rdescription" class="font-semibold h-6 my-3 text-gray-600 text-xs leading-8 uppercase">
                    Repair Description</label>
                <input id="rdescription" name="rdescription" type="text" placeholder="Title, service, etc."
                    class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="w-full flex-1  mb-4">
                <label for="amount" class="font-semibold h-6 my-3 text-gray-600 text-xs leading-8 uppercase">
                    Amount</label>
                <div
                    class="flex flex-wrap items-stretch w-full relative shadow-sm appearance-none border rounded w-full rounded">
                    <div class="flex">
                        <span
                            class="flex items-center bg-gray-100 leading-normal bg-grey-lighter rounded rounded-r-none border-r px-4 py-2 whitespace-no-wrap text-gray-400">$</span>
                    </div>
                    <input id="amount" name="amount" type="number" type="text"
                        class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1  px-3 py-2 relative leading-tight focus:outline-none focus:shadow-outline rounded-r">
                </div>
            </div>

            <label class="font-semibold h-6 my-3 text-gray-600 text-xs leading-8 uppercase">
                Card Information
            </label>

            <div class="stripe-payment-form stripe-payment" id="stripe-payment">
                <div class="fieldset">
                    <div id="stripe-payment-card-number" class="field empty"></div>
                    <div id="stripe-payment-card-expiry" class="field empty third-width"></div>
                    <div id="stripe-payment-card-cvc" class="field empty third-width"></div>
                </div>
            </div>

            <div class="w-full flex-1 my-4">
                <label for="cardname" class="font-semibold h-6 my-3 text-gray-600 text-xs leading-8 uppercase">
                    Name on card
                </label>
                <input id="cardname" name="cardname" type="text" placeholder="Enter Name on Card"
                    class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-none">
            </div>

            <div class="w-full">
                <a href="confirm" type="button" href="#"
                    class="text-center transition duration-500 ease-in-out w-full button primary-bg-color hover:bg-blue-600 font-semibold block py-3 text-white rounded no-underline mt-8 transition-colors duration-350 ease-in-out focus:outline-none focus:shadow-none">
                    Continue
                    &rarr;
                </a>
            </div>
        </form>
    </div>
</div>



@push('stripe.js')
<script type="text/javascript" src="https://js.stripe.com/v3"></script>
@endpush

@push('script')
<script src="/js/stripe.js"></script>
@endpush

@push('css')
<link rel="stylesheet" href="/css/stripe.css">
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
            width: 53%
        }
    }
</style>
@endpush

@endsection