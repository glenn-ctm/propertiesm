<div x-data="{form: @entangle('form')}" class="container max-w-3xl p-3 mx-auto mt-10 sm:p-5">
    <div class="p-4 mx-4">
        <x-stepper.progress :steps="$steps" />
    </div>

    {{-- <div class="fixed top-0 left-0 right-0 z-50 p-2 text-white bg-blue-500">
        <p>Client secret: {{$clientSecret}}</p>
        <p>Repair Description: <span class="text-black" x-text="form.repair_description"></span></p>
        <p>Amount: <span class="text-black" x-text="form.amount"></span></p>
        <p>Payment Method: <span class="text-black" x-text="form.payment_method"></span></p>
        <p>Name on Card: <span class="text-black" x-text="form.name_on_card"></span></p>
    </div> --}}

    <div class="relative mx-auto mt-8 w-6/6 sm:w-5/6 step-{{ Str::kebab($steps->getActiveValue()->key) }}">
        <div wire:loading class="absolute inset-0 z-10 bg-gray-900 bg-opacity-25"></div>

        @foreach($steps as $step)
            @php $key = Str::of($step->key)->lower()->prepend('payment.') @endphp
            <div class="{{$steps->isActive($step) ? '' : 'hidden'}}">
                <x-dynamic-component :component="$key" :payment="$payment" :client-secret="$clientSecret ?? null"  />
            </div>
        @endforeach
    </div>
</div>

@push('meta')
    <meta name="stripe-pk" content="{{config('services.stripe.publishable_key')}}" />
@endpush

@push('script')
    <script type="text/javascript" src="https://js.stripe.com/v3"></script>
    <script src="{{mix('js/payment.js')}}"></script>
    <script>
        document.addEventListener('livewire:load', function () {
            if (typeof window.createPaymentState !== 'undefined') {
                createPaymentState(@this);
            } else {
                console.log('reload now');
                alert('Failed to load scripts required for payment. The page will reload to retry execution.');
                location.reload();
            }
        })
    </script>
@endpush()
