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
                            <a href="{{ route('user.deletefairBookings', 1) }}" class="btn btn-danger">Cancel·lar totes les
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
                            {{ $booking->fairActivity->start_time }}</h5>
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse{{ $key }}" aria-expanded="false"
                            aria-controls="flush-collapse{{ $key }}">
                            LLegir
                        </button>
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

@endsection
