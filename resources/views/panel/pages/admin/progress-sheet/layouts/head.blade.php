<div class="w-full px-2 mb-5 sm:w-1/2">
    <h1 class="text-3xl text-black">Progress Sheet</h1>
</div>

<div class="flex-row flex-wrap w-full px-2 mt-5 mb-4 sm:flex sm:w-1/2">

    <div class="w-full sm:w-3/12">
        @can('create progress_sheets')
            <!-- add modal -->
            @include('panel.pages.admin.progress-sheet.modals.add-modal')
            <!-- add modal -->
        @endcan
    </div>

    <div class="w-full sm:w-9/12">
        @if ( auth()->user()->is_admin() || auth()->user()->is_super_admin() )
        <form>
            <div class="flex rounded shadow">
                    <input class="w-full p-2 ml-0 sm:ml-3 focus:outline-none" name="search" type="text"
                        value="{{ request()->input('search') }}" placeholder="Search by Name or PIN">
                    @can('read progress_sheets')
                    <button class="flex items-center justify-end w-auto p-2 text-blue-500 bg-white rounded hover:text-blue-400">
                        <i class="material-icons">search</i>
                    </button>
                    @endcan
            </div>
        </form>
        @endif
    </div>
</div>
