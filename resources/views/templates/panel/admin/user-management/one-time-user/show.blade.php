@extends('layouts.panel')

@section('content')
<div class="flex flex-wrap">
    <div class="w-full md:w-1/2 lg:w-1/2 px-2 mb-4">
        <h1 class="text-3xl text-black">One-Time Users</h1>
    </div>

    <div class="w-full flex md:w-1/2 lg:w-1/2 px-2 mb-4 text-right mt-5">

        <div class="shadow flex w-full">
            <input class="w-full rounded p-2 focus:outline-none" type="text" placeholder="Search by Name or PIN">
            <button class="rounded bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">
                <i class="material-icons">search</i>
            </button>
        </div>
    </div>
</div>
<div class="pb-8 w-full">
    <div class="shadow overflow-hidden rounded border-b border-gray-200">
        <table class="border-collapse w-full">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">PIN</th>
                    <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">FULL NAME</th>
                    <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">ADDRESS</th>
                    <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">EMAIL</th>
                    <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">CONTACT NO.</th>
                    <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">NO. OF REQUESTS</th>
                    <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">NO. OF PAYMENTS</th>
                    <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">PIN</span>
                        RU0001
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">FULL NAME</span>
                        Ricky Gill
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ADDRESS</span>
                        3112 Doctors Drive, Los Angeles, CA 90017
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">EMAIL</span>
                        user@email.com
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">CONTACT NO.</span>
                        21543531321
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">NO. OF REQUESTS</span>
                        <a href="/admin/user-management/one-time-user/per-property/request-history">2</a>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">NO. OF PAYMENTS</span>
                        <a href="/admin/user-management/one-time-user/per-property/payment-history">2</a>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                        <a class="text-sm hover:text-green-600 text-green-800 border rounded-full bg-green-200 border-green-400 px-2 py-1" href="view">View</a>
                        <a href="edit" class="text-sm hover:text-blue-600 text-blue-800 border rounded-full bg-blue-200 border-blue-400 px-2 py-1">Edit</a>
                        <a class="modal-open text-sm hover:text-red-600 text-red-800 border rounded-full bg-red-200 border-red-400 px-2 py-1" href="#">Delete</a>
                    </td>
                </tr>
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">PIN</span>
                        RU0002
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">FULL NAME</span>
                        Ann Wood
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ADDRESS</span>
                        3112 Doctors Drive, Los Angeles, CA 90017
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">EMAIL</span>
                        user@email.com
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">CONTACT NO.</span>
                        21543531321
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">NO. OF REQUESTS</span>
                        <a href="#">1</a>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">NO. OF PAYMENTS</span>
                        <a href="#">1</a>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                        <a class="text-sm hover:text-green-600 text-green-800 border rounded-full bg-green-200 border-green-400 px-2 py-1" href="view">View</a>
                        <a href="edit" class="text-sm hover:text-blue-600 text-blue-800 border rounded-full bg-blue-200 border-blue-400 px-2 py-1">Edit</a>
                        <a class="modal-open text-sm hover:text-red-600 text-red-800 border rounded-full bg-red-200 border-red-400 px-2 py-1" href="#">Delete</a>
                    </td>
                </tr>
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">PIN</span>
                        RU0003
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">FULL NAME</span>
                        Amy Han
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ADDRESS</span>
                        3112 Doctors Drive, Los Angeles, CA 90017
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">EMAIL</span>
                        user@email.com
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">CONTACT NO.</span>
                        21543531321
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">NO. OF REQUESTS</span>
                        <a href="#">1</a>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">NO. OF PAYMENTS</span>
                        <a href="#">1</a>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                        <a class="text-sm hover:text-green-600 text-green-800 border rounded-full bg-green-200 border-green-400 px-2 py-1" href="view">View</a>
                        <a href="edit" class="text-sm hover:text-blue-600 text-blue-800 border rounded-full bg-blue-200 border-blue-400 px-2 py-1">Edit</a>
                        <a class="modal-open text-sm hover:text-red-600 text-red-800 border rounded-full bg-red-200 border-red-400 px-2 py-1" href="#">Delete</a>
                    </td>
                </tr>
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">PIN</span>
                        RU0004
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">FULL NAME</span>
                        May Weather
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ADDRESS</span>
                        3112 Doctors Drive, Los Angeles, CA 90017
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">EMAIL</span>
                        user@email.com
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">CONTACT NO.</span>
                        21543531321
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">NO. OF REQUESTS</span>
                        <a href="#">1</a>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">NO. OF PAYMENTS</span>
                        <a href="#">1</a>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                        <a class="text-sm hover:text-green-600 text-green-800 border rounded-full bg-green-200 border-green-400 px-2 py-1" href="view">View</a>
                        <a href="edit" class="text-sm hover:text-blue-600 text-blue-800 border rounded-full bg-blue-200 border-blue-400 px-2 py-1">Edit</a>
                        <a class="modal-open text-sm hover:text-red-600 text-red-800 border rounded-full bg-red-200 border-red-400 px-2 py-1" href="#">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!--Modal-->
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-white w-11/12 md:w-8/12 xl:w-3/12 mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left">
                <!--Title-->
                <div class="flex justify-between items-center py-3 px-6">
                    <h3 class="text-2xl leading-6 font-light text-gray-800 relative">
                        Delete
                    </h3>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <div class="px-6 my-4">
                    <div class="overflow-hidden rounded">
                        <form class="w-full">
                            <div class="md:flex md:items-center mb-6">
                                Are you sure you want to delete RU0001?
                            </div>
                            <div class="w-full flex md:items-center mb-6">
                                <button class="mr-5 w-1/2 shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                    YES
                                </button>
                                <button class="modal-close w-1/2 shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                    CANCEL
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal -->
</div>
@endsection

<!-- Modal Script -->
@push('script')
<script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal()
      })
    }

    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)

    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }

    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
    	isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
    	isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
    	toggleModal()
      }
    };


    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }

  </script>


