@extends('layouts.panel')

@section('content')
<div class="flex flex-wrap">
    <div class="w-full sm:w-1/2 px-2 mb-4">
        <h1 class="text-3xl text-black">Video/Recordings/Pictures</h1>
    </div>

    @can('create videos_recordings_pictures')
        <div class="flex-row sm:flex w-full sm:w-1/2 px-2 mb-4 mt-5 flex-wrap">
            <div class="w-full sm:w-4/12">
                <a href="/panel/vids-recs-pics/create" class="inline-block w-full mb-2 sm:mb-0 sm:mr-5 text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 rounded focus:outline-none focus:shadow-outline" href="/admin/vid-rec-pic/upload">
                Upload
                </a>
            </div>
            <div class="w-full sm:w-8/12">
                <form>
                    <div class="sm:ml-3 flex rounded shadow">
                        <input class="w-full p-2 ml-0 focus:outline-none" name="search" type="text" placeholder="Search by PIN" value="{{ request()->input('search') }}">
                        <button class="flex items-center justify-end w-auto p-2 text-blue-500 bg-white rounded hover:text-blue-400">
                            <i class="material-icons">search</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endcan
</div>
<div class="pb-8 w-full">
    <div class="shadow overflow-hidden rounded border-b border-gray-200">
        <table class="border-collapse w-full">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-full lg:w-48 p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">DATE/TIME</th>
                    @can('update videos_recordings_pictures')
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">PIN</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">ADDRESS</th>
                    @endcan
                    <th class="w-full lg:w-72 p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">DESCRIPTION</th>
                    <th class="w-full lg:w-80 p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">VID/REC/PICS</th>
                    <th class="w-full lg:w-60 p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vrps as $item)
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DATE/TIME</span>
                        {{ $item->date->format('Y/m/d H:i A') }}
                    </td>
                    @can('update videos_recordings_pictures')
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">PIN</span>
                            {{ $item->user->pin }}
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ADDRESS</span>
                            {{ $item->address }}
                        </td>
                    @endcan
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DESCRIPTION</span>
                        <span class="ellipsis">{{ $item->description }}</span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">VIDEOS/IMAGES</span>
                        <p class="ellipsis">
                        @foreach ($item->media as $media)
                            {{ $media->file_name }}@if(!$loop->last), @endif
                        @endforeach
                        </p>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ACTION</span>
                        @can('update videos_recordings_pictures')
                            <a href="{{ route('vids-recs-pics.edit', $item->id) }}" class="text-sm hover:text-blue-600 text-blue-800 border rounded-full bg-blue-200 border-blue-400 px-2 mr-1 mb-1 inline-block">
                                Edit
                            </a>
                        @endcan
                        <a class="text-sm hover:text-green-600 text-green-800 border rounded-full bg-green-200 border-green-400 px-2 mb-1 inline-block" href="{{ route('vids-recs-pics.show', $item->id) }}">View</a>
                        @can('delete videos_recordings_pictures')
                            <form action="{{ route('vids-recs-pics.destroy', $item->id) }}" method="POST" class="inline leading-4" x-data="{}" @submit="if( !confirm('Are sure you want to delete this?') ) $event.preventDefault();">
                                @csrf
                                @method('DELETE')
                                <button class="text-sm hover:text-red-600 text-red-800 border rounded-full bg-red-200 border-red-800 px-2 py-1 inline-block">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @unless (count($vrps))
            <div class="p-5 text-center">No available data.</div>
        @endunless
    </div>
</div>
    {{ $vrps->links() }}
@endsection
