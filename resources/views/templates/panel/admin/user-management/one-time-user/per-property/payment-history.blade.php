@extends('layouts.panel')

@section('content')
<h1 class="text-3xl text-black">One-Time User Payment History</h1>
<div class="flex flex-wrap mt-7">
    <div class="md:w-1/7 lg:w-1/7 mb-4 mr-5">
        <p class="text-left flex w-full">
            <span class="">ID: </span>
            <span class="mr-3 font-semibold ml-1">RU0001</span></p>
    </div>
    <div class="md:w-1/7 lg:w-1/7 px-2 mb-4 mr-5">
        <p class="text-left">
        <span class="">Full Name:</span>
        <span class="ml-4 font-semibold">Ricky Gill</span></p>
    </div>
    <div class="md:w-2/7 lg:w-2/7 mb-4 mr-5">
        <p class="text-left flex w-full">
            <span class="">Address: </span>
            <span class="mr-3 font-semibold ml-1">3112 Doctors Drive, Los Angeles, CA 90017</span></p>
    </div>
    <div class="md:w-1/7 lg:w-1/7 mb-4 mr-5">
        <p class="text-left flex w-full">
            <span class="">Contact: </span>
            <span class="mr-3 font-semibold ml-1">1234567890</span></p>
    </div>
    <div class="md:w-1/7 lg:w-1/7 mb-4 mr-5">
        <p class="text-left flex w-full">
            <span class="">Email: </span>
            <span class="mr-3 font-semibold ml-1">one-time-user@email.com</span></p>
    </div>
</div>
<div class="pb-8 w-full">
    <div class="shadow overflow-hidden rounded border-b border-gray-200">
        <table class="border-collapse w-full">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">DATE PAID</th>
                    <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">REQUEST DETAILS</th>
                    <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">AMOUNT</th>
                    <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">STATUS</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DATE</span>
                        10/14/2020
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">REQUEST DETAILS</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">AMOUNT</span>
                        $520.00
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">STATUS</span>
                        <span class="rounded bg-yellow-400 py-1 px-3 text-xs font-bold">PAID</span>
                    </td>
                </tr>
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DATE</span>
                        10/11/2020
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">REQUEST DETAILS</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">AMOUNT</span>
                        $480.00
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">STATUS</span>
                        <span class="rounded bg-yellow-400 py-1 px-3 text-xs font-bold">PAID</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
