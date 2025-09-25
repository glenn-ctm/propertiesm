<div class="bg-gray-800" x-data={show:false}>
    @if($user !== null)
        <div class="md:container md:mx-auto relative">
            <div :class="{ 'p-1': !show }" class="w-full p-1"></div>
            <div :class="{ 'hidden': !show }" class="hidden">
                <div class="px-2 sm:px-3 py-5 sm:py-3 text-white">
                    <div class="sm:flex sm:items-center">
                        <div class="mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3"/><circle cx="12" cy="10" r="3"/><circle cx="12" cy="12" r="10"/>
                            </svg>
                        </div>
                        <div class="text-sm mt-2 mr-auto">
                            <div class="mb-1 font-light">
                                <strong>Name: </strong><span class="pl-1">{{ $user->name }}</span>
                            </div>
                            <div class="mb-1 font-light">
                                <strong>Email: </strong><span class="pl-1">{{ $user->email }}</span>
                            </div>
                        </div>
                        @if (auth()->user()->type_name === 'Regular' )
                        @else
                            <a href="/panel/dashboard" target="_blank" class="mt-1 sm:mt-0 mr-2 text-sm bg-blue-700 text-gray-200 rounded hover:bg-blue-600 px-4 py-2 focus:outline-none">
                                My Dashboard
                            </a>
                        @endif

                        <form action="{{ route('logout') }}" method="POST" class="text-sm mt-3 sm:mt-0">
                            @csrf
                            <button class="bg-red-700 inline-block text-gray-200 rounded hover:bg-red-600 px-4 py-2 focus:outline-none flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 17l5-5-5-5M19.8 12H9M10 3H4v18h6"/></svg>
                                <span class="pl-1">Logout</span>
                            </button>
                        </form>
                    </div>



                </div>
            </div>
            <div class="absolute right-0">
                <button  @click="show=!show" class="bg-gray-800 text-gray-200 rounded-b hover:bg-gray-700 px-4 py-2 text-sm focus:outline-none" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline>
                        </svg>
                </button>
            </div>
        </div>
    @endif
</div>
