@extends('layouts.panel')

@section('content')
<div>
    <div class="flex flex-wrap">
    <div class="w-full md:w-1/2 lg:w-1/2 px-2 mb-5">
        <h1 class="text-3xl text-black">Properties</h1>
    </div>

        <div class="flex-row sm:flex w-full sm:w-1/2 px-2 mb-4 mt-5 flex-wrap">
            <div class="w-full sm:w-3/12 pr-3">
                <button wire:click="create" class="inline-block w-full mb-2 sm:mb-0 sm:mr-5 text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 rounded focus:outline-none focus:shadow-outline">
                Add Property
                </button>
            </div>
            <div class="w-full sm:w-9/12">
                <div class="flex shadow rounded">
                    <input class="w-full p-2 ml-0 sm:ml-3 focus:outline-none" wire:model.debounce.500ms="search" type="text" placeholder="Search by Address">
                    <button class="rounded bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">
                        <i class="material-icons">search</i>
                    </button>
                </div>
            </div>
        </div>

    </div>
    <div class="pb-8 w-full">
        <div class="shadow overflow-hidden rounded border-b border-gray-200">
            <table class="border-collapse w-full">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">PROPERTY ID</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">DATE</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">ADDRESS</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell w-48 min-w-full md:min-w-0">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- TODO: @foreach ($properties as $property) --}}
                        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">PROPERTY ID</span>
                                {{-- TODO: {{ $property->id }} --}}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DATE</span>
                                {{-- TODO: {{ $property->created_at }} --}}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ADDRESS</span>
                                {{-- TODO: {{ $property->address }} --}}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                                <button type="button" class="text-sm hover:text-green-600 text-green-800 border rounded-full bg-green-200 border-green-400 px-2 py-1" {{-- TODO: wire:click="show({{$property->id}})" --}}>View</button>
                                <button type="button" class="text-sm hover:text-blue-600 text-blue-800 border rounded-full bg-blue-200 border-blue-400 px-2 py-1" {{-- TODO: wire:click="edit({{$property->id}})" --}}>Edit</button>
                                <button type="button" class="text-sm hover:text-red-600 text-red-800 border rounded-full bg-red-200 border-red-400 px-2 py-1">Delete</button>
                            </td>
                        </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
            {{-- TODO: @unless (count($properties))
                <div class="text-center p-5">No available data.</div>
            @endunless --}}
        </div>
    </div>
    {{-- TODO: {{ $properties->links() }}  --}}
</div>
@endsection
