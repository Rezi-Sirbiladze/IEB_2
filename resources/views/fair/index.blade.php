@extends('fair.layouts.app')

@section('title', 'Index')


@section('content')
    <style>
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

        .margin-top-20 {
            margin-top: 20vh;
        }

        #page-content {
            background-color: white;
            margin-top: 20vh;
            font-size: 2rem;
            padding: 10px;
            position: relative;
        }

        .transparent-box {
            max-width: 500px;
            border-radius: 16px;
            padding: 20px;
            color: rgba(255, 255, 255, 0.9);
            position: relative;
        }

        .box {
            background: #333333;
            border-radius: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            color: rgba(255, 255, 255, 0.9);
            margin-top: 10px;
        }

        #background-video {
            width: calc(100% + 40px);
            height: calc(100% + 40px);
            object-fit: cover;
            filter: grayscale(0.5) opacity(0.8);
        }

        .video-content:before {
            content: '';
            position: absolute;
            background: rgba(0, 0, 0, 0.5);
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            backdrop-filter: blur(5px);
        }

        .separator {
            position: relative;
            width: 100%;
            pointer-events: none;
        }

        .btn1 {
            background-color: #00a4ae;
            color: white;
            padding: 12px 40px;
            text-decoration: none;
            border-radius: 20px;
            border: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
            cursor: pointer;
            display: inline-block;
            font-size: 1.5rem;
        }

        .btn1:hover {
            background-color: #007d85;
            transform: translateY(-2px);
        }

        .btn1:active {
            transform: translateY(0);
        }

        .activity {
            cursor: pointer;
        }

        .activity.active {
            font-size: 2rem;
            color: #00a4ae;
            font-weight: bold;
        }

        .activity-description {
            display: none;
        }

        .activity-description.active {
            display: block;
            opacity: 1;
        }

        @media screen and (max-width: 768px) {
            p {
                font-size: 1rem;
            }
        }

        .image-container {
            position: relative;
            display: inline-block;
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
        }

        .image-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 16px;
        }

        .scrollable-caption {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            display: none;
            opacity: 0;
            overflow-y: auto;
            max-height: 100%;
        }

        .image-container:hover .scrollable-caption {
            display: block;
            opacity: 1;
        }

        .activities-container {
            height: 350px;
            overflow-y: auto;
        }

        .activities-container::-webkit-scrollbar {
            width: 10px;
        }

        .activities-container::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .activities-container::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 5px;
        }
    </style>

    <div class="video-content">
        <video id="background-video" autoplay loop muted poster="{{ asset('img/IEBLogo.jpg') }}">
            <source src="{{ asset('vid/fira.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div class="transparent-box margin-top-20 container-xxl">
        <div>
            <h1>L'Institut de l'Esport de Barcelona</h1>
            <p class="card-text mt-3">
                Aquesta fira té com a objectiu principal promoure la pràctica esportiva, fomentar la innovació en aquest
                àmbit i crear espais de networking entre els diferents agents implicats.
            </p>
            <div class="text-center mt-3">
                <button class="btn1">RESERVAR</a>
            </div>
        </div>
    </div>

    <div class="separator">
        <img src=" {{ asset('img/separate.png') }} " alt="Nature" class="responsive separator">
    </div>


    <div id="page-content" class="mt-0">
        <div class="container-xxl">
            <div class="schedule">
                <div class="box text-center">
                    <p>Check in | Benvinguda hora</p>
                </div>
                <div class="row gap-3">
                    <div class="box col-md">
                        <div>
                            <p>Activitats</p>
                        </div>
                        <div>
                            <p>Activitats</p>
                        </div>
                    </div>
                    <div class="box col-md">
                        <div>
                            <p>Activitats</p>
                        </div>
                        <div>
                            <p>Activitats</p>
                        </div>
                    </div>
                    <div class="box col-md">
                        <div>
                            <p>Activitats</p>
                        </div>
                        <div>
                            <p>Activitats</p>
                        </div>
                    </div>
                    <div class="box col-md">
                        <div>
                            <p>Activitats</p>
                        </div>
                        <div>
                            <p>Activitats</p>
                        </div>
                    </div>
                </div>
                <div class="box text-center">
                    <p>Activitat conjunta hora</p>
                </div>
            </div>

            <hr class="mt-5 mb-5">

            <div class="activities">
                <div class="text-center mt-2">
                    <h2>Activitats</h2>
                    <h5 class="mt-3">Complex esportiu a Bàscula</h5>
                </div>
                <div class="items mt-3">
                    <div class="row">
                        <div class="col-md text-center activities-container">
                            <div class="row">
                                <div class="col-md">
                                    <p class="activity active" data-description="description1">Activitat 1</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p class="activity" data-description="description2">Activitat 2</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p class="activity" data-description="description2">Activitat 2</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p class="activity" data-description="description2">Activitat 2</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p class="activity" data-description="description2">Activitat 2</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <p class="activity" data-description="description2">Activitat 2</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md border-start">
                            <div id="activity-description">
                                <div id="description1" class="activity-description active">
                                    <figure class="image-container">
                                        <img src="https://www.w3schools.com/html/pic_trulli.jpg" alt="Mountains"
                                            class="img-fluid w-100">
                                        <figcaption class="scrollable-caption">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum
                                            incidunt officia, non quae saepe cupiditate odit inventore quisquam esse
                                            soluta amet facilis voluptas omnis exercitationem possimus in deleniti!
                                            Incidunt,
                                            quidem.
                                        </figcaption>
                                    </figure>
                                </div>
                                <div id="description2" class="activity-description" style="display: none">
                                    <figure class="image-container">
                                        <img src="https://www.w3schools.com/html/img_chania.jpg" alt="Mountains"
                                            class="img-fluid w-100">
                                        <figcaption class="scrollable-caption">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum
                                            incidunt officia, non quae saepe cupiditate odit inventore quisquam esse
                                            soluta amet facilis voluptas omnis exercitationem possimus in deleniti!
                                            Incidunt,
                                            quidem.
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-5 mb-5">

            <div class="location mt-2">
                <div class="text-center">
                    <h2>Ubicació</h2>
                    <h5 class="mt-3">Complex esportiu a Bàscula</h5>
                </div>
                <div class="mt-3">
                    <div class="row">
                        <div class="col-md">
                            <div style="width: 100%; border-radius: 10px; overflow: hidden;">
                                <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=es&amp;q=Carrer%20del%20Foc,%20132,%20Sants-Montju%C3%AFc,%2008004%20Barcelona+(Complex%20esportiu%20a%20B%C3%A0scula)&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                                    <a href="https://www.gps.ie/car-satnav-gps/"></a>
                                </iframe>
                            </div>
                        </div>
                        <div class="col-md border-start">
                            <div style="padding: 10px;">
                                <ul style="list-style: none; padding-left: 0;">
                                    <li>
                                        <strong>
                                            <i class="fas fa-map-marker-alt" style="margin-right: 5px;"></i>
                                            Direcció
                                        </strong> Foc, 132
                                    </li>
                                    <li>
                                        <strong>
                                            <i class="fas fa-map-marked" style="margin-right: 5px;"></i>
                                            Districte
                                        </strong> Sants-Montjuïc
                                    </li>
                                    <li>
                                        <strong>
                                            <i class="fas fa-city" style="margin-right: 5px;"></i>
                                            Barri
                                        </strong> El Poble-sec
                                    </li>
                                    <li>
                                        <strong>
                                            <i class="fas fa-building" style="margin-right: 5px;"></i>
                                            Ciutat
                                        </strong> Barcelona
                                    </li>
                                    <li>
                                        <strong>
                                            <i class="fas fa-phone" style="margin-right: 5px;"></i>
                                            Telèfon
                                        </strong> 692 12 76 27
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-5 mb-5">

            <div class="contacte">
                <div class="text-center">
                    <h2>Posar-se en contacte</h2>
                    <h5 class="mt-3">Ens encantaria saber de tu. Si tens alguna pregunta, suggeriment o simplement vols
                        compartir alguna
                        experiència, si us plau, no dubtis en posar-te en contacte amb nosaltres.</h5>
                </div>
                <div class="mt-3">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Nom complet">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="exampleFormControlInput2"
                            placeholder="Correu electrònic">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Hola :D"></textarea>
                    </div>
                    <div>
                        <button class="btn1 w-100">ENVIAR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const activities = document.querySelectorAll(".activity");
            activities.forEach(function(activity) {
                activity.addEventListener("click", function() {
                    const descriptionId = this.dataset.description;
                    const descriptions = document.querySelectorAll(".activity-description");
                    descriptions.forEach(function(description) {
                        description.style.display = "none";
                    });
                    const descriptionToShow = document.getElementById(descriptionId);
                    descriptionToShow.style.display = "block";

                    activities.forEach(function(act) {
                        act.classList.remove("active");
                    });

                    this.classList.add("active");
                });
            });
        });
    </script>
@endsection
