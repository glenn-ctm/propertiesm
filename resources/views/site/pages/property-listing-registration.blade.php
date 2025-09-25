@extends('layouts.site')

@section('content')
    <div x-data="propertyListingOptions()">
        <div class="register bg-gray py-10 px-2 sm:py-20">

            <div class="w-full max-w-lg m-auto bg-white shadow-md rounded px-5 sm:px-8 py-10 mb-4 text-sm">
                <div class="mb-3 pb-5 text-center">
                    <p class="text-gray-700 text-3xl font-semibold">Register</p>
                    <p class="text-md">Fill in the necessary fields below.</p>
                </div>
                <div class="relative mb-4">
                    <select x-model="currentType" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-600 focus:outline-none focus:shadow-outline focus:bg-white">
                        @foreach ($registrationTypes as $type)
                            <option value="{{$type}}">{{ ucwords(str_replace('_', ' ', $type)) }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                            <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83 c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25 L17.418,6.109z"></path>
                        </svg>
                    </div>
                </div>
                @foreach ($registrationTypes as $type)
                    <div x-show="currentType == '{{$type}}'" style="display: none">
                        @livewire('site.components.registration', ['type' => $type])
                    </div>
                @endforeach
                <div class="mb-10"></div>
                <div class="text-center mt-3 text-sm">Already have an account?
                    <a class="font-bold text-blue-500 hover:text-blue-600" href="{{ route('login', ['redirect' => route('site-properties.index')]) }}">Log In.</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function propertyListingOptions(){
            return {
                currentType: 'one_time'
            };
        }
    </script>
@endpush
