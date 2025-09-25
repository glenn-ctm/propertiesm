@extends('layouts.panel')

@section('content')
<h1 class="text-3xl text-black px-2 mb-5">Maintenance Repairs</h1>
<div class="container">
    <div class="p-7 bg-white shadow-lg w-full sm:w-1/2">
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="mt-3 text-gray-800 text-sm leading-8" for="grid-address">
                Address
            </label>
            <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="grid-address" type="text">
            </div>
            <div class="w-full md:w-1/2 px-3">
            <label class="mt-3 text-gray-800 text-sm leading-8" for="grid-cnumber">
                Contact Number
            </label>
            <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="grid-cname" type="text">
        </div>
    </div>
        <div class="w-full mb-6">
        <label class="mt-3 text-gray-800 text-sm leading-8">
                Repair Description
            </label>
            <textarea class="bg-gray-100 focus:bg-white resize-y block shadow-sm appearance-none border border-gray-200 rounded w-full py-3 px-3 text-gray-700 text-sm font-light leading-tight focus:outline-none focus:shadow-outline" type="text" id="grid-repair-description" rows="5"></textarea>
        </div>
        <div class="w-full">
            <p class="text-gray-500 text-sm mb-4">Please allow 24 hours to be contacted by the Maintenance.</p>
            <!--<p class="text-gray-500 text-sm mb-4">For emergencies, please text your <span class="font-bold">NAME, ADDRESS, CONTACT NUMBER, and NATURE OF EMERGENCY</span> to <span class="font-bold">562-552-5723</span></p>-->
            <p class="text-gray-500 text-sm mb-4">For Safety and Liability reasons before entry any occupied dwelling Tool Lawn requires company repairmen to enable their bodycam (optional). By opting out, you release Properties/m and all involved from fault of any claim.</p>
            <div class="mb-5">
                <label class="inline-flex items-center font-light">
                    <input type="checkbox" class="form-checkbox">
                    <span class="ml-2 text-gray-700 text-sm" >Opt-out</span>
                </label>
            </div>
            <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm uppercase">
            Submit
            </button>
        </div>
    </form>
</div>
@endsection
