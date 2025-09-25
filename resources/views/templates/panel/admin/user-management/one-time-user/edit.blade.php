@extends('layouts.panel')

@section('content')
<div class="w-full mb-5">
    <h1 class="text-3xl text-black">Edit One Time User</h1>
</div>
<div>
    <div class="p-7 bg-white shadow-lg">
        <form>
            <div class="flex flex-col md:flex-row">
                <div class="w-full flex-1 m-2">
                    <label for="adminID" class="mt-3 text-gray-800 text-sm leading-8"> PIN:</label>
                    <input id="adminID" name="adminID" type="text" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" value="JD0001">
                </div>
                <div class="w-full flex-1 m-2">
                    <label for="fname" class="mt-3 text-gray-800 text-sm leading-8"> Full Name:</label>
                    <input id="fname" name="fname" type="text" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" value="John Doe">
                </div>
            </div>

            <div class="flex flex-col md:flex-row">
                <div class="w-full flex-1 m-2">
                    <label for="adminID" class="mt-3 text-gray-800 text-sm leading-8"> Email:</label>
                    <input id="adminID" name="adminID" type="email" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" value="johndoe@email.com">
                </div>
                <div class="w-full flex-1 m-2">
                    <label for="contactNo" class="mt-3 text-gray-800 text-sm leading-8"> Contact Number:</label>
                    <input id="contactNo" name="contactNo" type="tel" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" value="1234567890">
                </div>
            </div>

            <div class="flex">
                <div class="flex-1 mx-2 my-3">
                    <label for="address" class="mt-3 text-gray-800 text-sm leading-8"> Address:</label>
                    <input id="address" name="address" type="text" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" value="3112 Doctors Drive, Los Angeles">
                </div>
                <div class="flex-1 mx-2 my-3">
                    <label for="city" class="mt-3 text-gray-800 text-sm leading-8"> City:</label>
                    <input id="city" name="city" type="text" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" value="California">
                </div>
                <div class="flex-1 mx-2 my-3">
                    <label for="zip" class="mt-3 text-gray-800 text-sm leading-8"> ZIP:</label>
                    <input id="zip" name="zip" type="number" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white"  value="90017">
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
