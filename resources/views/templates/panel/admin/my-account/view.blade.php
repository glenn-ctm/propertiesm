@extends('layouts.panel')

@section('content')
<h1 class="text-3xl text-black px-2 mb-5">My Account</h1>
<div class="container">
    <div class="h-36 w-36">
            <img src="https://www.isteducation.com/wp-content/uploads/2016/08/user.png" alt="Avatar" class="rounded-full h-100">
    </div>
    <div class="details mt-7 mb-5 leading-8">
        <p>
            <span class="font-semibold">Admin PIN:</span>
            <span>JD0001</span>
        </p>
        <p>
            <span class="font-semibold">Full Name:</span>
            <span>John Doe</span>
        </p>
        <p>
            <span class="font-semibold">Email:</span>
            <span>johndoe@email.com</span>
        </p>
        <p>
            <span class="font-semibold">Phone:</span>
            <span>123456789</span>
        </p>
        <p>
            <span class="font-semibold">Address:</span>
            <span>3112 Doctors Drive Los Angeles, California 90017</span>
        </p>
    </div>
    <div>
        <a class="bg-gray-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded" href="/admin/my-account/edit">Edit Profile</a>
    </div>
</div>
@endsection
