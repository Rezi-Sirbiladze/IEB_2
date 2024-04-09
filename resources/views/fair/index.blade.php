@extends('fair.layouts.app')

@section('title', 'Index')

@section('pageTitle', "L'Institut de l'Esport de Barcelona")
@section('pageContent',
    'Aquesta fira té com a objectiu principal promoure la pràctica esportiva, fomentar la innovació en aquest
    àmbit i crear espais de networking entre els diferents agents implicats.')
@section('content')

    <style>
        .box {
            background: #333333;
            border-radius: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            color: rgba(255, 255, 255, 0.9);
            margin-top: 10px;
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

        .activities-container {
            height: 350px;
            overflow-y: auto;
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

        .image-wrapper {
            position: relative;
        }

        .image-wrapper:hover .blur-on-hover {
            filter: blur(5px);
            transition: filter 0.5s ease;
        }

        .scrollable-caption {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            display: none;
            overflow-y: auto;
            max-height: 100%;
            border-radius: 5px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-container:hover .scrollable-caption {
            display: block;
            opacity: 1;
        }

        #offcanvas-navbar-toggler {
            position: fixed;
            bottom: 20px;
            z-index: 1;
            left: 50%;
            transform: translateX(-50%);
        }

        .start-time {
            position: sticky;
            top: 111px;
            z-index: 0;
            padding: 10px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        .button1 {
            background: none;
            border: none;
        }

        .button1 .bloom-container {
            position: relative;
            transition: all 0.2s ease-in-out;
            border: none;
            background: none;
        }

        .button1 .bloom-container .button-container-main {
            width: 110px;
            aspect-ratio: 1;
            border-radius: 50%;
            overflow: hidden;
            position: relative;
            display: grid;
            place-content: center;
            border-right: 5px solid white;
            border-left: 5px solid rgba(128, 128, 128, 0.147);
            transform: rotate(-45deg);
            transition: all 0.5s ease-in-out;
        }

        .button1 .bloom-container .button-container-main .button-inner {
            height: 60px;
            aspect-ratio: 1;
            border-radius: 50%;
            position: relative;
            box-shadow: rgba(100, 100, 111, 0.5) -10px 5px 10px 0px;
            transition: all 0.5s ease-in-out;
        }

        .button1 .bloom-container .button-container-main .button-inner .back {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: linear-gradient(60deg, rgb(1, 85, 103) 0%, rgb(147, 245, 255) 100%);
        }

        .button1 .bloom-container .button-container-main .button-inner .front {
            position: absolute;
            inset: 5px;
            border-radius: 50%;
            background: linear-gradient(60deg, rgb(0, 103, 140) 0%, rgb(58, 209, 233) 100%);
            display: grid;
            place-content: center;
        }

        .button1 .bloom-container .button-container-main .button-inner .front img {
            fill: #ffffff;
            opacity: 0.5;
            width: 30px;
            aspect-ratio: 1;
            transform: rotate(45deg);
            transition: all 0.2s ease-in;
        }

        .button1 .bloom-container .button-container-main .button-glass {
            position: absolute;
            inset: 0;
            background: linear-gradient(0deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.888) 100%);
            transform: translate(0%, -50%) rotate(0deg);
            transform-origin: bottom center;
            transition: all 0.5s ease-in-out;
        }

        .button1 .bloom-container .bloom {
            height: 1px;
            width: 1px;
            position: absolute;
            background: white;
        }

        .button1 .bloom-container:hover {
            transform: scale(1.1);
        }

        .button1 .bloom-container:hover .button-container-main .button-glass {
            transform: translate(0%, -40%);
        }

        .button1 .bloom-container:hover .button-container-main .button-inner .front .svg {
            opacity: 1;
            filter: drop-shadow(0 0 10px white);
        }

        .button1 .bloom-container:active {
            transform: scale(0.7);
        }

        .button1 .bloom-container:active .button-container-main .button-inner {
            transform: scale(1.2);
        }
    </style>
    <!-- Button to open the shopping cart -->
    <button id="offcanvas-navbar-toggler" class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="button1">
            <div class="bloom-container">
                <div class="button-container-main">
                    <div class="button-inner">
                        <div class="back"></div>
                        <div class="front">
                            <img src="{{ asset('svg/ok.svg') }}" alt="Description">
                        </div>
                    </div>
                    <div class="button-glass">
                        <div class="back"></div>
                        <div class="front"></div>
                    </div>
                </div>
        </span>
    </button>


    <div class="container-fluid">
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Reserves pendents</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" id="offcanvasBody">
                @if (auth()->user())
                    <a href="{{ route('booking.confirm') }}" class="btn1 w-100 text-center">RESERVAR</a>
                    @foreach (auth()->user()->pendingBookings as $booking)
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('img/' . $booking->fairActivity->activity->image_path) }}"
                                        class="img-fluid rounded-start" alt="Fair Activity Image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $booking->fairActivity->activity->name }} |
                                            {{ $booking->fairActivity->start_time }}</h5>
                                        <p class="card-text">
                                        <p style="font-size: 1rem">
                                            {{ $booking->fairActivity->activity->description }}
                                        </p>
                                        </p>
                                        <a href="{{ route('booking.delete', $booking->id) }}"
                                            data-booking-id="{{ $booking->id }}" class="btn btn-danger w-100">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>


    <div class="schedule text-center">
        <div class="box text-center bg-info text-white">
            <p>Check in | Benvinguda hora</p>
        </div>
        <div class="row gap-3">
            @foreach ($startTimes as $startTime)
                <div class="box col-md">
                    <div>
                        <p class="start-time">{{ $startTime }}</p>
                        @foreach ($fair->fairActivities->where('start_time', $startTime) as $fairActivity)
                            <div>
                                <button class="btn2 book-btn" data-fair-activity-id="{{ $fairActivity->id }}">
                                    {{ $fairActivity->activity->name }}
                                </button>
                                <div class="progress">
                                    <div id="progress-bar-{{ $fairActivity->id }}" class="progress-bar bg-success"
                                        role="progressbar" style="width: {{ $fairActivity->capacityPercentage() }}%;"
                                        aria-valuenow="{{ $fairActivity->capacityPercentage() }}" aria-valuemin="0"
                                        aria-valuemax="{{ $fairActivity->capacity }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="box text-center bg-info text-white">
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
                    @foreach ($activities as $key => $activity)
                        <div class="row">
                            <div class="col-md">
                                <p class="activity {{ $key === 0 ? 'active' : '' }}"
                                    data-description="description_{{ $activity->id }}">
                                    {{ $activity->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md border-start">
                    <div id="activity-description">
                        @foreach ($activities as $key => $activity)
                            <div id="description_{{ $activity->id }}"
                                class="activity-description {{ $key === 0 ? 'active' : '' }}">
                                <div class="image-wrapper">
                                    <figure class="image-container">
                                        <img src="{{ asset('img/' . $activity->image_path) }}" alt="Mountains"
                                            class="img-fluid w-100 blur-on-hover">
                                        <figcaption class="scrollable-caption">
                                            <p>{{ $activity->description }}</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        @endforeach
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
                <div class="col-md border-start text-center">
                    <div style="padding: 10px;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        <i class="fas fa-map-marker-alt" style="margin-right: 5px;"></i>
                                    </div>
                                    <div class="col">
                                        <strong>Direcció</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                Foc, 132
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        <i class="fas fa-map-marked" style="margin-right: 5px;"></i>
                                    </div>
                                    <div class="col">
                                        <strong>Districte</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                Sants-Montjuïc
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        <i class="fas fa-city" style="margin-right: 5px;"></i>
                                    </div>
                                    <div class="col">
                                        <strong>Barri</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                El Poble-sec
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        <i class="fas fa-building" style="margin-right: 5px;"></i>
                                    </div>
                                    <div class="col">
                                        <strong>Ciutat</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                Barcelona
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        <i class="fas fa-phone" style="margin-right: 5px;"></i>
                                    </div>
                                    <div class="col">
                                        <strong>Telèfon</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                692 12 76 27
                            </div>
                        </div>
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
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nom complet">
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

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert" id="errorMessage"></div>
                    <!-- Placeholder for error message -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Booking
        $(document).ready(function() {
            $('.book-btn').click(function() {
                var fairActivityId = $(this).data('fair-activity-id');
                $.ajax({
                    type: 'GET',
                    url: '{{ route('booking.store', ':fairActivity') }}'.replace(':fairActivity',
                        fairActivityId),
                    success: function(response) {
                        var deleteUrl =
                            '{{ route('booking.delete', ['booking' => ':booking']) }}'.replace(
                                ':booking', response.booking.id);
                        var bookingHtml = '<div class="card mb-3">' +
                            '<div class="row g-0">' +
                            '<div class="col-md-4">' +
                            '<img src="' + '{{ asset('img') }}' + '/' + response.activity
                            .image_path +
                            '" class="img-fluid rounded-start" alt="Fair Activity Image">' +
                            '</div>' +
                            '<div class="col-md-8">' +
                            '<div class="card-body">' +
                            '<h5 class="card-title">' + response.activity.name + ' | ' +
                            response.fairActivity.start_time + '</h5>' +
                            '<p class="card-text">' +
                            '<p style="font-size: 1rem">' + response.activity.description +
                            '</p>' +
                            '</p>' + '<a href="' + deleteUrl +
                            '" class="btn btn-danger w-100">Eliminar</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                        $('#offcanvasBody').append(bookingHtml);
                    },
                    error: function(xhr, status, error) {
                        if (error === 'Unauthorized') {
                            window.location.href = '/login';
                        }

                        var errorMessage = xhr.responseJSON.message;
                        $('#errorMessage').html(errorMessage);
                        $('#errorModal').modal('show');
                    }
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const activities = document.querySelectorAll(".activity");
            const container = document.querySelector(".activities-container");

            activities.forEach(function(activity) {
                activity.addEventListener("click", function() {
                    const descriptionId = this.dataset.description;
                    const descriptions = document.querySelectorAll(".activity-description");
                    const descriptionToShow = document.getElementById(descriptionId);

                    descriptions.forEach(function(description) {
                        description.style.display = "none";
                    });

                    descriptions.forEach(function(description) {
                        description.style.display = "none";
                    });
                    descriptionToShow.style.display = "block";
                    activities.forEach(function(act) {
                        act.classList.remove("active");
                    });
                    this.classList.add("active");

                    // Scroll the container to the position of the selected activity
                    const containerRect = container.getBoundingClientRect();
                    const activityRect = this.getBoundingClientRect();
                    const offset = activityRect.top - containerRect.top - (containerRect.height /
                        2 - activityRect.height / 2);
                    container.scrollBy({
                        top: offset,
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
@endsection
