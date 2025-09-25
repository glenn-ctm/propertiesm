@push('css')
    <style>
        /* width */
        #desktop-aside::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        #desktop-aside::-webkit-scrollbar-track {
            background: #3d68ff;
        }

        /* Handle */
        #desktop-aside::-webkit-scrollbar-thumb {
            background: #989898;
        }

        /* Handle on hover */
        #desktop-aside::-webkit-scrollbar-thumb:hover {
            background: #6f6f6f;
        }
    </style>
@endpush

<aside id="desktop-aside" class="relative bg-sidebar h-auto w-64 hidden sm:block shadow-xl overflow-y-auto h-screen">
    <div id="desktop-loggedin-info-header" class="items-center py-10">
        <a href="#">
            <div class="avatar w-12 h-12 m-auto">
                @php
                $media = auth()->user()->getFirstMedia('avatar');
                $profilePhoto = $media ? $media->getUrl('thumbnail') : '/static/profile-placeholder.png'
                @endphp
                <img src="{{$profilePhoto}}" alt="Avatar" class="rounded-full p-1 bg-darker border-1 w-12 h-12">
            </div>
            <div class="leading-none text-center text-white">

                <div class="mb-1"><strong>{{ auth()->user()->name }}</strong></div>

                <small class="text-muted text-xs">ID: {{ auth()->user()->pin }}</small>
            </div>
        </a>
    </div>


    <nav id="desktop-nav" class="nav text-white text-base font-semibold pt-3">

        @if(!auth()->user()->is_tenant())
        <a href="{{ route('dashboard.index') }}"
            class="@if(explode( '.', request()->route()->getName() )[0] === 'dashboard') active @endif font-semibold text-sm uppercase flex items-center text-white opacity-75 hover:opacity-100 py-4 px-3 nav-item">
            <span class="material-icons mr-3">dashboard</span> Dashboard
        </a>
        @else
        <div
            class="@if(explode( '.', request()->route()->getName() )[0] === 'dashboard') active @endif font-semibold text-sm uppercase flex items-center text-white opacity-75 hover:opacity-100 py-4 px-3 nav-item">
            <span class="material-icons mr-3">dashboard</span> Dashboard
        </div>
        @endif

        @can('update users')
        <a href="{{ route('users.show', auth()->user()->id) }}"
            class="@if(explode( '.', request()->route()->getName() )[0] === 'users' && request()->route()->user?->id === auth()->user()->id) active @endif font-semibold text-sm uppercase flex items-center text-white opacity-75 hover:opacity-100 py-4 px-3 nav-item">
            <span class="material-icons mr-3">account_circle</span>My Account
        </a>
        @endcan

        @can('read progress_sheets')
            <a href="{{ route('progress-sheets.index') }}" class="@if(explode( '.', request()->route()->getName() )[0] === 'progress-sheets') active @endif font-semibold text-sm uppercase flex items-center text-white opacity-75 hover:opacity-100 py-4 px-3 nav-item">
                <span class="material-icons mr-3"> sticky_note_2 </span>Progress Sheet
            </a>
        @endcan

        <a href="{{ route('repair-requests.index') }}"
            class="@if(explode( '.', request()->route()->getName() )[0] === 'repair-requests') active @endif font-semibold text-sm uppercase flex items-center text-white opacity-75 hover:opacity-100 py-4 px-3 nav-item">
            <span class="material-icons mr-3"> request_quote </span>Repair Requests
        </a>

        @can('read users')
            <div x-data="{ open: false }">
                <button @click="open = !open" class="@if((explode( '.', request()->route()->getName() )[0] === 'users' || explode( '.', request()->route()->getName() )[0] === 'tenants') && request()->route()->user?->id !== auth()->user()->id ) active @endif focus:outline-none w-full font-semibold text-sm uppercase flex items-center text-white opacity-75 hover:opacity-100 py-4 px-3 nav-item">
                    <span class="flex items-center">
                        <span class="material-icons">account_box</span>
                        <span class="ml-3 font-bold">User Management</span>
                    </span>
                    <span>
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                            <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </button>
                <div x-show="open" style="display: none;" class="text-white">
                    <a class="@if(explode( '.', request()->route()->getName() )[0] === 'users' && request()->type === 'property-owners') active @endif font-semibold text-sm uppercase flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-12 nav-item" href="{{ route('users.index', ['type' => 'property-owners']) }}">
                        Property Owner
                    </a>
                    <a class="@if(explode( '.', request()->route()->getName() )[0] === 'tenants') active @endif font-semibold text-sm uppercase flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-12 nav-item" href="{{ route('tenants.properties.index') }}">
                        Tenant
                    </a>
                    <a class="@if(explode( '.', request()->route()->getName() )[0] === 'users' && request()->type === 'regular') active @endif font-semibold text-sm uppercase flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-12 nav-item" href="{{ route('users.index', ['type' => 'regular']) }}">
                        One-Time User
                    </a>
                    <a class="@if(explode( '.', request()->route()->getName() )[0] === 'users' && request()->type === 'admin') active @endif font-semibold text-sm uppercase flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-12 nav-item" href="{{ route('users.index', ['type' => 'admin']) }}">
                        Admin
                    </a>
                    @can('create users')
                        <a class="@if(explode( '.', request()->route()->getName() )[0] === 'users' && request()->type === 'super-admin') active @endif  font-semibold text-sm uppercase flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-12 nav-item" href="{{ route('users.index', ['type' => 'super-admin']) }}">
                            Super Admin
                        </a>
                    @endcan
                </div>
            </div>
        @endcan

        @can('read payments')
            <a href="{{ route('payments.index') }}" class="@if(explode( '.', request()->route()->getName() )[0] === 'payments') active @endif font-semibold text-sm uppercase flex items-center text-white opacity-75 hover:opacity-100 py-4 px-3 nav-item">
            <span class="material-icons mr-3"> payment </span>Payments
        </a>
        @endcan

        {{-- @if(auth()->user()->is_tenant())
        <a
        href="/panel/vids-recs-pics"
        class="@if(explode( '.', request()->route()->getName() )[0] === 'vids-recs-pics') active @endif font-semibold text-sm uppercase flex items-center text-white opacity-75 hover:opacity-100 py-4 px-3 nav-item">
            <span class="material-icons mr-3"> videocam </span>Vid/Rec/Pic
        </a>
        @endif --}}

        @can('read videos_recordings_pictures')
            <a
            href="/panel/vids-recs-pics"
            class="@if(explode( '.', request()->route()->getName() )[0] === 'vids-recs-pics') active @endif font-semibold text-sm uppercase flex items-center text-white opacity-75 hover:opacity-100 py-4 px-3 nav-item">
                <span class="material-icons mr-3"> videocam </span>Vid/Rec/Pic
            </a>
        @endcan

        @can('read properties')
            <a href="{{ route('properties.index') }}" class="@if(explode( '.', request()->route()->getName() )[0] === 'properties') active @endif font-semibold text-sm uppercase flex items-center text-white opacity-75 hover:opacity-100 py-4 px-3 nav-item">
                <span class="material-icons mr-3"> apartment </span>{{ auth()->user()->is_property_owner() ? 'Properties' : 'Property Listing' }}
            </a>
        @endcan

        
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="w-full font-semibold text-sm uppercase flex items-center text-white opacity-75 hover:opacity-100 py-4 px-3 nav-item">
                <span class="material-icons mr-3"> logout </span>Sign Out
            </button>
        </form>
    </nav>

    <div id="desktop-loggedin-info-footer" class="absolute w-full upgrade-btn bottom-0 bg-blue-900 text-white items-center justify-center p-4">
        <div class="text-sm">Logged in as: {{  auth()->user()->type_name }} </div>
    </div>
</aside>

@push('script')
    <script>
        function desktopNavScroll() {
            const desktopAsideElement = document.querySelector('#desktop-aside');
            const desktopBodyContentElement = document.querySelector('#desktop-body-content');
            const desktopLoggedinInfoFooterElement = document.querySelector('#desktop-loggedin-info-footer');

            const desktopBodyContentOffsetHeight = desktopBodyContentElement.offsetHeight;
            const desktopAsideOffsetHeight = desktopAsideElement.offsetHeight;

            desktopLoggedinInfoFooterElement.classList.remove('absolute');

            if(desktopBodyContentOffsetHeight < desktopAsideOffsetHeight) {
                desktopLoggedinInfoFooterElement.classList.add('absolute');
            }
        }
        window.addEventListener("resize", () => {
            desktopNavScroll();
        });
        desktopNavScroll();
    </script>
@endpush
