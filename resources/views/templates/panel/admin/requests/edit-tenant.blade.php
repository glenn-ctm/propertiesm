@extends('layouts.panel')

@section('content')
<div class="w-full mb-5">
    <h1 class="text-3xl text-black">Edit Request</h1>
</div>
<div class="container">
    <form class="p-7 bg-white shadow-lg w-full sm:w-2/3">
        <div class="flex items-center mb-2">
            <div class="flex-1 m-2">
                <label class="mt-3 text-gray-800 text-sm leading-8" for="inline-name">
                    Full Name:
                </label>
                <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-name" type="text" value="Ricky Gill">
            </div>
            <div class="flex-1 m-2">
                <label class="mt-3 text-gray-800 text-sm leading-8" for="inline-pin">
                    PIN:
                </label>
                <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-pin" type="text" value="TN0001">
            </div>
        </div>

        <div class="flex items-center mb-2">
            <div class="flex-1 m-2">
                <label class="mt-3 text-gray-800 text-sm leading-8" for="dateTime">
                    Date/Time:
                </label>
                <input type="datetime-local" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="dateTime" name="dateTime" value="2021-02-14T00:00" min="2021-02-14T00:00" max="2025-02-14T00:00">
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
                <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="inline-email" type="email" value="tenant@email.com">
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
        <div class="items-center mx-2 mb-4">
            <div class="w-full">
                <label for="status" class="mt-3 text-gray-800 text-sm leading-8"> Status</label>
                <div class="relative">
                    <select class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="status">
                        <option>Pending</option>
                        <option>Ongoing</option>
                        <option>Completed</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                            <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83 c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25 L17.418,6.109z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap items-center mx-2 mb-4">
            <label class="mt-3 text-gray-800 text-sm leading-8" for="repairDescription">
                Repair Description:
            </label>
            <textarea class="resize-y bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" rows="6" id="repairDescription">Lorem ipsum dolor sit amet consectetur, adipisicing elit. A molestias fuga numquam magni! Amet dolore id molestiae? Deserunt numquam, animi, modi assumenda sit dolores commodi, consequuntur aperiam saepe explicabo reprehenderit!</textarea>
         </div>
         <div class="flex flex-wrap items-center mx-2 mb-4">
            <label class="mt-3 text-gray-800 text-sm leading-8" for="adminComment">
                ADMIN COMMENT/S:
            </label>
            <textarea class="resize-y bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" rows="6" id="adminComment">Lorem ipsum dolor sit amet consectetur, adipisicing elit. A molestias fuga numquam magni! Amet dolore id molestiae? Deserunt numquam, animi, modi assumenda sit dolores commodi, consequuntur aperiam saepe explicabo reprehenderit!</textarea>
         </div>

        <div class="flex justify-end mt-4 sm:mt-0">
            <input type="submit" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:shadow-outline" value="Save">
            <button class="text-center bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">Cancel</button>
        </div>


    </form>
</div>
@endsection
