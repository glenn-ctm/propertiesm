@extends('layouts.panel')

@section('content')
<h1 class="text-3xl text-black px-2 mb-5">Edit Admin</h1>
<div class="container">
    <div class="p-7 bg-white shadow-lg w-full sm:w-2/4">
        <div class="h-36 w-36 mx-auto">
            <img src="https://www.isteducation.com/wp-content/uploads/2016/08/user.png" alt="Avatar" class="rounded-full h-100">
        </div> 
        <div class="m-2">
            <label class="mt-3 text-gray-800 text-sm leading-8" for="portal-id">
                Profile Image:
            </label>
            <input type="file" class="bg-gray-100 border w-full text-gray-800 px-3 py-2 border rounded focus:outline-none focus:shadow-outline focus:bg-white">
        </div>
        <form class="w-full mt-4">
            <div class="flex items-center mb-2">
                <div class="flex-1 m-2">
                    <label class="mt-3 text-gray-800 text-sm leading-8" for="inline-name">
                        Full Name:
                    </label>
                    <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-name" type="text" value="John Doe">
                </div>
                <div class="flex-1 m-2">
                    <label class="mt-3 text-gray-800 text-sm leading-8" for="inline-pin">
                        Admin PIN:
                    </label>
                    <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-pin" type="text" value="JD0001">
                </div>
            </div>
            <div class="flex items-center mb-2">
                <div class="flex-1 m-2">
                    <label class="mt-3 text-gray-800 text-sm leading-8" for="inline-contact">
                        Contact Number:
                    </label>
                    <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-contact" type="tel" value="03154546545">
                </div>
                <div class="flex-1 m-2">
                    <label class="mt-3 text-gray-800 text-sm leading-8" for="inline-email">
                        Email:
                    </label>
                    <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-email" type="email" value="johndoe@email.com">
                </div>
            </div>

            <div class="flex flex-wrap items-center ml-2 mb-4">
                <label class="mt-3 text-gray-800 text-sm leading-8" for="inline-address">
                    Address:
                </label>
                <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-address" type="text" value="3112 Doctors Drive">
            </div>
            
            <div class="flex items-center mb-2">
                <div class="flex-1 m-2">
                    <label class="mt-3 text-gray-800 text-sm leading-8" for="inline-city">
                        City:
                    </label>
                    <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-city" type="text" value="Los Angeles, CA">
                </div>
                <div class="flex-1 m-2">
                    <label class="mt-3 text-gray-800 text-sm leading-8" for="inline-zip">
                        Zip:
                    </label>
                    <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-zip" type="text" value="91007">
                </div>
            </div>


            <div class="flex justify-end mt-4">
                <input type="submit" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:shadow-outline" value="Save">
                <button class="text-center bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">Cancel</button>
            </div>

        </form>
    </div>

</div>
@endsection
