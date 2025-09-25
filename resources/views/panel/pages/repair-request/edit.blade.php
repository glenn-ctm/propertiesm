@extends('layouts.panel')

@section('content')
    <h1 class="text-3xl text-black mb-5">Edit Request</h1>
    <div class="p-7 bg-white shadow-lg w-full">
        @include('panel.pages.repair-request.view')
        <form method="POST" action="{{ route('repair-requests.update', $repairRequest->id) }}">
            @csrf
            @method('PUT')
            <div class="items-center mx-2 mb-4">
                <div class="w-full">
                    <label for="status" class="mt-3 text-gray-800 text-sm leading-8"> Status</label>
                    <div class="relative">
                        <select name="status" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="status">
                            @foreach ($status as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83 c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25 L17.418,6.109z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="items-center mx-2 my-4">
                <label class="mt-3 text-gray-800 text-sm leading-8" for="adminComment">
                    Admin Comment/s:
                </label>
                <textarea class="resize-y bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" rows="4" id="adminComment" name="comment" required>{{ $repairRequest->comment }}</textarea>
             </div>

             <div class="w-full sm:flex sm:justify-between mt-6">
                <div class="flex justify-start mt-2 sm:mt-0">
                    <button class="text-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:shadow-outline">Save</button>
                    <a class="text-center bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2"href="{{ route('repair-requests.index') }}">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection

