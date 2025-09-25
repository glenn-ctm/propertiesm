@extends('layouts.panel', [ 'useFileUploadAssets' => true ])

@push('css')
    @livewireStyles
@endpush

@section('content')
    @php
        $user = isset($user) ? $user : null;
        $roles = isset($roles) ? $roles : [];
    @endphp
    <div class="w-full md:w-1/2 lg:w-1/2 px-2 mb-4">
        <h1 class="text-3xl text-black">{{ is_null($user) ? 'Create User' : $title ?? 'Edit User' }}</h1>
    </div>
    <div class="p-4 bg-white shadow-sm">
        <form action="{{ is_null($user) ? route('users.store') : route('users.update', $user->id) }}" method="POST">
            @if ($user)
                @method('PUT')
            @endif
            @csrf
            <div class="w-full flex-1 m-2">
                <label class="mt-3 text-gray-800 text-sm leading-8" for="portal-id">
                    Profile Image
                </label>

                @livewire('file-upload', [
                    'collectionName' => 'avatar',
                    'name' => 'avatar',
                    'accepts' => [ 'image/jpeg', 'image/png', 'image/gif' ],
                    'model' => $user
                ])

            </div>
            <div class="flex flex-col md:flex-row">
                <div class="w-full flex-1 m-2">
                    <label for="fname" class="mt-3 text-gray-800 text-sm leading-8"> Full Name</label>
                    <input value="{{ old('name', optional($user)->name) }}" id="fname" name="name" type="text" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                    <x-input-error for="name" class="mt-2" />
                </div>
                @can('create users')
                    {{-- if user is null, form status is creating else updating --}}
                    @if ( is_null($user) || $user?->is_admin() || $user?->is_super_admin() )
                        <div class="w-full flex-1 m-2">
                            <div class="flex flex-col md:flex-row">
                                <div class="w-full">
                                    <label for="fname" class="mt-3 text-gray-800 text-sm leading-8"> Account type</label>
                                    <select name="role" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                                        @foreach ($roles as $role)
                                            <option @if( old('role', $user?->roles?->first()?->name) === $role ) selected @endif >{{$role}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error for="role" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    @endif
                @endcan
            </div>
            <div class="flex flex-col md:flex-row">
                <div class="w-full flex-1 m-2">
                    <label for="email" class="mt-3 text-gray-800 text-sm leading-8"> Email</label>
                    <input value="{{ old('email', optional($user)->email) }}" id="email" name="email" type="email" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                    <x-input-error for="email" class="mt-2" />
                </div>
                <div class="w-full flex-1 m-2">
                    <label for="contactNo" class="mt-3 text-gray-800 text-sm leading-8"> Contact Number</label>
                    <input value="{{ old('contact_number', optional($user)->contact_number) }}" id="contactNo" name="contact_number" type="tel" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                    <x-input-error for="contact_number" class="mt-2" />
                </div>
            </div>

            <div class="flex-row sm:flex">
                @if (optional($user)->is_tenant())
                    <div class="w-full mx-2 my-3">
                        <div class="w-full flex-1">
                            <label for="address" class="mt-3 text-gray-800 text-sm leading-8"> Unit number</label>
                            <input value="{{ old('unit_number', optional($user)->unit_number) }}" id="address" name="unit_number" type="number" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                            <x-input-error for="unit_number" class="mt-2" />
                        </div>
                    </div>
                @endif
                <div class="w-full mx-2 my-3">
                    <label for="address" class="mt-3 text-gray-800 text-sm leading-8"> Address</label>
                    <input value="{{ old('address', optional($user)->address) }}" id="address" name="address" type="text" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                    <x-input-error for="address" class="mt-2" />
                </div>
                <div class="w-full mx-2 my-3">
                    <label for="city" class="mt-3 text-gray-800 text-sm leading-8"> City</label>
                    <input value="{{ old('city', optional($user)->city) }}" id="city" name="city" type="text" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                    <x-input-error for="city" class="mt-2" />
                </div>
                <div class="w-full mx-2 my-3">
                    <label for="zip" class="mt-3 text-gray-800 text-sm leading-8"> ZIP</label>
                    <input value="{{ old('zip_code', optional($user)->zip_code) }}" id="zip" name="zip_code" type="number" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                    <x-input-error for="zip_code" class="mt-2" />
                </div>
            </div>

            {{-- TODO: if manager needs to verify or pending the user using selection --}}
            {{-- <div class="flex-row sm:flex">
                <div class="w-full sm:w-1/3 mx-2 my-3 mx-2 my-3">
                    <div class="w-full">
                        <label for="status" class="mt-3 text-gray-800 text-sm leading-8"> Status</label>
                        <div class="relative">
                            <select class="font-light shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="grid-maintenance">
                                <option>Pending</option>
                                <option>Verify</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83 c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25 L17.418,6.109z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="flex p-2 mt-4">
                <div class="flex-auto flex flex-row-reverse">
                    <button class="text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
    @livewireScripts
@endpush
