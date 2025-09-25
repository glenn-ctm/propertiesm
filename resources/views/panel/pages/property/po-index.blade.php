@extends('layouts.panel')

@push('css')
    <style>
        .line-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endpush

@section('content')
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 xl:1/2 px-2 mb-4">
            <h1 class="text-3xl text-black">Properties</h1>
        </div>
    </div>
    <div class="pb-8 w-full">
        <div class="shadow overflow-hidden rounded border-b border-gray-200">
            <table class="border-collapse w-full">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">PROPERTY ADDRESS</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">NUMBER OF UNITS</th>
                        <th class="w-full lg:w-80 p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">DESCRIPTION</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell w-48 min-w-full md:min-w-0">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $property)
                        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">PROPERTY ADDRESS</span>
                                {{ $property->full_address }}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">NUMBER OF UNITS</span>
                                {{ $property->number_of_units }}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static ellipsis">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DESCRIPTION</span>
                                <span class="ellipsis">{{ $property->description }}</span>
                            </td>
                            <td class="w-full lg:w-1/4 p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static inline leading-7">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                                <a class="text-sm hover:text-purple-600 text-purple-800 border rounded-full bg-purple-200 border-purple-400 px-2 py-1" href="{{ route('tenants.properties.show', $property->id) }}">View Tenants</a>
                                <a class="text-sm hover:text-green-600 text-green-800 border rounded-full bg-green-200 border-green-400 px-2 py-1" href="{{ route('site-properties.show', $property->id) }}" target="_blank">View Property &#8599;</a>
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
