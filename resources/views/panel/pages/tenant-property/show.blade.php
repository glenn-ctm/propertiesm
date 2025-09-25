@extends('layouts.panel')

@section('content')
<div class="flex flex-wrap">
    <div class="w-full md:w-1/2 lg:w-1/2 px-2 mb-4">
        <h1 class="text-3xl text-black">List of Tenants</h1>
    </div>
    @if ( auth()->user()->is_admin() || auth()->user()->is_super_admin() )
        <div class="w-full flex md:w-1/2 lg:w-1/2 px-2 mb-4 text-right mt-5">
            <div class="shadow flex w-full">
                <form class="w-full">
                    <div class="relative text-gray-600 focus-within:text-gray-400">
                        <input type="search" name="search" class="w-full rounded p-2 focus:outline-none" placeholder="Search by Name or PIN" autocomplete="off" value="{{ request()->input('search') }}">
                        <span class="absolute inset-y-0 right-0 flex items-center pl-2">
                        <button class="rounded bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">
                            <i class="material-icons">search</i>
                        </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
<div class="flex flex-wrap mt-7">
    <div class="w-full md:w-1/4 lg:w-1/4 mb-4">
        <p class="text-left flex w-full">
            <span class="">Property Owner: </span>
            <span class="mr-3 font-semibold ml-1">{{ optional($property->owner)->name }}</span></p>
    </div>
    <div class="w-full md:w-2/4 lg:w-2/4 px-2 mb-4 text-right">
        <p class="text-left">
        <span class="">Property Address:</span>
        <span class="ml-4 font-semibold">{{ $property->full_address }}</span></p>
    </div>
    <div class="w-full md:w-1/4 lg:w-1/4 mb-4">
        <p class="text-left flex w-full">
            <span class="">No. of Units on Contract: </span>
            <span class="mr-3 font-semibold ml-1">{{ $property->number_of_units }}</span></p>
    </div>
</div>
<div class="pb-8 w-full">
    <div class="shadow overflow-hidden rounded border-b border-gray-200">
        <table class="border-collapse w-full">
            <thead class="bg-gray-800 text-white">
                <tr>
                    @if( auth()->user()->is_admin() || auth()->user()->is_super_admin() )
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">PIN</th>
                    @endif
                    <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">FULL NAME</th>
                    <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">UNIT NO.</th>
                    <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">EMAIL</th>
                    <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">CONTACT NO.</th>
                    @if( auth()->user()->is_admin() || auth()->user()->is_super_admin() )
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">NO. OF REQUESTS</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">NO. OF PAYMENTS</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">ACTION</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        @if( auth()->user()->is_admin() || auth()->user()->is_super_admin() )
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">PIN</span>
                                {{ $user->pin }}
                            </td>
                        @endif
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">FULL NAME</span>
                            {{ $user->name }}
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">UNIT NO.</span>
                            {{ $user->unit_number }}
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">EMAIL</span>
                            {{ $user->email }}
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">CONTACT NO.</span>
                            {{ $user->contact_number }}
                        </td>
                        @if( auth()->user()->is_admin() || auth()->user()->is_super_admin() )
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">NO. OF REQUESTS</span>
                                <a href="{{ route('repair-requests.index', [ 'search' => $user->pin ]) }}">{{ $user->repair_requests_count }}</a>
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">NO. OF PAYMENTS</span>
                                <a href="{{ route('payments.index', [ 'search' => $user->pin ]) }}">{{ $user->payments_count }}</a>
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static inline leading-4">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                                <a type="button" class="text-sm hover:text-green-600 text-green-800 border rounded-full bg-green-200 border-green-400 px-2 py-1 mb-1" href="{{ route('users.show', $user->id) }}">View</a>
                                <a type="button" class="text-sm hover:text-blue-600 text-blue-800 border rounded-full bg-blue-200 border-blue-400 px-2 py-1 mb-1" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                @can('delete users')
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline leading-4" x-data="{}" @submit="if( !confirm(`{{ $btn_delete_message }}`) ) $event.preventDefault();">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-sm hover:text-red-600 text-red-800 border rounded-full bg-red-200 border-red-800 px-2 py-1">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        @unless (count($users))
            <div class="text-center p-5">No available data.</div>
        @endunless
    </div>
</div>
{{ $users->links() }}
@endsection
