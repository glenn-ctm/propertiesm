<div class="p-6 px-2 mb-4 text-center bg-white rounded shadow-md sm:p-10 sm:px-20">
    @if($payment->exists)
        <span class="text-green-500 material-icons check" style="font-size:5rem">
            check_circle
        </span>
        <p class="mb-3 -mt-2 text-2xl font-semibold tracking-tight text-green-500">Payment Success!</p>
        <p class="text-gray-600 text-sm">You've successfully paid <span class="font-semibold">{{$payment->amount->formatByDecimal()}} {{$payment->currency}}</span> for the {{$payment->repair_description}} Service.</p>
    @endif
</div>
