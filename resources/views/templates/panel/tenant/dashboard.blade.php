@extends('layouts.panel')

@push('css')
<style>
    .dashboard-icon {
        font-size: 40px;
        display: inline-block;
        background-image: linear-gradient(to right, #4786e1, #47b3e5);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    .gradient-bg {
        background-image: linear-gradient(to right, #4786e1, #479ee5);
    }
</style>
@endpush

@section('content')
<div class="px-0 lg:px-5">
    <div class="flex">
        <p class="text-3xl">Welcome to your Properties/M Dashboard, John!</p>
    </div>
    <div class="md:flex content-center flex-wrap -mx-2 p-3 bg-grey rounded">
        <div class="md:flex w-full lg:w-1/2 xl:w-2/3 my-2 lg:my-5 lg:pr-3">
            <div class="bg-white rounded shadow-md py-8 px-10">
                <span class="material-icons dashboard-icon">engineering</span>
                <p class="text-xl font-medium pb-3">There's no job we can't professionally handle!</p>
                <p class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit unde temporibus quae voluptatibus magni suscipit possimus ipsa.</p>
                <div class="mt-6">
                     <a class="transition duration-500 ease-in primary-text-color hover:text-blue-700 text-white font-medium text-lg py-2 pr-6 rounded text-sm underline cursor-pointer">
                        See Services &rarr;
                    </a>
                </div>
            </div>
        </div>
      <div class="md:flex w-full lg:w-1/2 xl:w-1/3 my-2 lg:my-5">
        <div class="gradient-bg rounded shadow py-10 px-10 text-white text-center">
                <p class="text-xl font-semibold pb-3">Need Maintenance Repair?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae possimus dolor, dolores natus minus labore.</p>
                <div class="mt-10">
                    <a class="w-full block primary-text-color hover:text-blue-500 bg-white text-white font-bold py-3 px-6 rounded text-sm uppercase cursor-pointer shadow-md" href="maintenance-repair/index">
                        Request for Repair &rarr;
                    </a>
                </div>
            </div>
      </div>
    </div>
</div>
@endsection



