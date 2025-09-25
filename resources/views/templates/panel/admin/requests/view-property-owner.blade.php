@extends('layouts.panel')

@section('content')
<h1 class="text-3xl text-black mb-5">View Request</h1>
    <form class="p-7 bg-white shadow-lg w-full">
        <div class="flex flex-col md:flex-row mx-2 mb-4">
            <ul class="leading-10 w-full md:w-2/3">
                <li>
                    <span class="w-28 md:w-32 inline-block font-semibold">Full Name:</span>
                    <span>Ricky Gill</span>
                </li>
                <li>
                    <span class="w-28 md:w-32 inline-block font-semibold">PIN:</span>
                    <span>RG0001</span>
                </li>
                <li>
                    <span class="w-28 md:w-32 inline-block font-semibold">Phone:</span>
                    <span>03154546545</span>
                </li>
                <li>
                    <span class="w-28 md:w-32 inline-block font-semibold">Date/Time:</span>
                    <span>23/11/2020 3:00 AM</span>
                </li>
                <li>
                    <span class="w-28 md:w-32 inline-block font-semibold">Email:</span>
                    <span>sample@email.com</span>
                </li>
                <li>
                    <span class="w-28 md:w-32 inline-block font-semibold">Address:</span>
                    <span>3112 Doctors Drive, Los Angeles, CA 91007</span>
                </li>
            </ul>
            <div class="status w-full text-left md:text-right md:w-1/3">
                <span class="rounded-full text-gray-700 bg-red-200 py-1 px-5 text-lg font-semibold">Pending</span>
            </div>
        </div>

        <div class="w-full border rounded border-gray-200 px-2 pb-5 my-10">
            <div class="flex flex-wrap items-center ml-2 mb-2 -mt-7">
                <label class="uppercase mt-3 px-2 bg-white leading-8 font-semibold" for="inline-description">
                    Project/Job Description
                </label>
            </div>
            <ul class="leading-8 md:leading-10 flex-1 px-2 md:px-5">
                <li>
                    <span class="w-28 md:w-56 inline-block font-semibold">Maintenance:</span>
                    <span>Plumbing, Paintings</span>
                </li>
                <li>
                    <span class="w-28 md:w-56 inline-block font-semibold">Landscaping:</span>
                    <span>Gardening</span>
                </li>
                <li>
                    <span class="w-28 md:w-56 inline-block font-semibold">Maintenance Services:</span>
                    <span>Rent Collection</span>
                </li>
                <li>
                    <span class="w-28 md:w-56 inline-block font-semibold">Inspections:</span>
                    <span>Locks, Leaks</span>
                </li>
                <li class="leading-6 md:leading-8 mt-4 md:mt-0 text-justify md:text-left">
                    <span class="inline-block font-semibold">Further Information:</span>
                    <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. A molestias fuga numquam magni! Amet dolore id molestiae? Deserunt numquam, animi, modi assumenda sit dolores commodi, consequuntur aperiam saepe explicabo reprehenderit!</span>
                </li>

            </ul>
            </div>

        <div class="items-center mx-2 mb-4">
            <label class="mt-3 text-gray-800 font-semibold leading-8" for="adminComment">
                Admin Comment/s:
            </label>
            <textarea class="resize-y bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" rows="4" id="adminComment">Lorem ipsum dolor sit amet consectetur, adipisicing elit. A molestias fuga numquam magni! Amet dolore id molestiae? Deserunt numquam, animi, modi assumenda sit dolores commodi, consequuntur aperiam saepe explicabo reprehenderit!</textarea>
         </div>

         <div class="w-full md:flex md:justify-between mt-6">
            <div>
                <button class="text-center bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    <span class="flex">
                        <span class="material-icons">get_app</span>
                        <span>Download</span>
                    </span>
                </button>
            </div>
            <div class="flex justify-start mt-2 md:mt-0">
                <a href="edit-property-owner" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:shadow-outline">Edit</a>
                <button class="text-center bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">Cancel</button>
            </div>
        </div>
    </form>
@endsection

