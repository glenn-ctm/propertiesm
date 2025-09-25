@extends('layouts.panel')

@section('content')
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/3 lg:w-1/3 px-2 mb-4">
            <h1 class="text-3xl text-black">{{ $page_title ?? 'Users' }}</h1>
        </div>

        <div class="w-full flex md:w-2/3 lg:w-2/3 px-2 mb-4 text-right mt-5">

            @can('create users')
                <div class="w-full sm:w-3/12 pr-3">
                    @if (request()->input('type') === 'admin' || request()->input('type') === 'super-admin')
                        <a href="{{ route('users.create') }}" class="inline-block w-full mb-2 sm:mb-0 sm:mr-5 text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline">
                        Add New Admin
                        </a>
                    @endif
                </div>
            @endcan

            @if ( auth()->user()->is_admin() || auth()->user()->is_super_admin() )
                <div class="w-full @can('create users') sm:w-9/12 @endcan">
                    <form>
                        @if ($type = request()->input('type'))
                            <input type="hidden" name="type" value="{{ $type }}">
                        @endif
                        <div class="flex shadow rounded">
                            <input class="w-full p-2 ml-0 focus:outline-none" name="search" type="text" placeholder="Search by Name or PIN" value="{{ request()->input('search') }}">
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
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">PIN</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">FULL NAME</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">ADDRESS</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">EMAIL</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">CONTACT NO.</th>
                        @if ( request()->input('type') === 'property-owners' )
                            <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">STATUS</th>
                        @endif
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell w-48 min-w-full md:min-w-0">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">PIN</span>
                                {{ $user->pin }}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">FULL NAME</span>
                                {{ $user->name }}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ADDRESS</span>
                                {{ $user->unit_number }} {{ $user->address }} {{ $user->city }} {{ $user->zip_code }}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">EMAIL</span>
                                {{ $user->email }}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">CONTACT NO.</span>
                                {{ $user->contact_number }}
                            </td>
                            @if ( request()->input('type') === 'property-owners' )
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">STATUS</span>
                                    <span class="rounded {{ $user->hasVerifiedEmail() ? 'bg-green-400' : 'bg-red-400' }} py-1 px-3 text-xs font-bold">{{ $user->hasVerifiedEmail() ? 'Verified' : 'Pending' }}</span>
                                </td>
                            @endif
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static inline leading-4">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                                @if (!$user->hasVerifiedEmail())
                                    <form class="inline-block" method="POST" action="{{ route('users.manage-email-status', $user->id) }}">
                                        @csrf
                                        <input type="hidden" name="email_status" value="{{ App\Enums\UserStatus::VERIFY }}">
                                        <button class="text-sm hover:text-purple-600 text-purple-800 border rounded-full bg-purple-200 border-purple-400 px-2 py-1 mb-1">Verify</button>
                                    </form>
                                @endif
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
