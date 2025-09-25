@extends('layouts.panel')

@push('css')
<style>
.ico {
    font-size: 48px !important;
}
</style>
@endpush

@section('content')
<div class="w-full px-2 mb-5">
    <h1 class="text-3xl text-black">Dashboard</h1>
</div>
<div class="bg-white overflow-auto">
    <div class="grid lg:grid-cols-3 gap-4 bg-gray-100">
        <div class="flex items-center px-6 py-8 shadow-md bg-white">
            <div class="flex-1">
            <div class="-mb-2 text-lg text-gray-600">Total Ongoing Requests</div>
            <div class="text-5xl">{{ $total_ongoing_request }}</div>
            </div>
            <div><i class="material-icons ml-3 text-orange-500 ico">restore_page</i></div>
        </div>
        <div class="flex items-center px-6 py-8 shadow-md bg-white">
            <div class="flex-1">
            <div class="-mb-2 text-lg text-gray-600">Total Completed Requests</div>
            <div class="text-5xl">{{ $total_completed_request }}</div>
            </div>
            <div><i class="material-icons ml-3 text-green-500 ico">assignment_turned_in</i></div>
        </div>
        <div class="flex items-center px-6 py-8 shadow-md bg-white">
            <div class="flex-1">
            <div class="-mb-2 text-lg text-gray-600">Total Properties</div>
            <div class="text-5xl">{{ $total_properties }}</div>
            </div>
            <div><i class="material-icons ml-3 text-indigo-700 ico">apartment</i></div>
        </div>
        <div class="flex items-center px-6 py-8 shadow-md bg-white">
            <div class="flex-1">
            <div class="-mb-2 text-lg text-gray-600">Total Property Owners</div>
            <div class="text-5xl">{{ $total_property_owners }}</div>
            </div>
            <div><i class="material-icons ml-3 text-teal-500 ico">supervised_user_circle</i></div>
        </div>
        <div class="flex items-center px-6 py-8 shadow-md bg-white">
            <div class="flex-1">
            <div class="-mb-2 text-lg text-gray-600">Total Tenants</div>
            <div class="text-5xl">{{ $total_tenants }}</div>
            </div>
            <div><i class="material-icons ml-3 text-pink-500 ico">account_circle</i></div>
        </div>
        <div class="flex items-center px-6 py-8 shadow-md bg-white">
            <div class="flex-1">
            <div class="-mb-2 text-lg text-gray-600">Total One-Time Users</div>
            <div class="text-5xl">{{ $total_onetime_users }}</div>
            </div>
            <div><span class="material-icons ml-3 text-yellow-500 ico">contact_page</span></div>
        </div>
    </div>
</div>
@endsection
