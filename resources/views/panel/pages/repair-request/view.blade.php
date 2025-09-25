<div class="flex flex-col sm:flex-row mx-2 mb-4">
    <ul class="leading-10 w-full sm:w-2/3">
        <li>
            <span class="w-full md:w-60 inline-block font-semibold">Full Name:</span>
            <span>{{ $repairRequest->user?->name ?? 'Deleted User' }}</span>
        </li>
        <li>
            <span class="w-full md:w-60 inline-block font-semibold">PIN:</span>
            <span>{{ $repairRequest->user?->pin }}</span>
        </li>
        <li>
            <span class="w-full md:w-60 inline-block font-semibold">Contact No.:</span>
            <span>{{ $repairRequest->contact_number }}</span>
        </li>
        <li>
            <span class="w-full md:w-60 inline-block font-semibold">Date/Time:</span>
            <span>{{ $repairRequest->created_at->format('m/d/Y - h:i A') }}</span>
        </li>
        <li>
            <span class="w-full md:w-60 inline-block font-semibold">Email:</span>
            <span>{{ $repairRequest->user?->email }}</span>
        </li>
        <li>
            <span class="w-full md:w-60 inline-block font-semibold">Address:</span>
            <span>{{ $repairRequest->address }} </span>
        </li>
        <li>
            <span class="w-full md:w-60 inline-block font-semibold">Further Information:</span>
            <span>{{  $repairRequest->remarks }}</span>
        </li>
        @if ($admin_comment = $repairRequest->comment)
            <li>
                <span class="w-full md:w-60 inline-block font-semibold">Admin Comment/s:</span>
                <span>{{ $admin_comment }}</span>
            </li>
        @endif
    </ul>
    <div class="status w-full text-left sm:text-right sm:w-1/3">
        <span
        class="rounded-full text-gray-700py-1 px-5 text-lg font-semibold
        @switch($repairRequest->status)
            @case( App\Enums\RepairRequestStatus::PENDING )
                bg-red-200
                @break
            @case( App\Enums\RepairRequestStatus::ONGOING )
                bg-orange-200
                @break
            @case( App\Enums\RepairRequestStatus::COMPLETED )
                bg-green-200
                @break
            @default

        @endswitch
        ">{{ $repairRequest->status }}</span>
    </div>
</div>

@if ( $repairRequest->user?->is_property_owner() )
    <div class="w-full border rounded border-gray-200 mx-2 px-2 pb-5 my-8">
        <div class="flex flex-wrap items-center ml-2 mb-2 -mt-7">
            <label class="uppercase mt-3 px-2 bg-white text-gray-700 leading-8 font-semibold" for="inline-description">
                Project/Job Description
            </label>
        </div>
        <ul class="leading-8 md:leading-10 flex-1 px-2 md:px-5">
            <li>
                <span class="w-28 md:w-56 inline-block font-semibold">Maintenance:</span>
                <span>{{ implode(', ' , $repairRequest->maintenance && is_array($repairRequest->maintenance) ? $repairRequest->maintenance : []) }}</span>
            </li>
            <li>
                <span class="w-28 md:w-56 inline-block font-semibold">Landscaping:</span>
                <span>{{ str_replace(', ', ', ', $repairRequest->landscaping) }}</span>
            </li>
            <li>
                <span class="w-28 md:w-56 inline-block font-semibold">Management Needs:</span>
                <span>{{ implode(', ' , $repairRequest->management_needs && is_array($repairRequest->management_needs) ? $repairRequest->management_needs : []) }}</span>
            </li>
            <li>
                <span class="w-28 md:w-56 inline-block font-semibold">Inspections:</span>
                <span>{{ implode(', ' , $repairRequest->inspections && is_array($repairRequest->inspections) ? $repairRequest->inspections : []) }}</span>
            </li>
            <li>
                <span class="w-28 md:w-56 inline-block font-semibold">Frequency of Inspections:</span>
                <span>{{ $repairRequest->frequency_of_inspection }}</span>
            </li>
        </ul>
    </div>
@endif
