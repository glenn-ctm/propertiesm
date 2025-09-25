@extends('layouts.panel')

@section('content')
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 xl:1/2 px-2 mb-4">
            <h1 class="text-3xl text-black">Properties</h1>
        </div>

        <div class="flex-row sm:flex w-full md:w-1/2 xl:1/2 px-2 mb-4 mt-5 flex-wrap">
            @can('create properties')
                <div class="w-full sm:w-4/12 pr-3">
                    <a href="{{ route('properties.create') }}" class="inline-block w-full mb-2 sm:mb-0 sm:mr-5 text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 rounded focus:outline-none focus:shadow-outline">
                    Add Property
                    </a>
                </div>
            @endcan
            @if ( auth()->user()->is_admin() || auth()->user()->is_super_admin() )
                <div class="w-full @can('create properties') sm:w-8/12 @endcan">
                    <form>
                        <div class="flex shadow rounded">
                            <input class="w-full p-2 ml-0 focus:outline-none" name="search" type="text" placeholder="Search by Address" value="{{ request()->input('search') }}">
                            <button class="rounded bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">
                                <i class="material-icons">search</i>
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
    <div class="pb-8 w-full">
        <div class="shadow overflow-hidden rounded border-b border-gray-200">
            <table class="border-collapse w-full">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">PROPERTY ID</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">DATE/TIME</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">FULL ADDRESS</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell w-48 min-w-full md:min-w-0">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $property)
                        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">PROPERTY ID</span>
                                {{ $property->id }}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DATE</span>
                                {{ $property->created_at->format('m/d/Y - h:i A') }}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">FULL ADDRESS</span>
                                {{ $property->full_address }}
                            </td>
                            <td class="w-full lg:w-1/4 p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static inline leading-7">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                                @if ( !(auth()->user()->is_admin() || auth()->user()->is_super_admin()) )
                                    <a class="text-sm hover:text-purple-600 text-purple-800 border rounded-full bg-purple-200 border-purple-400 px-2 py-1" href="{{ route('tenants.properties.show', $property->id) }}">View Tenants</a>
                                @endif
                                <a class="text-sm hover:text-green-600 text-green-800 border rounded-full bg-green-200 border-green-400 px-2 py-1" href="{{ route('properties.show', $property->id) }}">View</a>
                                @can('update properties')
                                    <a class="text-sm hover:text-blue-600 text-blue-800 border rounded-full bg-blue-200 border-blue-400 px-2 py-1" href="{{ route('properties.edit', $property->id) }}">Edit</a>
                                @endcan
                                @can('delete properties')
                                    <form action="{{ route('properties.destroy', $property->id) }}" method="POST" class="inline leading-4" x-data="{}" @submit="if( !confirm('Are you sure to delete this item?') ) $event.preventDefault();">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-sm hover:text-red-600 text-red-800 border rounded-full bg-red-200 border-red-800 px-2 py-1">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @unless (count($properties))
                <div class="text-center p-5">No available data.</div>
            @endunless
        </div>
    </div>
    {{ $properties->links() }}
@endsection
