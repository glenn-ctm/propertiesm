@extends('layouts.site')

@push('css')
<style>
    .about-us {
        color: #777;

    }

    video[poster] {
        object-fit: cover;
    }

    .img-container {
        position: absolute;
        bottom: -53px;
        right: 0;
        z-index: 100
    }

    .play-button {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .shadow-inner {
        box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
    }

    .about-icons {
        font-size: 65px !important;
        transition: all 250ms ease-in;
    }

    .border-1 {
        border-width: 1px;
    }

    .border-1:hover .about-icons {
        transform: translateY(-6px);
    }

    .modal {
        z-index: 200;
    }

    @media (min-width:1024px) and (max-width:1279px) {
        .benefit {
            height: 210px;
        }
    }

    @media (max-width:639px) {
        .benefit-container:not(:last-child) {
            width: 50%;
        }

        .benefit-container:last-child {
            width: 100%;
        }
    }

    @media (max-width:460px) {
        .img-container {
            position: relative;
            margin-top: -50px;
        }

        .info-col {
            margin-top: 20px;
        }
    }

    .third-section .material-icons {
        font-size: 65px;
        transition: all 250ms ease-in;
    }

    .third-section .border-1 {
        border-width: 1px;
    }

    .third-section .border-1:hover .material-icons {
        transform: translateY(-6px);
    }

    @media (min-width:1024px) and (max-width:1279px) {
        .benefit {
            height: 210px;
        }
    }

    @media (max-width:639px) {
        .benefit-container:not(:last-child) {
            width: 50%;
        }

        .benefit-container:last-child {
            width: 100%;
        }
    }

    /* section 4 */
    .card {
        -webkit-perspective: 1500;
        -webkit-transform-style: preserve-3d;
        height: 512px;
    }

    .card .front,
    .card .back {
        backface-visibility: hidden;
        transition: all .3s ease-in-out;
    }

    .card .front {
        transform: rotateY(0);
        z-index: 2;
    }

    .card .back {
        transform: rotateY(-180deg);
    }

    .card .back .btn {
        bottom: 20px;
        left: 20px;
        right: 20px;
    }

    .card:hover .front {
        transform: rotateY(180deg);
    }

    .card:hover .back {
        transform: rotateY(0);
    }
</style>
@endpush

@section('content')
<div class="about-us bg-white">

    <div class="container py-5 sm:py-14 m-auto">
        <div class="flex flex-wrap -mx-2">
            <div class="w-full md:w-1/1 lg:w-1/2 p-6">
                <div class="relative">
                    <img src="static/about-us.jpg" alt="Wokers">
                    {{-- <div class="img-container bg-gray-800">
                        <img src="static/thumbnail.jpg" class="video-thumb" width="350">
                        <span class="modal-open about-icons play-button material-icons absolute text-white cursor-pointer">play_circle_filled</span>
                    </div> --}}
                </div>
            </div>
            <div class="info-col w-full md:w-1/1 lg:w-1/2 p-6">
                <div>
                    <p class="text-4xl text-gray-700 font-semibold capitalize pt-6 pb-4 leading-none">
                        About Us
                    </p>
                    <p class="text-justify py-4 leading-8">
                        Since 1982 our founder grew up the son in a family business successfully owning and operating over 250 + doors from Sacramento, CA to Los Angeles, CA. In 2009 he started a maintenance company offering the years of experience to management companies and other private owners. He experienced first-hand the disconnection between owners, management companies and tenants which caused their loss of tenants and revenue.   Rooted in the understanding that community is the birthplace of great possibilities, his 4-point system was created reversing their losses.
                    </p>
                    <p class="text-justify py-4 leading-8">
                        In 2020 PropertieS/M was established providing full management and  maintenance services. With over 43 years of experience, he created a team which will be committed to implementing the 4-point system. With this knowledge and experience, PropertieS/M has created a managing firm unlike like any other. <i>Welcome to the PropertieS/M Family!</i>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @include('site.pages.home.third-section')

</div>

<!--Modal-->
<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-75"></div>
    <div class="modal-container bg-white w-11/12 md:w-8/12 mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content text-left">
            <div class="shadow rounded">
                <div class="video-container">
                    <video width="100%" controls poster="static/thumbnail.jpg">
                        <source src="static/sample-vid.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal -->

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
@endpush
