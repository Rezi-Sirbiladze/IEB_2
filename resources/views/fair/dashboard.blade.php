@extends('fair.layouts.app')
@section('title', 'Tauler')

@section('pageTitle', 'Hola, ' . auth()->user()->getFirstname())
@section('pageContent')
@endsection
@section('content')


    <style>
        .activities-container {
            max-height: 350px;
            overflow-y: auto;
        }

        .image-container2 img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
        }

        .card-header1 {
            background-color: black;
            color: white;
        }

        /* Loader */
        .loading {
            --speed-of-animation: 0.9s;
            --gap: 6px;
            --second-color: #49a84c;
            --third-color: #f6bb02;
            --fourth-color: #f68002;
            --fifth-color: #2196f3;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100px;
            height: 100px;
            margin: auto;
            gap: 6px;
        }

        .loading span {
            width: 4px;
            height: 50px;
            background: var(--first-color);
            animation: scale var(--speed-of-animation) ease-in-out infinite;
        }

        .loading span:nth-child(2) {
            background: var(--second-color);
            animation-delay: -0.8s;
        }

        .loading span:nth-child(3) {
            background: var(--third-color);
            animation-delay: -0.7s;
        }

        .loading span:nth-child(4) {
            background: var(--fourth-color);
            animation-delay: -0.6s;
        }

        .loading span:nth-child(5) {
            background: var(--fifth-color);
            animation-delay: -0.5s;
        }


        @keyframes scale {

            0%,
            40%,
            100% {
                transform: scaleY(0.05);
            }

            20% {
                transform: scaleY(1);
            }
        }


        /* Star icons */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

        .rating-box {
            position: relative;
            background: #fff;
            padding: 25px 50px 35px;
            border-radius: 25px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
        }

        .rating-box header {
            font-size: 22px;

            font-weight: 500;
            margin-bottom: 20px;
            text-align: center;
        }

        .rating-box .stars {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }

        .stars i {
            color: #9e9e9e;
            font-size: 35px;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .stars i.active {
            color: #ff9c1a;
        }

        .stars_home i.active {
            color: #ff9c1a;
            font-size: 35px;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        textarea {
            width: 100%;
            height: 150px;
            padding: 12px 20px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            font-size: 16px;
            resize: none;
        }

        /** Star icons */
    </style>

    <div class="row justify-content-center">
        <div class="col-md-12 mb-4 mt-5">
            @if (auth()->user()->bookings->count() == 0)
                <div class="alert alert-info text-center">No tens cap activitat reservat</div>
            @else
                <div class="row text-center">
                    <h2>Recorda que es fara:</h2>
                    <div class="box text-center bg-info text-white rounded">
                        <p>Check in | Benvinguda 30 minuts abans</p>
                    </div>
                    <div class="box text-center bg-info text-white rounded mt-4">
                        <p>Activitat conjunta al final de la fira</p>
                    </div>

                    <div class="box text-center mt-4">
                        @if (auth()->user()->confirmedBookings->count() > 0)
                            <a href="{{ route('user.deletefairBookings', 2) }}" class="btn btn-danger">Cancel·lar totes les
                                activitats</a>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        @foreach (auth()->user()->confirmedBookings as $key => $booking)
            <div class="col-md-4 mb-4">
                <div class="card mt-5">
                    <div class="image-container2">
                        <img src="{{ asset('img/' . $booking->fairActivity->activity->image_path) }}" class="card-img-top"
                            alt="{{ $booking->fairActivity->activity->name }}">
                    </div>
                    <div class="card-header1 card-header text-center">
                        <h5 class="card-title">{{ $booking->fairActivity->activity->name }} |
                            {{ $booking->fairActivity->start_time }} | {{ $booking->fairActivity->activity->location }}</h5>
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <button class="collapsed btn2" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse{{ $key }}" aria-expanded="false"
                                    aria-controls="flush-collapse{{ $key }}">
                                    LLegir
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="openModalBtn btn2"
                                    data-booking_id="{{ $booking->id }}">Valorar {{$booking->review ? $booking->review->score : ''}}</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="activities-container">
                            <div class="accordion-item">
                                <div id="flush-collapse{{ $key }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="list-group">
                                            <p class="mb-1">{{ $booking->fairActivity->activity->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div id="reviewModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div id="response_content" class="modal-content">
                <!-- Modal content will be loaded here via AJAX -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.openModalBtn').on('click', function() {
                var booking_id = $(this).data('booking_id');
                $.ajax({
                    url: "{{ route('modalReview') }}",
                    type: "GET",
                    data: {
                        booking_id: booking_id
                    },
                    beforeSend: function() {
                        $("#reviewModal").modal('show');
                        $('#response_content').html(
                            '<div class="p-5 h3 text-center text-dark"> <div class="loading"><span></span><span></span><span></span><span></span><span></span></div></div>'
                        );
                    },
                    success: function(response) {
                        $('.modal-content').html(response);
                        $('#reviewModal').modal('show');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

@endsection
