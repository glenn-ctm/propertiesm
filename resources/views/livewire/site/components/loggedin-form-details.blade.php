<div class="w-full">
    @if($user !== null)
        <div class="mb-4">
            <input disabled value="{{ $user->name }}" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline" id="fullName" type="text" placeholder="Full Name*">
        </div>
        <div class="mb-4">
            <input disabled value="{{ $user->address }}" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline" id="address" type="text" placeholder="Address*">
        </div>
        <div class="flex flex-wrap -mx-2">
            @if(!$user->is_property_owner())
                <div class="w-full md:w-1/3 px-2 mb-6 md:mb-0">
                    <input disabled value="{{ $user->unit_number }}" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline" id="unitNo" type="number" placeholder="Unit #*">
                </div>
            @endif
            <div class="w-full {{ $user->is_property_owner() ?: 'md:w-1/3' }} px-2 mb-4">
                <input disabled value="{{ $user->city }}" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline" id="city" type="text" placeholder="City*">
            </div>
            <div class="w-full {{ $user->is_property_owner() ?: 'md:w-1/3' }} px-2 mb-4">
                <input disabled value="{{ $user->zip_code }}" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline" id="zip" type="text" placeholder="Zip*">
            </div>
        </div>
        <div class="mb-4">
            <input disabled value="{{ $user->email }}" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email*">
        </div>
        <div class="mb-4">
            <input disabled value="{{ $user->contact_number }}" class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline" id="contact" type="tel" placeholder="Contact Number*">
        </div>
    @endif
</div>
