@extends('fair.layouts.app')

@section('title', 'Index')


@section('content')
    <style>
        * {
            font-family: "Source Sans 3";
        }

        #background-video {
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: -1;
        }

        body {
            font-family: Trebuchet MS;
            margin: 0;
            padding: 0;
        }

        #content {
            background-color: white;
            margin-top: 20vh;
            font-size: 2rem;
            padding: 10px;
            position: relative;
        }

        .margin-top-20 {
            margin-top: 20vh;
        }

        @media screen and (max-width: 768px) {
            p {
                font-size: 1rem;
            }
        }
    </style>

    <video id="background-video" autoplay loop muted poster="https://assets.codepen.io/6093409/river.jpg">
        <source src="https://assets.codepen.io/6093409/river.mp4" type="video/mp4">
    </video>


    <div class="margin-top-20 container-xxl">
        <div>
            <h1>L'Institut de l'Esport de Barcelona organitza la fira</h1>
            <p class="card-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu
                pharetra nec, mattis ac neque.
            </p>
            <div>
                <button class="btn btn-primary">RESERVAR</a>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container-xxl">
            <div class="schedule">
                <div class="text-center">
                    <p>Check in | Benvinguda hora</p>
                </div>
                <div class="row">
                    <div class="col">
                        <div>
                            <p>Activitats</p>
                        </div>
                        <div>
                            <p>Activitats</p>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <p>Activitats</p>
                        </div>
                        <div>
                            <p>Activitats</p>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <p>Activitats</p>
                        </div>
                        <div>
                            <p>Activitats</p>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <p>Activitats</p>
                        </div>
                        <div>
                            <p>Activitats</p>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <p>Activitat conjunta hora</p>
                </div>
            </div>

            <hr>

            <div class="activities">
                <div class="text-center">
                    <h2>Activitats</h2>
                    <h5>Complex esportiu a Bàscula</h5>
                </div>
                <div class="items">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-3">
                                    <p>🤸‍♀️</p>
                                </div>
                                <div class="col-9">
                                    <p>Activitat 1</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <p>🤸‍♀️</p>
                                </div>
                                <div class="col-9">
                                    <p>Activitat 1</p>
                                </div>
                            </div>
                        </div>
                        <div class="col border-start">
                            <img src="" alt="">
                            <p>Descripció de l'activitat</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="location">
                <div class="text-center">
                    <h2>Ubicació</h2>
                    <h5>Complex esportiu a Bàscula</h5>
                </div>
                <div>
                    <div class="row">
                        <div class="col">
                            <img src="" alt="">
                        </div>
                        <div class="col border-start">
                            <p>Direcció -> Foc, 132</p>
                            <p>Districte -> Sants-Montjuïc</p>
                            <p>Barri -> El Poble-sec</p>
                            <p>Ciutat -> Barcelona</p>
                            <p>Telèfon -> 692 12 76 27</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="contacte">
                <div class="text-center">
                    <h2>Posar-se en contacte</h2>
                    <h5>Ens encantaria saber de tu. Si tens alguna pregunta, suggeriment o simplement vols compartir alguna
                        experiència, si us plau, no dubtis en posar-te en contacte amb nosaltres.</h5>
                </div>
                <div>
                    <input type="text" name="text" class="form-control">
                    <input type="email" name="email" class="form-control">
                    <input type="text" name="message" class="form-control">
                    <button class="btn btn-primary">RESERVAR</a>
                </div>
            </div>
        </div>
    </div>
@endsection
