@extends('layouts.panel')

@push('css')
<style>
.remarks {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.button {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    text-decoration: none;
    color: white;
    font-family: Arial, sans-serif;
    font-size: 16px;
    border-radius: 5px;
    text-align: center;
}
.ios-button {
    background-color: #000000;
}
.android-button {
    background-color: #3DDC84;
}
</style>
@endpush

@section('content')
    <div class="flex flex-wrap">
        <div class="w-full px-2 mb-4 md:w-1/2 lg:w-1/2">
            <h1 class="text-3xl text-black">Repair Requests</h1>
        </div>
        <div class="flex-row flex-wrap w-full px-2 mt-5 mb-4 sm:flex sm:w-1/2">
            <div class="w-full @can('create repair_requests') sm:w-9/12 @endcan"></div>
            @can('create repair_requests')
                <div class="w-full sm:w-3/12 @if(auth()->user()->is_admin()) pr-3 @endif">
                    <!-- iOS App Store Button -->
                    <a href="https://apps.apple.com/us/app/tool-lawn-property-maintenance/id6447814215" 
                    class="ios-button inline-block px-6 py-3 mb-4 text-white bg-black rounded-lg shadow-lg hover:bg-gray-800 transition duration-300 text-lg font-semibold" 
                    style="display:none;"
                    target="_blank">
                        APP for iOS
                    </a>
                    <!-- Google Play Store Button -->
                    <a href="https://play.google.com/store/apps/details?id=com.righttechsoft.toollawn&pli=1" 
                    class="android-button inline-block px-6 py-3 mb-4 text-black bg-green-400 rounded-lg shadow-lg hover:bg-green-500 transition duration-300 text-lg font-semibold" 
                    style="display:none;"
                    target="_blank">
                        APP for Android
                    </a>
                    <a href="{{ route('repair-requests.create') }}" class="common-button inline-block w-full py-2 mb-2 font-bold text-center text-white bg-blue-500 rounded sm:mb-0 sm:mr-5 hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                        Repair Request
                    </a>
                </div>
            @endcan
            @if ( auth()->user()->is_admin() || auth()->user()->is_super_admin() )
                <div class="w-full @can('create repair_requests') sm:w-9/12 @endcan">
                    <form>
                        <div class="flex rounded shadow">
                            <input class="w-full p-2 ml-0 focus:outline-none" name="search" type="text" placeholder="Search by Name or PIN" value="{{ request()->input('search') }}">
                            <button class="flex items-center justify-end w-auto p-2 text-blue-500 bg-white rounded hover:text-blue-400">
                                <i class="material-icons">search</i>
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>

    <div class="w-full pb-8">
        <div class="overflow-hidden border-b border-gray-200 rounded shadow">
            <table class="w-full border-collapse">
                <thead class="text-white bg-gray-800">
                    <tr>
                        <th class="hidden p-3 font-bold uppercase border border-gray-300 lg:table-cell">DATE/TIME</th>
                        @if ( auth()->user()->is_admin() || auth()->user()->is_super_admin() )
                            <th class="hidden p-3 font-bold uppercase border border-gray-300 lg:table-cell">CONTACT NO.</th>
                        @endif
                        <th class="hidden w-3/6 p-3 font-bold uppercase border border-gray-300 lg:table-cell">REQUEST DETAILS</th>
                        <th class="hidden p-3 font-bold uppercase border border-gray-300 lg:table-cell">STATUS</th>
                        <th class="hidden p-3 font-bold uppercase border border-gray-300 lg:table-cell">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($repair_requests as $request)
                        <tr class="flex flex-row flex-wrap mb-10 bg-white lg:hover:bg-gray-100 lg:table-row lg:flex-row lg:flex-no-wrap lg:mb-0">
                            <td class="relative block w-full p-3 text-center text-gray-800 border border-b lg:w-auto lg:table-cell lg:static">
                                <span class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">DATE/TIME</span>
                                {{ $request->created_at->format('m/d/Y - h:i A') }}
                            </td>
                            @if ( auth()->user()->is_admin() || auth()->user()->is_super_admin() )
                                <td class="relative block w-full p-3 text-center text-gray-800 border border-b lg:w-auto lg:table-cell lg:static">
                                    <span class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">CONTACT NO.</span>
                                    {{ $request->contact_number }}
                                </td>
                            @endif
                            <td class="relative block w-full p-3 text-center text-gray-800 border border-b lg:w-auto lg:table-cell lg:static">
                                <span class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">REQUEST DETAILS</span>
                                <span class="remarks ellipsis-two-lines">{{ $request->remarks }}</span>
                            </td>
                            <td class="relative block w-full p-3 text-center text-gray-800 border border-b lg:w-auto lg:table-cell lg:static">
                                <span class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">STATUS</span>
                                <span
                                class="rounded-full py-1 px-3 text-xs font-bold
                                @switch($request->status)
                                    @case( App\Enums\RepairRequestStatus::PENDING )
                                        bg-red-200
                                        @break
                                    @case( App\Enums\RepairRequestStatus::ONGOING )
                                        bg-orange-200
                                        @break
                                    @case( App\Enums\RepairRequestStatus::COMPLETED )
                                        bg-green-200
                                        @break
                                    @default

                                @endswitch
                                ">{{ $request->status }}</span>
                            </td>
                            <td class="relative block inline w-full p-3 leading-7 text-center text-gray-800 border border-b lg:w-auto lg:table-cell lg:static">
                                <span class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">Actions</span>
                                <a class="px-2 py-1 text-sm text-green-800 bg-green-200 border border-green-400 rounded-full hover:text-green-600" href="{{ route('repair-requests.show', $request->id) }}">View</a>
                                @can('update repair_requests')
                                    <a class="px-2 py-1 text-sm text-blue-800 bg-blue-200 border border-blue-400 rounded-full hover:text-blue-600" href="{{ route('repair-requests.edit', $request->id) }}">Edit</a>
                                @endcan
                                @can('delete repair_requests')
                                    <form action="{{ route('repair-requests.destroy', $request->id) }}" method="POST" class="inline leading-4" x-data="{}" @submit="if( !confirm('Are you sure to delete this item?') ) $event.preventDefault();">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-2 py-1 text-sm text-red-800 bg-red-200 border border-red-800 rounded-full hover:text-red-600">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            @unless (count($repair_requests))
                <div class="p-5 text-center">No available data.</div>
            @endunless
        </div>
    </div>
    {{ $repair_requests->links() }}
@endsection


@push('script')
<script>
    function isIOS() {
        return /iPhone|iPad|iPod/i.test(navigator.userAgent);
    }

    function isAndroid() {
        return /Android/i.test(navigator.userAgent);
    }

    if (isIOS()) {
        document.querySelector('.ios-button').style.display = 'block';
        document.querySelector('.android-button').style.display = 'none';
    } else if (isAndroid()) {
        document.querySelector('.ios-button').style.display = 'none';
        document.querySelector('.android-button').style.display = 'block';
    }
    else {
        document.querySelector('.android-button').style.display = 'none';
        document.querySelector('.ios-button').style.display = 'none';
    }
</script>
@endpush