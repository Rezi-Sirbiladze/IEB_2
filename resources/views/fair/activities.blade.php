@extends('fair.layouts.app')
@section('title', 'Activitats')

@section('pageTitle', 'Activitats')
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
            height: 200px;
            object-fit: cover;
        }

        .card-header1 {
            background-color: black;
            color: white;
        }
    </style>

    <div class="row justify-content-center">
        @foreach ($activities as $key => $activity)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="image-container2">
                        <img src="{{ asset('img/' . $activity->image_path) }}" class="card-img-top"
                            alt="{{ $activity->name }}">
                    </div>
                    <div class="card-header1 card-header text-center">
                        <h5 class="card-title">{{ $activity->name }}</h5>
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
                                            <p class="mb-1">{{ $activity->description }}</p>
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
