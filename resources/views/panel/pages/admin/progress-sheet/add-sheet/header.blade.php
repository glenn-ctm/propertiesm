@if($errors->any())
<div class="flex flex-wrap">
    <div class="w-full px-2 mb-3">
        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
            <p class="font-bold">Failed on saving data to the database!</p>
            <p>The following errors orccured are:</p>
            <ul class="list-disc mt-3">
                {!! implode('', $errors->all('<li class="ml-5">:message</li>')) !!}
            </ul>
        </div>
    </div>
</div>
@endif


<div class="flex flex-wrap mb-4">
    <div class="w-full px-2 md:w-1/2 lg:w-1/2">
        <h1 class="pb-6 text-3xl text-black">{{ ucFirst($formType) }} Progress Sheet</h1>
    </div>
    <div class="w-full px-2 text-right md:w-1/2 lg:w-1/2">
        <button
            class="px-6 py-2 font-semibold text-center text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline"
            type="submit">Save</button>
        <a class="inline-block px-4 py-2 font-bold text-white bg-gray-500 rounded hover:bg-gray-700"
            href="{{ route('progress-sheets.index') }}">
            Cancel
        </a>
    </div>
</div>

<div class="flex flex-wrap mb-4">
    <div class="w-full mb-4 md:w-2/5 lg:w-2/5">
        <div class="flex items-center">
            <label for="property-address">Property Address: </label>
            <div class="w-full ml-1 mr-3 pr-5">
                <input
                    class="@error('propertyAddress') border-red-500 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-outline focus:bg-white"
                    id="property-address" name="propertyAddress" type="text"
                    value="{{ old('propertyAddress', optional($nProgSheet ?? null)['property_address']) }}">
                @error('propertyAddress') <span class="text-red-500 error">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="w-full mb-4 md:w-1/5 lg:w-1/5">
        <p class="flex items-center">
            <label for="date" class="w-20">MM/YYYY:</label>
            <span class="w-full ml-1 mr-3 pr-5">
                <input
                    class="@error('date') border-red-500 @else @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-outline focus:bg-white"
                    placeholder="MM/YYYY" id="date" name="date" type="text"
                    value="{{ old('date') ? old('date', optional($nProgSheet ?? null)->date) : date('m/Y', strtotime($nProgSheet['date']))}}"
                    readonly>
                @error('date') <span class="text-red-500 error">{{ $message }}</span> @enderror
            </span>
        </p>
    </div>
    <div class="w-full mb-4 md:w-1/5 lg:w-1/5">
        <p class="flex items-center">
            <label for="date" class="w-20">Status:</label>
            <span class="w-full ml-1 mr-3 pr-5">
                <select id="select" name="status"
                    class="@error('date') border-red-500 @else @enderror appearance-none w-full block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-outline focus:bg-white">
                    <option value="PENDING"
                        {{ old('status', optional($nProgSheet ?? null)['status']) === 'PENDING' ? 'selected' : '' }}>
                        Pending
                    </option>
                    <option value="ONGOING"
                        {{ old('status', optional($nProgSheet ?? null)['status']) === 'ONGOING' ? 'selected' : '' }}>
                        Ongoing
                    </option>
                    <option value="COMPLETED"
                        {{ old('status', optional($nProgSheet ?? null)['status']) === 'COMPLETED' ? 'selected' : '' }}>
                        Completed
                    </option>
                </select>
                @error('date') <span class="text-red-500 error">{{ $message }}</span> @enderror
            </span>
        </p>
    </div>
    <div class="w-full mb-4 md:w-1/5 lg:w-1/5">
        <p class="flex items-center">
            <label for="pin-id" class="w-16">PIN: </label>
            <span class="w-full ml-1 mr-3 pr-5">
                <input
                    class="@error('pin') border-red-500 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-outline focus:bg-white"
                    id="pin-id" name="pin" type="text" value="{{ old('pin', optional($user ?? null)->pin) }}">
                @error('pin') <span class="text-red-500 error">{{ $message }}</span> @enderror
            </span>
        </p>
    </div>
</div>
