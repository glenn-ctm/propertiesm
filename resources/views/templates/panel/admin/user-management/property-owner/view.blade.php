@extends('layouts.panel')

@section('content')
<h1 class="text-3xl text-black px-2 mb-5">View Property Owner</h1>
<div class="container">
    <div class="avatar w-36 h-36">
        <img src="https://www.isteducation.com/wp-content/uploads/2016/08/user.png" alt="Avatar" class="rounded-full">
    </div> 
    <div class="details mt-7 mb-5 leading-8">
        <p>
            <span class="font-semibold">PIN:</span>
            <span>PO0001</span>
        </p>
        <p>
            <span class="font-semibold">Full Name:</span>
            <span>Jane Doe</span>
        </p>
        <p>
            <span class="font-semibold">Email:</span>
            <span>email@email.com</span>
        </p>
        <p>
            <span class="font-semibold">Phone:</span>
            <span>1234567890</span>
        </p>
        <p>
            <span class="font-semibold">Number of Units on Contract:</span>
            <span>50</span>
        </p>
        <p>
            <span class="font-semibold">Number of Properties on Contract:</span>
            <span>50</span>
        </p>
        <p>
            <span class="font-semibold">Address:</span>
            <span>3112 Doctors Drive, Los Angeles, California 90017</span>
        </p>
        <p>
            <span class="font-semibold">Status:</span>
            <span>Pending</span>
        </p>
    </div>
    <div>
        <a class="text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="edit">Edit Profile</a>
        <a class="text-center bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="show">Back</a>
    </div>
</div>
@endsection
