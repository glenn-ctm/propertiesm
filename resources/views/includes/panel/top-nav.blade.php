<!-- Desktop Header -->
<header class="w-full flex items-center bg-white py-2 px-6 hidden sm:flex">
    <div class="w-1/2"></div>
    @php
        $media = auth()->user()->getFirstMedia('avatar');
        $profilePhoto = $media ? $media->getUrl('thumbnail') : '/static/profile-placeholder.png'
    @endphp
    <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end leading-5">
        <button @click="isOpen = !isOpen" class="realtive w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            <img src="{{$profilePhoto}}">
        </button>
        <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16 z-50" style="display: none">
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button class="w-full block px-4 py-2 account-link hover:text-white">
                    Sign Out
                </button>
            </form>
        </div>
    </div>
</header>
