@extends('layouts.panel')

@push('css')
<style>
.ico{
    font-size:48px;
}
</style>
@endpush

@section('content')
<h1 class="text-3xl text-black px-2 mb-5">Dashboard</h1>
<div class="bg-white overflow-auto">
    <div class="grid lg:grid-cols-3 gap-4 bg-gray-100">
        <div class="flex items-center px-6 py-8 shadow-md bg-white">
            <div class="flex-1">
            <div class="-mb-2 text-lg text-gray-600">Total Ongoing Requests</div>
            <div class="text-5xl">{{$total_ongoing_request}}</div>
            </div>
            <div><i class="material-icons ml-3 text-orange-500 ico">restore_page</i></div>
        </div>
        <div class="flex items-center px-8 py-10 shadow-lg bg-white">
            <div class="flex-1">
            <div class="-mb-2 text-lg text-gray-600">Total Completed Requests</div>
            <div class="text-5xl">{{$total_completed_request}}</div>
            </div>
            <div><i class="material-icons ml-3 text-green-500 ico">assignment_turned_in</i></div>
        </div>
        <div class="flex items-center px-8 py-10 shadow-lg bg-white">
            <div class="flex-1">
            <div class="-mb-2 text-lg text-gray-600">Total Properties</div>
            <div class="text-5xl">{{$total_properties}}</div>
            </div>
            <div><i class="material-icons ml-3 text-indigo-700 ico">apartment</i></div>
        </div>
    </div>
</div>
@endsection
