@php
$user = optional($user ?? auth()->user());
@endphp
<div class="px-2 py-5 mt-0 mb-4 rounded bg-cyan-100 bg-lead sm:py-8 sm:mt-5 sm:mb-8">
    <table class="flex justify-center text-xs table-fixed sm:text-sm">
        <tr>
            <td class="py-1 pr-3 text-right sm:py-0">Name</td>
            <td class="py-1 pl-3 font-semibold text-left sm:py-0">{{ $user->name }}</td>
        </tr>
        <tr>
            <td class="py-1 pr-3 text-right sm:py-0">Email</td>
            <td class="py-1 pl-3 font-semibold text-left sm:py-0">{{ $user->email }}</td>
        </tr>
        <tr>
            <td class="py-1 pr-3 text-right sm:py-0">Address</td>
            <td class="py-1 pl-3 font-semibold text-left sm:py-0">
                {{ $user->unit_number }} {{ $user->address }} {{ $user->city }} {{ $user->zip_code }}
            </td>
        </tr>
    </table>
</div>
