<div class="flex items-center">
     @foreach ($steps as $step)
        @php
            $isActive = $steps->isActive($step);
            $trailing = $steps->isTrailing($step);
            $checkIcon = $trailing || ($loop->last && $isActive);
        @endphp
        <div class="relative flex items-center text-white">
            <div
                class="bottom-10 text-center absolute -ml-12 mt-12 w-32 font-medium text-sm sm:text-md {{ $isActive || $checkIcon ? 'text-green-500' : 'text-gray-500' }}">
                {{ $step->description }}</div>
            <div
                class="flex items-center justify-center rounded-full transition duration-500 ease-in-out h-8 w-8 py-2 border-2 {{ $isActive || $checkIcon ? 'border-green-500' : 'border-gray-500' }} {{ $checkIcon ? 'bg-green-500' : '' }}">

                @if ($isActive && !$loop->last)
                    <span class="text-sm text-green-500 material-icons">
                        fiber_manual_record
                    </span>
                @elseif($checkIcon)
                    <span class="text-sm text-white material-icons">
                        done
                    </span>
                @endif
            </div>
        </div>
        @if (!$loop->last)
            <div
                class="flex-auto border-t-2 transition duration-500 ease-in-out {{ $trailing ? 'border-green-300' : 'border-gray-300' }}">
            </div>
        @endif
    @endforeach
</div>
