@extends('layouts.panel')

@section('content')
<div>
    <x-slot name="page_title"> {{-- TODO: Edit User ({{ $user->pin }}) --}}</x-slot>
    <h1 class="text-3xl text-black mb-5">Edit User</h1>
    <div class="p-7 bg-white shadow-lg">
        <form wire:submit.prevent="update">
            <div class="w-full flex-1 m-2">
                {{-- TODO: Upload image --}}
                <label class="block text-gray-800 text-sm mb-2" for="portal-id">
                    Profile Image
                </label>
                <input type="file" class="bg-gray-100 border w-full text-gray-700 px-3 py-2 border rounded focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex flex-col md:flex-row">
                <div class="w-full flex-1 m-2">
                    <label for="fname" class="mt-3 text-gray-800 text-sm leading-8"> Full Name</label>
                    <input id="fname" wire:model.defer="user.name" type="text" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                </div>
                <x-input-error for="user.name" class="mt-2" />
            </div>
            <div class="flex flex-col md:flex-row">
                <div class="w-full flex-1 m-2">
                    <label for="email" class="mt-3 text-gray-800 text-sm leading-8"> Email</label>
                    <input id="email" wire:model.defer="user.email" type="email" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                    <x-input-error for="user.email" class="mt-2" />
                </div>
                <div class="w-full flex-1 m-2">
                    <label for="contactNo" class="mt-3 text-gray-800 text-sm leading-8"> Contact Number</label>
                    <input id="contactNo" wire:model.defer="user.contact_number" type="tel" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                    <x-input-error for="user.contact_number" class="mt-2" />
                </div>
            </div>
            <div class="flex-row sm:flex">
                <div class="w-full sm:w-1/3 mx-2 my-3">
                    <label for="address" class="mt-3 text-gray-800 text-sm leading-8"> Address</label>
                    <input id="address" wire:model.defer="user.address" type="text" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                    <x-input-error for="user.address" class="mt-2" />
                </div>
                <div class="w-full sm:w-1/3 mx-2 my-3">
                    <label for="city" class="mt-3 text-gray-800 text-sm leading-8"> City</label>
                    <input id="city" wire:model.defer="user.city" type="text" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                    <x-input-error for="user.city" class="mt-2" />
                </div>
                <div class="w-full sm:w-1/3 mx-2 my-3">
                    <label for="zip" class="mt-3 text-gray-800 text-sm leading-8"> ZIP</label>
                    <input id="zip" wire:model.defer="user.zip_code" type="number" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                    <x-input-error for="user.zip_code" class="mt-2" />
                </div>
            </div>
            <div class="flex-row sm:flex">
                <div class="w-full sm:w-1/3 mx-2 my-3 mx-2 my-3">
                    <div class="w-full">
                        <label for="status" class="mt-3 text-gray-800 text-sm leading-8"> Status</label>
                        <div class="relative">
                            <select class="font-light bg-gray-100 appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="grid-maintenance">
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
            </div>
            <div class="flex p-2 mt-4">
                <div class="flex-auto flex flex-row-reverse">
                    <button class="text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
