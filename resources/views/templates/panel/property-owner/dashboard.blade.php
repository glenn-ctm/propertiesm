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
    <div class="grid lg:grid-cols-3 gap-6 bg-gray-100">
        <div class="flex items-center px-8 py-10 shadow-lg bg-white">
            <div class="flex-1">
            <div class=" mb-2 text-lg font-semibold uppercase">Total Ongoing Requests</div>
            <div class="text-2xl">135</div>
            </div>
            <div><i class="material-icons ml-3 text-green-500 ico">restore_page</i></div>
        </div>
        <div class="flex items-center px-8 py-10 shadow-lg bg-white">
            <div class="flex-1">
            <div class=" mb-2 text-lg font-semibold uppercase">Total Completed Requests</div>
            <div class="text-2xl">623</div>
            </div>
            <div><i class="material-icons ml-3 text-orange-500 ico">assignment_turned_in</i></div>
        </div>
        <div class="flex items-center px-8 py-10 shadow-lg bg-white">
            <div class="flex-1">
            <div class=" mb-2 text-lg font-semibold uppercase">Total Properties</div>
            <div class="text-2xl">150</div>
            </div>
            <div><i class="material-icons ml-3 text-indigo-700 ico">apartment</i></div>
        </div>
    </div>
</div>
@endsection
