@extends('layouts.panel')

@push('css')
    <style>
        a {
            transition: all .3s;
        }
        a:hover {
            transform: scale(1.03);
            box-shadow: 0 2rem 5rem rgba(0,0,0,.1);
        }
    </style>
@endpush

@section('content')
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 lg:w-1/2 px-2 mb-4">
            <h1 class="text-3xl text-black">{{ $page_title }}</h1>
        </div>
        <div class="w-full flex md:w-1/2 lg:w-1/2 px-2 mb-4 text-right">
            <div class="flex w-full">
                <form class="w-full">
                    <div class="relative text-gray-600 focus-within:text-gray-400 shadow">
                        <input type="search" name="search" class="w-full rounded p-2 focus:outline-none" placeholder="Search by address" autocomplete="off" value="{{ request()->input('search') }}">
                        <span class="absolute inset-y-0 right-0 flex items-center pl-2">
                        <button class="rounded bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">
                            <i class="material-icons">search</i>
                        </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="grid md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 mb-4">
        @foreach ($properties as $property)
            <a href="{{ route('tenants.properties.show', $property->id) }}" class="bg-gray-400 p-5 rounded-lg shadow h-40 text-white justify-center flex items-center">
                <div class="text-white">
                    <span class="text-lg">{{ $property->full_address }}</span>
                    <p class="text-green-200 font-semibold mt-2">{{ $property->tenants_count }} Tenant{{ $property->tenants_count > 1 ? 's' : '' }}</p>
                </div>
            </a>
        @endforeach
    </div>
    @if (!$properties->count())
        <p class="text-center">No data available.</p>
    @endif
    {{ $properties->links() }}
@endsection
