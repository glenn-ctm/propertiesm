<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,400;1,500&display=swap" rel="stylesheet">
<style>
    .font-lato {
        font-family: 'Lato', sans-serif;
    }
    .home {
        color: #777;
    }
    .button {
        font-size: 15px;
    }
    .section-one .swiper-slide {
        background-position: 50%;
        min-height: 75vh;
    }
    .swiper-slide-1 {
        background: url("/static/home/property-management.jpg") no-repeat;
        background-size: cover;
    }
    .swiper-slide-2 {
        background: url("/static/home/project-management.jpg") no-repeat;
        background-size: cover;
    }
    .swiper-slide-3 {
        background: url("/static/home/addons.jpg") no-repeat;
        background-size: cover;
    }
    .swiper-slide-4 {
        background: url("/static/home/adus.png") no-repeat;
        background-size: cover;
    }
    .swiper-slide-5 {
        background: url("/static/home/jadus.jpg") no-repeat;
        background-size: cover;
    }
    .swiper-slide-6 {
        background: url("/static/home/construction.jpg") no-repeat;
        background-size: cover;
    }
    .section-one .caption-container {
        animation: moveInLeft ease-in 2500ms;
        width: 49%;
        height: 100%;
        position: absolute;
        left: 0px;
        background-color: rgba(0, 0, 0, 0.7);
        clip-path: polygon(0 0, 70% 0, 100% 100%, 0 100% );
    }
    .section-one .caption {
        width: 60%;
        position: absolute;
        top: 50%;
        left: 40%;
        transform: translate(-50%, -50%);
    }
    .caption-mini {
        color:  #85b6ff;
    }

    .caption-mini::before {
        content: '';
        position: relative;
        display: inline-block;
        background-color: #fff;
        width: 15px;
        height: 1px;
        bottom: 3.8px;
        padding-left: 30px;
        margin-right: 5px
    }
    .btn-animated:hover {
        transform: translateY(-3px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.2);
    }
    .btn-animated:active {
        transform: translateY(-1px);
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, 0.2);
    }
    @keyframes moveInLeft {
        0% {
            opacity: 0;
            transform: translateX(30%)
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 767px) {
        .section-one .caption-container {
            width: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100% );
        }
        .section-one .caption {
            width: 90%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    }



    .benefit-container .material-icons {
        font-size: 55px;
    }
    .second-section .column-1{
        background: url("/static/home/2nd-sec.jpg");
        background-size:cover;
        background-repeat:no-repeat;
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
    @media  (min-width:1024px) and (max-width:1279px) {
        .benefit {
            height: 210px;
        }
    }
    @media  (max-width:639px) {
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

    .maintenance-list {
        columns: 2;
    }

    .section-four .maintenance-list li {
        /* flex: 0 0 50%; */
        transition: color .3s;
    }

    .section-four li:hover,
    .section-four li:hover span {
        color: #10d9e0;
    }
    .section-four li span {
        opacity: 0;
        margin-left: -10px;
        transition: all .2s .1s;
    }
    .section-four li:hover span {
        opacity: 1;
        margin-left: 5px;
    }

    /*section-5 */
    .fifth-section {
        background: url(/static/home/bg.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }

    .review-bg {
        background-color: rgba(37,38,46,0.7) !important;
    }

    .fifth-section .caption-container {
        animation: moveInLeft ease-out 2500ms;
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0px;
    }
    .fifth-section .swiper-slide {
        background-position: 50%;
        min-height: 35vh;
    }
    .fifth-section .caption {
        width: 70%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: 'Playfair Display', serif;
        color: #d6d6d6;
    }
    .fifth-section .swiper-slide {
        min-height: 42vh;
        position: relative;
    }

    @media (max-width:525px) {
        .testimonials {
            padding: 3.5rem 3rem;
        }
        .fifth-section .caption {
            width: 95%;
        }
        .fifth-section .caption::before {
            font-size: 8rem;
            left: 40%;
            top: -100px;
        }
    }

</style>
