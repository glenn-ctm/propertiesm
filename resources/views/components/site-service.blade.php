<div>
    <div class="container-fluid section-one">
        <div class="flex justify-center">
            <h1 class="text-white text-center py-16 sm:py-40 text-3xl sm:text-4xl">{{ $title }}</h1>
        </div>
    </div>
    <div class="container m-auto">
        <div class="flex flex-wrap mx-2">
            <div class="w-full md:w-1/4"></div>
            <div class="w-full md:w-2/4 bg-white my-10">
                @livewire('site.components.get-a-quote')
            </div>
            <div class="w-full md:w-1/4"></div>
        </div>
    </div>
</div>
