@extends('layouts.panel')

@section('content')
<h1 class="text-3xl text-black mb-5">View Request</h1>
    <form class="p-7 bg-white shadow-lg w-full">
        <div class="flex flex-col sm:flex-row mx-2 mb-4">
            <ul class="leading-10 w-full sm:w-1/2">
                <li>
                    <span class="w-20 md:w-32 inline-block font-semibold">Full Name:</span>
                    <span>Ricky Gill</span>
                </li>
                <li>
                    <span class="w-20 md:w-32 inline-block font-semibold">PIN:</span>
                    <span>TN-RG0001</span>
                </li>
                <li>
                    <span class="w-20 md:w-32 inline-block font-semibold">Phone:</span>
                    <span>03154546545</span>
                </li>
                <li>
                    <span class="w-20 md:w-32 inline-block font-semibold">Date/Time:</span>
                    <span>23/11/2020 3:00 AM</span>
                </li>
                <li>
                    <span class="w-20 md:w-32 inline-block font-semibold">Email:</span>
                    <span>sample@email.com</span>
                </li>
                <li>
                    <span class="w-20 md:w-32 inline-block font-semibold">Address:</span>
                    <span>3112 Doctors Drive, Los Angeles, CA 91007</span>
                </li>
            </ul>
            <div class="status w-full text-left sm:text-right sm:w-1/2">
                <span class="rounded-full text-gray-700 bg-red-200 py-1 px-5 text-lg font-semibold">Pending</span>
            </div>
        </div>

        <div class="leading-6 sm:leading-8 mt-4 sm:mt-0 text-justify sm:text-left mx-2">
            <span class="inline-block font-semibold">Further Information:</span>
            <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. A molestias fuga numquam magni! Amet dolore id molestiae? Deserunt numquam, animi, modi assumenda sit dolores commodi, consequuntur aperiam saepe explicabo reprehenderit!</span>
        </div>

        <div class="items-center mx-2 my-4">
            <label class="font-semibold text-gray-800 leading-8" for="adminComment">
                Admin Comment/s:
            </label>
            <textarea class="resize-y bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" rows="4" id="adminComment">Lorem ipsum dolor sit amet consectetur, adipisicing elit. A molestias fuga numquam magni! Amet dolore id molestiae? Deserunt numquam, animi, modi assumenda sit dolores commodi, consequuntur aperiam saepe explicabo reprehenderit!</textarea>
         </div>

         <div class="w-full sm:flex sm:justify-between mt-6">
            <div>
                <button class="text-center bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    <span class="flex">
                        <span class="material-icons">get_app</span>
                        <span>Download</span>
                    </span>
                </button>
            </div>
            <div class="flex justify-start mt-2 sm:mt-0">
                <a href="edit-tenant" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:shadow-outline">Edit</a>
                <button class="text-center bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">Cancel</button>
            </div>
        </div>
    </form>
@endsection

