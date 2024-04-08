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

        #offcanvas-navbar-toggler {
            position: fixed;
            bottom: 20px;

            left: 50%;
            transform: translateX(-50%);
        }
    </style>
    <!-- Button to open the shopping cart -->
    <button id="offcanvas-navbar-toggler" class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">👍</span>
    </button>

    <div class="container-fluid">
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Pending Bookings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                @foreach (auth()->user()->pendingBookings as $booking)
                    <li>
                        {{ $booking->fairActivity->activity->name }} -
                        <span id="booking-{{ $booking->id }}-status">Pending</span>
                        <button class="btn btn-primary confirm-booking"
                            data-booking-id="{{ $booking->id }}">Confirm</button>
                    </li>
                @endforeach
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
                            <div class="activity">
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
                                <figure class="image-container">
                                    <img src="{{ asset('img/' . $activity->image_path) }}" alt="Mountains"
                                        class="img-fluid w-100">
                                    <figcaption class="scrollable-caption">
                                        <p>{{ $activity->description }}</p>
                                    </figcaption>
                                </figure>
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

    <script>
        function updateProgressBar(activityId, percentageBooked) {
            $('#progress-bar-' + activityId).css('width', percentageBooked + '%').attr('aria-valuenow', percentageBooked);
        }

        $(document).ready(function() {
            $('.book-btn').click(function() {
                var fairActivityId = $(this).data('fair-activity-id');
                $.ajax({
                    type: 'GET',
                    url: '{{ route('book', ':fairActivity') }}'.replace(':fairActivity',
                        fairActivityId),
                    success: function(response) {
                        console.log(response);
                        var percentageBooked = response.percentageBooked;
                        updateProgressBar(fairActivityId, percentageBooked);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const activities = document.querySelectorAll(".activity");
            activities.forEach(function(activity) {
                activity.addEventListener("click", function() {
                    const descriptionId = this.dataset.description;
                    const descriptions = document.querySelectorAll(
                        ".activity-description");
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
