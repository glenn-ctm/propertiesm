@extends('layouts.site')

@push('css')
<style>

.material-icons.text-sm {
    font-size: 17px;
}
.bg-lead {
    background-color: #d1ecf1;
    border-color: #bee5eb;
}
.material-icons.check {
    font-size: 80px;
}
@media (min-width: 1300px) {
    .container {
        width: 53%
    }
}

</style>
@endpush

@section('content')
    <div class="p-3 sm:p-5 mt-10 container m-auto">
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
                    <div class="flex items-center justify-center rounded-full transition duration-500 ease-in-out h-8 w-8 py-2 border-2 border-green-500 bg-green-500">
                        <span class="material-icons text-white text-sm">
                            done
                        </span>
                    </div>
                </div>
                <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-green-500"></div>
                <div class="flex items-center text-gray-500 relative">
                    <div class="absolute bottom-10 -ml-12 text-center mt-12 w-32 font-medium text-sm sm:text-md text-green-500">Success</div>
                    <div class="flex items-center justify-center rounded-full transition duration-500 ease-in-out h-8 w-8 py-2 border-2 border-green-500 bg-green-500">
                        <span class="material-icons text-white text-sm">
                            done
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 sm:mt-16 w-3/3 sm:w-2/3 mx-auto">
            <div class="bg-white shadow-md rounded p-6 sm:p-10 mb-4 text-sm text-center px-2 sm:px-20">
                <span class="material-icons check text-green-500">
                    check_circle
                </span>
                <p class="text-2xl font-semibold text-green-500 tracking-tight -mt-2 mb-3">Payment Success!</p>
                <p class="text-gray-600">You've successfully paid <span class="font-semibold">150.00 USD</span> for the Plumbing Service.</p>
            </div>
        </div>
    </div>
@endsection
