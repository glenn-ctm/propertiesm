@extends('layouts.panel')

@section('content')
<div class="flex flex-wrap">
    <div class="w-full md:w-1/2 lg:w-1/2 px-2 mb-4">
        <h1 class="text-3xl text-black">Video / Recordings / Pictures</h1>
    </div>
    <div class="w-full flex md:w-1/2 lg:w-1/2 px-2 mb-4 text-right mt-5">
        <div class="shadow flex w-full">
            <input class="w-full rounded p-2" type="text" placeholder="Search...">
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
                    <th class="p-3 font-semibold uppercase border border-gray-300 hidden lg:table-cell">DATE</th>
                    <th class="p-3 font-semibold uppercase border border-gray-300 hidden lg:table-cell">TIME</th>
                    <th class="p-3 font-semibold uppercase border border-gray-300 hidden lg:table-cell">ADDRESS</th>
                    <th class="p-3 font-semibold uppercase border border-gray-300 hidden lg:table-cell">DESCRIPTION</th>
                    <th class="p-3 font-semibold uppercase border border-gray-300 hidden lg:table-cell">VID/IMAGE</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DATE</span>
                        10/14/2020
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">TIME</span>
                        9:38AM
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ADDRESS</span>
                        3112 Doctors Drive, Los Angeles, CA 90017
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DESCRIPTION</span>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">VIDEOS/IMAGES</span>
                        <a href="#" class="modal-open" data-toggle="modal" data-target="Viewmedia">vid1.mp4, img.jpg</a>
                    </td>
                </tr>
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DATE</span>
                        10/112/2020
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">TIME</span>
                        9:30AM
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ADDRESS</span>
                        3112 Doctors Drive, Los Angeles, CA 90017
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DESCRIPTION</span>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">VIDEOS/IMAGES</span>
                        <a href="#" class="modal-open" data-toggle="modal" data-target="Viewmedia">vid1.mp4, img.jpg</a>
                    </td>
                </tr>
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DATE</span>
                        10/05/2020
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">TIME</span>
                        9:38AM
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ADDRESS</span>
                        3112 Doctors Drive, Los Angeles, CA 90017
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DESCRIPTION</span>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">VIDEOS/IMAGES</span>
                        <a href="#" class="modal-open" data-toggle="modal" data-target="Viewmedia">vid1.mp4, img.jpg</a>
                    </td>
                </tr>
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DATE</span>
                        10/01/2020
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">TIME</span>
                        9:38AM
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ADDRESS</span>
                        3112 Doctors Drive, Los Angeles, CA 90017
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DESCRIPTION</span>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">VIDEOS/IMAGES</span>
                        <a href="#" class="modal-open" data-toggle="modal" data-target="Viewmedia">vid1.mp4, img.jpg</a>
                    </td>
                </tr>
            </tbody>
        </table>


    </div>
    <!--View Media Modal-->
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center" id="Viewmedia">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-white md:w-6/12 mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left">
                <!--Title-->
                <div class="flex justify-between items-center py-3 px-6">
                    <h3 class="text-2xl leading-6 font-light text-gray-800 relative">
                       Videos / Pictures / Recordings
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
                        <form class="w-full max-w-full">
                            <div class="md:flex md:items-center mb-10 h-32 bg-gray-500 rounded text-white">
                                    Vid and Pics here (slider)
                            </div>
                            <div class="w-full md:flex md:items-center sm:flex-none">
                                <button class="mx-2 md:w-1/2 shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                    DOWNLOAD
                                </button>
                                <button class="mx-2 modal-close md:w-1/2 shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                    CANCEL
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of View Pic Modal -->
</div>
@endsection
<!-- Modal Script -->
@push('script')
<script>
   var openmodal = document.querySelectorAll('.modal-open')
   let selectedModalTargetId = ''
   for (var i = 0; i < openmodal.length; i++) {
     openmodal[i].addEventListener('click', function(event){
       selectedModalTargetId = event.target.attributes.getNamedItem('data-target').value
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
  }

  function toggleModal () {
    if(!selectedModalTargetId) {
      return
    }
    const body = document.querySelector('body')
    const modal = document.getElementById(selectedModalTargetId)
    modal.classList.toggle('opacity-0')
    modal.classList.toggle('pointer-events-none')
    body.classList.toggle('modal-active')
  }
</script>
