<a x-on:click="addModal.open()"
  class="inline-block w-full px-10 py-2 mb-2 font-bold text-center text-white bg-blue-500 rounded modal-open sm:mb-0 sm:mr-5 hover:bg-blue-700 focus:outline-none focus:shadow-outline"
  href="#" data-toggle="modal" data-target="AddModal">
  Add
</a>
<!-- MODAL CONTAINER WITH BACKDROP -->
<div x-show="addModal.isOpening" x-cloak>

  <!-- MODAL -->
  <div :class="{ 'opacity-0': addModal.isOpening, 'opacity-100': addModal.isOpen() }"
    class="fixed top-0 left-0 z-50 w-full h-full transition-opacity duration-200 outline-none linear" tabindex="-1"
    role="dialog">
    <!-- MODAL DIALOG -->

    <div
      class="z-50 w-11/12 mx-auto mt-5 overflow-y-auto transition-all duration-200 ease-out bg-white rounded shadow-lg modal-container md:w-8/12 xl:w-6/12"
      :class="{ 'mt-4': addModal.isOpening, 'mt-8': addModal.isOpen() }">
      <div class="py-4 text-left modal-content">
        <!--Title-->
        <div class="flex items-center justify-between px-6 py-3">

          <h3 class="relative text-2xl font-light leading-6 text-gray-800">
            Add New Progress Sheet
          </h3>
          <div class="z-50 cursor-pointer modal-close" x-on:click="addModal.close()">
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
            <form class="w-full" method="get" action="{{ route('progress-sheets.create') }}">
              <div class="mb-6 md:flex md:items-center">
                <input
                  class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-BLUE-500"
                  type="month" name="date" value="2021-01" required>
              </div>
              <div class="mb-6 md:flex md:items-center">
                <input
                  class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-BLUE-500"
                  name="landScaping" type="number" placeholder="LANDSCAPING AMOUNT PER MONTH" required>
              </div>
              <div class="mb-6 md:flex md:items-center">
                <input
                  class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-BLUE-500"
                  name="siteCheck" type="number" placeholder="SITE CHECK AMOUNT PER VISIT (TWICE PER WEEK)" required>
              </div>
              <div class="flex w-full md:items-center">
                <button
                  class="w-1/2 px-4 py-2 mr-3 font-bold text-white bg-blue-500 rounded shadow hover:bg-blue-400 focus:shadow-outline focus:outline-none"
                  type="submit" value="Send">
                  ADD
                </button>
                <button x-on:click="addModal.close()"
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
  <div :class="{ 'opacity-25': addModal.isOpen() }"
    class="fixed top-0 bottom-0 left-0 right-0 z-40 transition-opacity duration-200 bg-black opacity-0 linear"></div>
</div>
