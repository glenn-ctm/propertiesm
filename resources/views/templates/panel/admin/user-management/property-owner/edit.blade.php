@extends('layouts.panel')

@section('content')
<h1 class="text-3xl text-black">Edit Property Owner</h1>
<div class="mt-7">
    <div class="p-7 bg-white shadow-lg">
        <form>
            <div class="h-36 w-36">
                <img src="https://www.isteducation.com/wp-content/uploads/2016/08/user.png" alt="Avatar" class="rounded-full h-100">
            </div>
            <div class="w-full flex-1 m-2">
                <label class="mt-3 text-gray-800 text-sm leading-8" for="portal-id">
                    Profile Image:
                </label>
                <input type="file" class="bg-gray-100 shadow border w-full text-gray-700 px-3 py-2 border rounded focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex flex-col md:flex-row">
                <div class="w-full flex-1 m-2">
                    <label for="adminID" class="mt-3 text-gray-800 text-sm leading-8"> PIN:</label>
                    <input id="adminID" name="adminID" type="text" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" value="PO0001">
                </div>
                <div class="w-full flex-1 m-2">
                    <label for="fname" class="mt-3 text-gray-800 text-sm leading-8"> Full Name:</label>
                    <input id="fname" name="fname" type="text" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" value="Jane Doe">
                </div>
            </div>

            <div class="flex flex-col md:flex-row">
                <div class="w-full flex-1 m-2">
                    <label for="adminID" class="mt-3 text-gray-800 text-sm leading-8"> Email:</label>
                    <input id="adminID" name="adminID" type="email" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" value="email@email.com">
                </div>
                <div class="w-full flex-1 m-2">
                    <label for="contactNo" class="mt-3 text-gray-800 text-sm leading-8"> Contact Number:</label>
                    <input id="contactNo" name="contactNo" type="tel" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" value="1234567890">
                </div>
            </div>

            <div class="flex flex-col md:flex-row">
                <div class="w-full flex-1 m-2">
                    <label for="unitNo" class="mt-3 text-gray-800 text-sm leading-8"> Number of Units on Contract:</label>
                    <input id="unitNo" name="unitNo" type="number" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" value="50">
                </div>
                <div class="w-full flex-1 m-2">
                    <label for="propertyNo" class="mt-3 text-gray-800 text-sm leading-8"> Number of Properties on Contract:</label>
                    <input id="propertyNo" name="propertyNo" type="number" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" value="50">
                </div>
            </div>

            <div class="flex-row sm:flex">
                <div class="w-full sm:w-1/3 mx-2 my-3">
                    <label for="address" class="mt-3 text-gray-800 text-sm leading-8"> Address:</label>
                    <input id="address" name="address" type="text" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" value="3112 Doctors Drive, Los Angeles">
                </div>
                <div class="w-full sm:w-1/3 mx-2 my-3">
                    <label for="city" class="mt-3 text-gray-800 text-sm leading-8"> City:</label>
                    <input id="city" name="city" type="text" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" value="California">
                </div>
                <div class="w-full sm:w-1/3 mx-2 my-3">
                    <label for="zip" class="mt-3 text-gray-800 text-sm leading-8"> ZIP:</label>
                    <input id="zip" name="zip" type="number" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" value="90017">
                </div>
            </div>

            <div class="flex-row sm:flex">
                <div class="w-full sm:w-1/3 mx-2 my-3 mx-2 my-3">
                    <div class="w-full">
                        <label for="status" class="mt-3 text-gray-800 text-sm leading-8"> Status:</label>
                        <div class="relative">
                            <select class="font-light bg-gray-100 shadow appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="grid-maintenance">
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
                <div class="w-full sm:w-1/3 mx-2 my-3"></div>
                <div class="w-full sm:w-1/3 mx-2 my-3"></div>
            </div>

            <div class="flex mt-6">
                <div class="flex-auto flex flex-row-reverse">
                    <button class="text-center bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">Cancel</button>
                    <input type="submit" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:shadow-outline" value="Save">
                </div>
            </div>

        </form>

    </div>
</div>
@endsection
