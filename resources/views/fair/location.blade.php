@extends('fair.layouts.app')
@section('title', 'Ubicació')

@section('pageTitle', 'Complex esportiu a Bàscula')
@section('pageContent')
@endsection
@section('content')

    <style>
        .map-info {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 5px;
            z-index: 1;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        /* Media query for smaller screens */
        @media (max-width: 768px) {
            .map-info {
                font-size: 12px;
                /* Reduce font size */
                padding: 5px;
                /* Reduce padding */
                border-radius: 3px;
                /* Reduce border radius */
            }
        }

        .gallery_1 * {
            font-family: Nunito, sans-serif;
        }

        .gallery_1 .text-blk {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            line-height: 25px;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .gallery_1 img {
            object-fit: cover;
        }

        .gallery_1 .responsive-container-block {
            min-height: 75px;
            height: fit-content;
            width: 100%;
            padding-top: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
            display: flex;
            flex-wrap: wrap;
            margin-top: 0px;
            margin-right: auto;
            margin-bottom: 0px;
            margin-left: auto;
            justify-content: flex-start;
        }

        .gallery_1 .responsive-container-block.bigContainer {
            padding-top: 10px;
            padding-right: 30px;
            padding-bottom: 10px;
            padding-left: 30px;
        }

        .gallery_1 .responsive-container-block.Container {
            max-width: 1320px;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
            margin-top: 50px;
            margin-right: auto;
            margin-bottom: 50px;
            margin-left: auto;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .gallery_1 .text-blk.heading {
            font-size: 36px;
            line-height: 45px;
            font-weight: 600;
            color: #242424;
            text-align: center;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 20px;
            margin-left: 0px;
        }

        .gallery_1 .text-blk.subHeading {
            text-align: center;
            font-size: 20px;
            line-height: 30px;
            max-width: 750px;
            color: #a3a3a3;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 50px;
            margin-left: 0px;
        }

        .gallery_1 .responsive-container-block.imgContainer {
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
            min-height: auto;
            height: 720px;
            position: relative;
        }

        .gallery_1 .overlay {
            position: fixed;
            background-image: initial;
            background-position-x: initial;
            background-position-y: initial;
            background-size: initial;
            background-repeat-x: initial;
            background-repeat-y: initial;
            background-attachment: initial;
            background-origin: initial;
            background-clip: initial;
            background-color: rgba(71, 69, 69, 0.7);
            height: 100%;
            width: 100%;
            max-height: 100%;
            top: 0px;
            left: 0px;
            z-index: 100;
            display: none;
            padding-top: 20px;
            padding-right: 20px;
            padding-bottom: 20px;
            padding-left: 20px;
        }

        .gallery_1 .overlay-inner {
            top: 50%;
            right: 0px;
            bottom: 0px;
            left: 50%;
            transform: translate(-50%, -50%);
            background-image: initial;
            background-position-x: initial;
            background-position-y: initial;
            background-size: initial;
            background-repeat-x: initial;
            background-repeat-y: initial;
            background-attachment: initial;
            background-origin: initial;
            background-clip: initial;
            background-color: white;
            max-width: 700px;
            width: 100%;
            position: relative;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            opacity: 1;
        }

        .gallery_1 .close {
            position: absolute;
            top: 100%;
            right: 0;
            background-image: none;
            background-position-x: initial;
            background-position-y: initial;
            background-size: initial;
            background-repeat-x: initial;
            background-repeat-y: initial;
            background-attachment: initial;
            background-origin: initial;
            background-clip: initial;
            background-color: initial;
            outline-color: initial;
            outline-style: initial;
            outline-width: 0px;
            color: #474545;
            border-top-width: 0px;
            border-right-width: 0px;
            border-bottom-width: 0px;
            border-left-width: 0px;
            border-top-style: initial;
            border-right-style: initial;
            border-bottom-style: initial;
            border-left-style: initial;
            border-top-color: initial;
            border-right-color: initial;
            border-bottom-color: initial;
            border-left-color: initial;
            border-image-source: initial;
            border-image-slice: initial;
            border-image-width: initial;
            border-image-outset: initial;
            border-image-repeat: initial;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .gallery_1 .overlay-inner img {
            height: auto;
            width: 100%;
            transform: none;
        }

        .gallery_1 .close:hover {
            cursor: pointer;
        }

        .gallery_1 .project {
            position: absolute;
            width: 39.8%;
            padding-top: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
        }

        .gallery_1 .btn-box {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
        }

        .gallery_1 .project:hover .btn-box {
            display: block;
        }

        .gallery_1 .btn {
            cursor: pointer;
        }

        .gallery_1 .smallImage {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery_1 .project.project1 {
            width: 39.8%;
            height: 66.67%;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .gallery_1 .project.project2 {
            bottom: 0px;
            top: auto;
            right: auto;
            width: 59.75%;
            height: 32.6%;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .gallery_1 .project.project3 {
            left: 40.2%;
            right: auto;
            bottom: auto;
            width: 19.4%;
            height: 32.98%;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .gallery_1 .project.project4 {
            left: 40.2%;
            top: 33.7%;
            width: 19.5%;
            height: 32.98%;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .gallery_1 .project.project5 {
            right: 0px;
            left: auto;
            bottom: auto;
            width: 39.8%;
            height: 32.6%;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .gallery_1 .project.project6 {
            bottom: 0px;
            top: auto;
            left: auto;
            right: 0px;
            width: 39.8%;
            height: 66.67%;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .hdImgs img {
            border-radius: 5px;
        }

        @media (max-width: 1024px) {
            .gallery_1 .responsive-container-block.imgContainer {
                height: 600px;
            }

            .gallery_1 .text-blk.subHeading {
                font-size: 18px;
                line-height: 27px;
            }
        }

        @media (max-width: 768px) {
            .gallery_1 .project.project5 {
                top: 520px;
                width: 100%;
                left: 0px;
                right: auto;
                bottom: auto;
                height: 200px;
            }

            .gallery_1 .responsive-container-block.imgContainer {
                height: 930px;
            }

            .gallery_1 .project.project1 {
                width: 64%;
                height: 300px;
            }

            .gallery_1 .project.project3 {
                left: auto;
                width: 35%;
                height: 145px;
                right: 0px;
            }

            .gallery_1 .project.project4 {
                left: auto;
                width: 35%;
                height: 145px;
                top: 155px;
                right: 0px;
            }

            .gallery_1 .project.project6 {
                height: 200px;
                width: 100%;
            }

            .gallery_1 .project.project2 {
                width: 100%;
                top: 310px;
                height: 200px;
            }

            .gallery_1 .project {
                width: 100%;
                padding-top: 10px;
                padding-right: 0px;
                padding-bottom: 10px;
                padding-left: 0px;
            }


            .gallery_1 .text-blk.subHeading {
                line-height: 25px;
                font-size: 17px;
                max-width: 600px;
            }

            .gallery_1 .text-blk.heading {
                font-size: 30px;
                line-height: 40px;
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 15px;
                margin-left: 0px;
            }
        }

        @media (max-width: 500px) {
            .gallery_1 .responsive-container-block.imgContainer {
                height: 890px;
            }

            .gallery_1 .responsive-container-block.bigContainer {
                padding-top: 10px;
                padding-right: 20px;
                padding-bottom: 10px;
                padding-left: 20px;
            }

            .gallery_1 .text-blk.heading {
                font-size: 30px;
                line-height: 35px;
            }

            .gallery_1 .text-blk.subHeading {
                font-size: 16px;
                line-height: 22px;
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 30px;
                margin-left: 0px;
            }

            .gallery_1 .project.project1 {
                height: 250px;
            }

            .gallery_1 .project.project3 {
                height: 123px;
            }

            .gallery_1 .project.project4 {
                height: 123px;
                top: 127px;
            }

            .gallery_1 .project.project2 {
                top: 260px;
            }

            .gallery_1 .project.project5 {
                top: 470px;
            }

            .gallery_1 .project.project6 {
                top: 680px;
            }
        }

        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&amp;display=swap');

        *,
        *:before,
        *:after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            margin: 0;
        }

        .wk-desk-1 {
            width: 8.333333%;
        }

        .wk-desk-2 {
            width: 16.666667%;
        }

        .wk-desk-3 {
            width: 25%;
        }

        .wk-desk-4 {
            width: 33.333333%;
        }

        .wk-desk-5 {
            width: 41.666667%;
        }

        .wk-desk-6 {
            width: 50%;
        }

        .wk-desk-7 {
            width: 58.333333%;
        }

        .wk-desk-8 {
            width: 66.666667%;
        }

        .wk-desk-9 {
            width: 75%;
        }

        .wk-desk-10 {
            width: 83.333333%;
        }

        .wk-desk-11 {
            width: 91.666667%;
        }

        .wk-desk-12 {
            width: 100%;
        }

        @media (max-width: 1024px) {
            .wk-ipadp-1 {
                width: 8.333333%;
            }

            .wk-ipadp-2 {
                width: 16.666667%;
            }

            .wk-ipadp-3 {
                width: 25%;
            }

            .wk-ipadp-4 {
                width: 33.333333%;
            }

            .wk-ipadp-5 {
                width: 41.666667%;
            }

            .wk-ipadp-6 {
                width: 50%;
            }

            .wk-ipadp-7 {
                width: 58.333333%;
            }

            .wk-ipadp-8 {
                width: 66.666667%;
            }

            .wk-ipadp-9 {
                width: 75%;
            }

            .wk-ipadp-10 {
                width: 83.333333%;
            }

            .wk-ipadp-11 {
                width: 91.666667%;
            }

            .wk-ipadp-12 {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .wk-tab-1 {
                width: 8.333333%;
            }

            .wk-tab-2 {
                width: 16.666667%;
            }

            .wk-tab-3 {
                width: 25%;
            }

            .wk-tab-4 {
                width: 33.333333%;
            }

            .wk-tab-5 {
                width: 41.666667%;
            }

            .wk-tab-6 {
                width: 50%;
            }

            .wk-tab-7 {
                width: 58.333333%;
            }

            .wk-tab-8 {
                width: 66.666667%;
            }

            .wk-tab-9 {
                width: 75%;
            }

            .wk-tab-10 {
                width: 83.333333%;
            }

            .wk-tab-11 {
                width: 91.666667%;
            }

            .wk-tab-12 {
                width: 100%;
            }
        }

        @media (max-width: 500px) {
            .wk-mobile-1 {
                width: 8.333333%;
            }

            .wk-mobile-2 {
                width: 16.666667%;
            }

            .wk-mobile-3 {
                width: 25%;
            }

            .wk-mobile-4 {
                width: 33.333333%;
            }

            .wk-mobile-5 {
                width: 41.666667%;
            }

            .wk-mobile-6 {
                width: 50%;
            }

            .wk-mobile-7 {
                width: 58.333333%;
            }

            .wk-mobile-8 {
                width: 66.666667%;
            }

            .wk-mobile-9 {
                width: 75%;
            }

            .wk-mobile-10 {
                width: 83.333333%;
            }

            .wk-mobile-11 {
                width: 91.666667%;
            }

            .wk-mobile-12 {
                width: 100%;
            }
        }
    </style>

    <div class="location mt-2">
        <div class="mt-3">
            <div class="row">
                <div class="col-md">
                    <div style="position: relative; width: 100%; border-radius: 10px; overflow: hidden;">
                        <iframe width="100%" height="800" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=es&amp;q=Carrer%20del%20Foc,%20132,%20Sants-Montju%C3%AFc,%2008004%20Barcelona+(Complex%20esportiu%20a%20B%C3%A0scula)&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                            <a href="https://www.gps.ie/car-satnav-gps/"></a>
                        </iframe>
                        <div class="map-info">
                            <div><strong>Direcció</strong>: Foc, 132</div>
                            <div><strong>Districte</strong>: Sants-Montjuïc</div>
                            <div><strong>Barri</strong>: El Poble-sec</div>
                            <div><strong>Ciutat</strong>: Barcelona</div>
                            <div><strong>Telèfon</strong>: 692 12 76 27</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-center mt-2">Zones</h2>
        <div class="row">
            <div class="col-md-8 mt-1">
                <img src="{{ asset('img/mapa.png') }}" class="img-fluid rounded" alt="Zones">
            </div>
            <div class="col-md-4 mt-1">
                <img src="{{ asset('img/mapaLeg.png') }}" class="img-fluid" alt="Zones">
            </div>
        </div>
    </div>
    </div>


    <div class="gallery_1" unique-script-id="w-w-dm-id">
        <div class="responsive-container-block bigContainer">
            <div class="responsive-container-block Container">
                <p class="text-blk heading">
                    Galeria
                </p>
                <div class="responsive-container-block imgContainer">
                    <div class="project project1">
                        <img class="smallImage" src="{{ asset('img/bascula_1.jpeg') }}">
                        <div class="overlay">
                            <div class="overlay-inner">
                                <button class="close">
                                    <p class="btn1">X</p>
                                </button>
                                <div class="hdImgs">
                                    <img class="squareImg" src="{{ asset('img/bascula_1.jpeg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="btn-box">
                            <button class="btn1">
                                Veure
                            </button>
                        </div>
                    </div>
                    <div class="project project2">
                        <img class="smallImage" src="{{ asset('img/bascula_2.jpeg') }}">
                        <div class="overlay">
                            <div class="overlay-inner">
                                <button class="close">
                                    <p class="btn1">X</p>
                                </button>
                                <div class="hdImgs">
                                    <img class="squareImg" src="{{ asset('img/bascula_2.jpeg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="btn-box">
                            <button class="btn1">
                                Veure
                            </button>
                        </div>
                    </div>
                    <div class="project project3">
                        <img class="smallImage" src="{{ asset('img/bascula_3.jpeg') }}">
                        <div class="overlay">
                            <div class="overlay-inner">
                                <button class="close">
                                    <p class="btn1">X</p>
                                </button>
                                <div class="hdImgs">
                                    <img class="squareImg" src="{{ asset('img/bascula_3.jpeg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="btn-box">
                            <button class="btn1">
                                Veure
                            </button>
                        </div>
                    </div>
                    <div class="project project4">
                        <img class="smallImage" src="{{ asset('img/bascula_4.jpeg') }}">
                        <div class="overlay">
                            <div class="overlay-inner">
                                <button class="close">
                                    <p class="btn1">X</p>
                                </button>
                                <div class="hdImgs">
                                    <img class="squareImg" src="{{ asset('img/bascula_4.jpeg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="btn-box">
                            <button class="btn1">
                                Veure
                            </button>
                        </div>
                    </div>
                    <div class="project project5">
                        <img class="smallImage" src="{{ asset('img/bascula_5.jpeg') }}">
                        <div class="overlay">
                            <div class="overlay-inner">
                                <button class="close">
                                    <p class="btn1">X</p>
                                </button>
                                <div class="hdImgs">
                                    <img class="squareImg" src="{{ asset('img/bascula_5.jpeg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="btn-box">
                            <button class="btn1">
                                Veure
                            </button>
                        </div>
                    </div>
                    <div class="project project6">
                        <img class="smallImage" src="{{ asset('img/bascula_6.jpeg') }}">
                        <div class="overlay">
                            <div class="overlay-inner">
                                <button class="close">
                                    <p class="btn1">X</p>
                                </button>
                                <div class="hdImgs">
                                    <img class="squareImg" src="{{ asset('img/bascula_6.jpeg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="btn-box">
                            <button class="btn1">
                                Veure
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $(`[unique-script-id="w-w-dm-id"] .btn-box`).click(function() {
                $(this).parent().children(".overlay").show();

            });

            $(`[unique-script-id="w-w-dm-id"] .close`).click(function() {
                $(".overlay").hide();
            });
        });
    </script>
@endsection
