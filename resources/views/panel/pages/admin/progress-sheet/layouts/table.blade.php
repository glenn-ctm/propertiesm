<table class="w-full border-collapse">
    <thead class="text-white bg-gray-800">
        <tr>
            <th class="hidden p-3 font-bold uppercase border border-gray-300 lg:table-cell">PIN</th>
            <th class="hidden p-3 font-bold uppercase border border-gray-300 lg:table-cell">NAME</th>
            <th class="hidden p-3 font-bold uppercase border border-gray-300 lg:table-cell">DATE</th>
            <th class="hidden p-3 font-bold uppercase border border-gray-300 lg:table-cell">PROPERTY ADDRESS</th>
            <th class="hidden p-3 font-bold uppercase border border-gray-300 lg:table-cell">COMMENTS</th>
            <th class="hidden p-3 font-bold uppercase border border-gray-300 lg:table-cell">STATUS</th>
            <th class="hidden p-3 font-bold uppercase border border-gray-300 lg:table-cell">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <template x-for="(item, index) in items" :key="index">
            <tr
                class="flex flex-row flex-wrap mb-10 bg-white lg:hover:bg-gray-100 lg:table-row lg:flex-row lg:flex-no-wrap lg:mb-0">
                <td
                    class="relative block w-full p-3 text-center text-gray-800 border border-b lg:w-auto lg:table-cell lg:static">
                    <span
                        class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">PIN</span>
                    <span x-text="item.user.pin"></span>
                </td>
                <td
                    class="relative block w-full p-3 text-center text-gray-800 border border-b lg:w-auto lg:table-cell lg:static">
                    <span
                        class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">PIN</span>
                    <span x-text="item.user.name"></span>
                </td>
                <td
                    class="relative block w-full p-3 text-center text-gray-800 border border-b lg:w-auto lg:table-cell lg:static">
                    <span
                        class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">DATE</span>
                    <span x-text="formatDateToMonthYear(item.date)"></span>
                </td>
                <td
                    class="relative block w-full p-3 text-center text-gray-800 border border-b lg:w-auto lg:table-cell lg:static">
                    <span class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">
                        PROPERTY
                        ADDRESS </span>
                    <span x-text="item.property_address"></span>
                </td>
                <td
                    class="relative block w-full lg:w-2/6 p-3 text-center text-gray-800 border border-b lg:w-auto lg:table-cell lg:static">
                    <span x-text="item.comment" class="ellipsis"></span>
                </td>
                <td
                    class="relative block w-full p-3 text-center text-gray-800 border border-b lg:w-auto lg:table-cell lg:static">
                    <span
                        class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">STATUS</span>
                    <span class="px-3 py-1 text-xs font-bold rounded-full" :class="statusColor(item.status)">
                        <span x-text="item.status"></span>
                    </span>
                </td>
                <td
                    class="leading-7 relative block w-full p-3 text-center text-gray-800 border border-b lg:w-auto lg:table-cell lg:static">
                    <span
                        class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">Actions</span>

                    @can('create progress_sheets')
                    <!-- duplicate modal -->
                    @include('panel.pages.admin.progress-sheet.modals.duplicate-modal')
                    <!-- duplicate modal -->
                    @endcan


                    <a class="px-2 py-1 text-sm text-green-800 bg-green-200 border border-green-400 rounded-full hover:text-green-600"
                        href="view" x-bind:href="`/panel/progress-sheets/${item.id}`">View</a>

                    @can('update progress_sheets')
                    <a class="px-2 py-1 text-sm text-blue-800 bg-blue-200 border border-blue-400 rounded-full hover:text-blue-600"
                        x-bind:href="`/panel/progress-sheets/${item.id}/edit`">Edit</a>
                    @endcan
                    @can('update progress_sheets')
                    <!-- delete modal -->
                    @include('panel.pages.admin.progress-sheet.modals.delete-modal')
                    <!-- delete modal -->
                    @endcan
                </td>
            </tr>
        </template>
    </tbody>
</table>

@unless (count($sheets))
<div class="p-5 text-center">No available data.</div>
@endunless


{{ $sheets->links() }}
