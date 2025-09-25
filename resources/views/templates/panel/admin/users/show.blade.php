<div>
    <h1 class="text-3xl text-black mb-5">View User</h1>
    <div class="container">
        <div class="avatar w-32 h-32">
            {{-- TODO: upload image--}}
            <img src="https://www.isteducation.com/wp-content/uploads/2016/08/user.png" alt="Avatar" class="rounded-md">
        </div>
        <div class="details mt-7 mb-5">
            <p class="mb-2">PIN: <span class="font-semibold">{{ $user->pin }}</span></p>
            <p class="mb-2">Full Name: <span class="font-semibold">{{ $user->name }}</span></p>
            <p class="mb-2">Email: <span class="font-semibold">{{ $user->email }}</span></p>
            <p class="mb-2">Contact No.: <span class="font-semibold">{{ $user->contact_number }}</span></p>
            <p class="mb-2">Address: <span class="font-semibold">{{ $user->address }}</span></p>
            <p class="mb-2">City: <span class="font-semibold">{{ $user->city }}</span></p>
            <p class="mb-2">ZIP: <span class="font-semibold">{{ $user->zip_code }}</span></p>
            <p class="mb-2">Status: <span class="font-semibold">{{ $user->hasVerifiedEmail() ? 'Verified' : 'Pending' }}</span></p>

            @if ($user->type() === 'PO')
                <p class="mb-2">Number of Units on Contract: <span class="font-semibold">50</span></p>
                <p class="mb-2">Number of Properties on Contract: <span class="font-semibold">50</span></p>
            @endif
        </div>
        <div>
            <button class="text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" wire:click="edit({{ $user->id }})">Edit Profile</button>
        </div>
    </div>
</div>
