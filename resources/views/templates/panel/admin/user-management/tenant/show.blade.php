@extends('layouts.panel')

@push('css')
<style>
a {
    transition: all .3s;
}
a:hover {
    transform: scale(1.03);
    box-shadow: 0 2rem 5rem rgba(0,0,0,.1);
}
</style>
@endpush

@section('content')
<h1 class="text-3xl text-black px-2 mb-5">Choose property to see tenants</h1>
<div class="flex mb-4">
  <a href="/admin/user-management/tenant/per-property/show" class="bg-gray-400 p-5 mx-4 rounded-lg shadow justify-center flex flex-1 items-center h-40 text-white">
    <div class="text-white">
        3112 Doctors Drive, Los Angeles, CA 90017
        <p class="text-green-200 font-semibold mt-2">50 Tenants</p>
    </div>
  </a>
  <a href="/admin/user-management/tenant/per-property/show" class="bg-gray-400 p-5 mx-4 rounded-lg shadow justify-center flex flex-1 items-center h-40">
    <div class="text-white">
        3112 Doctors Drive, Los Angeles, CA 90017
        <p class="text-green-200 font-semibold mt-2">50 Tenants</p>
    </div>
</a>
  <a href="/admin/user-management/tenant/per-property/show" class="bg-gray-400 p-5 mx-4 rounded-lg shadow justify-center flex flex-1 items-center h-40">
    <div class="text-white">
        3112 Doctors Drive, Los Angeles, CA 90017
        <p class="text-green-200 font-semibold mt-2">50 Tenants</p>
    </div>
</a>
  <a href="/admin/user-management/tenant/per-property/show" class="bg-gray-400 p-5 mx-4 rounded-lg shadow justify-center flex flex-1 items-center h-40">
    <div class="text-white">
        3112 Doctors Drive, Los Angeles, CA 90017
        <p class="text-green-200 font-semibold mt-2">50 Tenants</p>
    </div>
</a>
  <a href="/admin/user-management/tenant/per-property/show" class="bg-gray-400 p-5 mx-4 rounded-lg shadow justify-center flex flex-1 items-center h-40">
    <div class="text-white">
        3112 Doctors Drive, Los Angeles, CA 90017
        <p class="text-green-200 font-semibold mt-2">50 Tenants</p>
    </div>
</a>
</div>
@endsection
