@extends('layouts.panel')

@section('content')
<div>
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 lg:w-1/2 px-2 mb-4">
            <h1 class="text-3xl text-black">{{-- TODO: {{ $page_title }} --}}</h1>
            <h1 class="text-3xl text-black mb-5">Users</h1>
        </div>

        <div class="w-full flex md:w-1/2 lg:w-1/2 px-2 mb-4 text-right mt-5">
            <div class="shadow flex w-full">
                <input class="w-full rounded p-2 focus:outline-none" wire:model.debounce.500ms="search" placeholder="Search by Name or PIN">
                <button class="rounded bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">
                    <i class="material-icons">search</i>
                </button>
            </div>
        </div>
    </div>
    <div class="pb-8 w-full">
        <div class="shadow overflow-hidden rounded border-b border-gray-200">
            <table class="border-collapse w-full">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">PIN</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">FULL NAME</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">ADDRESS</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">EMAIL</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">CONTACT NO.</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">STATUS</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell w-48 min-w-full md:min-w-0">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- TODO: @foreach ($users as $user) --}}
                        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">PIN</span>
                                {{-- {{ $user->pin }} --}}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">FULL NAME</span>
                                {{-- {{ $user->name }} --}}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ADDRESS</span>
                                {{-- {{ $user->unit_number }} {{ $user->address }} {{ $user->city }} {{ $user->zip_code }} --}}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">EMAIL</span>
                               {{-- {{ $user->email }} --}}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">CONTACT NO.</span>
                               {{-- {{ $user->contact_number }} --}}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">STATUS</span>
                                {{-- TODO: <span class="rounded bg-{{ $user->hasVerifiedEmail() ? 'green' : 'red' }}-400 py-1 px-3 text-xs font-bold"> {{ $user->hasVerifiedEmail() ? 'Verified' : 'Pending' }} </span>--}}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                                <button type="button" class="text-sm hover:text-green-600 text-green-800 border rounded-full bg-green-200 border-green-400 px-2 py-1" {{-- wire:click="show({{$user->id}})" --}}>View</button>
                                <button type="button" class="text-sm hover:text-blue-600 text-blue-800 border rounded-full bg-blue-200 border-blue-400 px-2 py-1" {{-- wire:click="edit({{$user->id}})" --}}>Edit</button>
                                <button type="button" class="text-sm hover:text-red-600 text-red-800 border rounded-full bg-red-200 border-red-400 px-2 py-1">Delete</button>
                            </td>
                        </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
            {{-- TODO: @unless (count($users))
                <div class="text-center p-5">No available data.</div>
            @endunless --}}
        </div>
    </div>
    {{-- TODO: {{ $users->links() }} --}}
</div>
@endsection
