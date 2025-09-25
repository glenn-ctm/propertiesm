<a x-on:click="deleteModal.open(item.id)" type="button" href="#"
    class="px-2 py-1 text-sm text-red-800 bg-red-200 border border-red-400 rounded-full dlete-button modal-open hover:text-red-600 inline leading-4"
    data-toggle="modal" data-target="#exampleModalTwo">
    Delete
</a>

<!-- MODAL CONTAINER WITH BACKDROP -->
<div x-show="deleteModal.isOpening" x-cloak>

    <!-- MODAL -->
    <div :class="{ 'opacity-0': deleteModal.isOpening, 'opacity-100': deleteModal.isOpen() }"
        class="fixed top-0 left-0 z-50 w-full h-full transition-opacity duration-200 outline-none linear" tabindex="-1"
        role="dialog">
        <!-- MODAL DIALOG -->

        <div class="z-50 w-11/12 mx-auto mt-5 overflow-y-auto transition-all duration-200 ease-out bg-white rounded shadow-lg modal-container md:w-8/12 xl:w-3/12"
            :class="{ 'mt-4': deleteModal.isOpening, 'mt-8': deleteModal.isOpen() }">

            <div class="py-4 text-left modal-content">
                <!--Title-->
                <div class="flex items-center justify-between px-6 py-3">
                    <h3 class="relative text-2xl font-light leading-6 text-gray-800">
                        Delete Progress Sheet
                    </h3>
                    <div class="z-50 cursor-pointer modal-close" x-on:click="deleteModal.close()">
                        <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <div class="px-6 my-4">
                    <div class="overflow-hidden rounded">

                        <form class="w-full" x-bind:action="`/panel/progress-sheets/${deleteModal.itemId}`"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="mb-6 md:flex md:items-center">
                                Are you sure you want to delete this?
                            </div>

                            <div class="flex w-full md:items-center">
                                <button
                                    class="w-1/2 px-4 py-2 mr-3 font-bold text-white bg-blue-500 rounded shadow hover:bg-blue-400 focus:shadow-outline focus:outline-none"
                                    type="submit">
                                    YES
                                </button>
                                <button x-on:click="deleteModal.close()"
                                    class="w-1/2 px-4 py-2 font-bold text-white bg-gray-500 rounded shadow modal-close hover:bg-gray-400 focus:shadow-outline focus:outline-none"
                                    type="button">
                                    CANCEL
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BACKDROP -->
    <div :class="{ 'opacity-25': deleteModal.isOpen() }"
        class="fixed top-0 bottom-0 left-0 right-0 z-40 transition-opacity duration-200 bg-black opacity-0 linear">
    </div>
</div>
