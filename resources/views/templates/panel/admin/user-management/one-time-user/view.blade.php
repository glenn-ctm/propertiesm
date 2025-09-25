@extends('layouts.panel')

@section('content')
<h1 class="text-3xl text-black px-2 mb-5">View One-Time User</h1>
<div class="container">
    <div class="h-36 w-36">
            <img src="https://www.isteducation.com/wp-content/uploads/2016/08/user.png" alt="Avatar" class="rounded-full h-100">
    </div>
    <div class="details mt-7 mb-5 leading-8">
        <p>
            <span class="font-semibold">PIN:</span>
            <span>RU0001</span>
        </p>
        <p>
            <span class="font-semibold">Full Name:</span>
            <span>Ricky Uy</span>
        </p>
        <p>
            <span class="font-semibold">Email:</span>
            <span>one-time-user@email.com</span>
        </p>
        <p>
            <span class="font-semibold">Address:</span>
            <span>3112 Doctors Drive Los Angeles, California 90017</span>
        </p>
        <p>
            <span class="font-semibold">Phone:</span>
            <span>123456789</span>
        </p>
    </div>
    <div>
        <a class="text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="edit">Edit Profile</a>
        <a class="text-center bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="show">Back</a>
    </div>
</div>
@endsection
