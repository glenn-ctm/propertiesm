@extends('layouts.site')

@push('css')
<style>
.contact-us {
    color: #777;
}
@media  (min-width:768px) and (max-width:1023px) {
    .container {
        max-width: 90%;
    }
}
</style>
@endpush

@section('content')
<div class="contact-us">
    <div class="container py-10 sm:py-20 m-auto">
        <div class="flex flex-wrap -mx-2 mb-8">

            <div class="md:w-1/1 lg:w-1/1 px-4">
                <div class="contact-details text-sm">
                    <div class="border-b border-gray-200 mb-6">
                        <p class="pb-5 primary-text-color"><span class="text-2xl font-extrabold">01/</span> <span class="capitalize text-xl">contact details</span></p>
                    </div>
                    <div class="flex py-2">
                        <span class="material-icons primary-text-color mr-3">call</span>562-535-6332
                    </div>
                    <div class="flex py-2">
                        <span class="material-icons primary-text-color mr-3">email</span>info@propertiesm.com
                    </div>
                    <div class="flex py-2">
                        <span class="material-icons primary-text-color mr-3">schedule</span>
                        <div>
                            <p>Mon-Fri: 8AM-5PM <span class="mx-2">/</span> Sat: 8AM-3PM</p>
                        </div>
                    </div>
                </div>
                <div class="message-us mt-3 sm:mt-12 sm:mb-12">
                    <div class="border-b border-gray-200 mb-6">
                    <p class="pb-5 primary-text-color"><span class="text-2xl font-extrabold">02/</span> <span class="capitalize text-xl">message us</span></p>
                </div>
                    <div>
                        <p class="text-sm">We would be happy to answer your inquiries.</p>
                        <form class="my-6 text-sm" action="{{ route('sendContactForm') }}" method="POST">
                            @csrf
                            <div class="flex mb-2">
                                <div class="w-full flex flex-wrap">
                                    <div class="w-full md:w-1/2 md:pr-3">
                                        <label for="fname" class="my-3 text-gray-500 leading-8">
                                            First Name<span class="text-red-600">*</span>
                                        </label>
                                        <input id="fname" name="fname" type="text" placeholder="" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <label for="lname" class="my-3 text-gray-500 leading-8">
                                            Last Name<span class="text-red-600">*</span>
                                        </label>
                                        <input id="lname" name="lname" type="text" placeholder="" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    </div>
                                </div>
                            </div>
                            <div class="flex mb-2">
                                <div class="w-full flex flex-wrap">
                                    <div class="w-full md:w-1/2 md:pr-3">
                                        <label for="phone" class="my-3 text-gray-500 leading-8">
                                            Phone<span class="text-red-600">*</span>
                                        </label>
                                        <input id="phone" name="phone" type="number" placeholder="" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <label for="email" class="my-3 text-gray-500 leading-8">
                                            Email<span class="text-red-600">*</span>
                                        </label>
                                        <input id="email" name="email" type="email" placeholder="" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-row mb-5">
                                <div class="w-full flex flex-wrap">
                                    <div class="w-full">
                                        <label for="message" class="block tracking-wide my-2">
                                            Message<span class="text-red-600">*</span>
                                        </label>
                                        <textarea name="message" id="message" rows="5" class="resize-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                                    </div>

                                    <div class="flex-row mb-5">
                                        <div class="w-full flex flex-wrap">
                                            {!! NoCaptcha::display() !!}
                                            @if ($errors->has('g-recaptcha-response'))
                                                <small class="text-danger">Make sure you are not a robot!Lunaweb</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <input type="submit" placeholder="" class="transition duration-500 ease-in-out w-full button primary-bg-color hover:bg-red-700 font-bold block py-3 text-white rounded no-underline mt-4 transition-colors duration-350 ease-in-out">
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection


@push('script')
    {!! NoCaptcha::renderJs() !!}
@endpush
