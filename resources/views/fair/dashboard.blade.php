@extends('fair.layouts.app')
@section('title', 'Perfil')

@section('pageTitle', 'Hola, ' . auth()->user()->name)
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
        @foreach (auth()->user()->bookings as $key => $booking)
            <div class="col-md-4 mb-4">
                <div class="card">
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
