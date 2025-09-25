<div>
    @foreach ($items as $item)
        <div class="border flex items-center bg-white pl-2 pr-4 py-2 rounded-lg my-1">
            <img src="{{ $item->getUrl() }}" class="object-cover rounded-lg w-12 h-10">
            <div class="flex-1 px-3 w-full truncate">
                <span class="text-gray-800">{{ $item->name }}</span>
            </div>
            <svg x-show="item.done" class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div class="cursor-pointer" wire:click="removeMedia({{$item->id}})">&times;</div>
        </div>
    @endforeach
</div>
