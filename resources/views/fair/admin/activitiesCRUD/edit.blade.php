@extends('fair.layouts.app')
@section('title', 'Editar Activitat')

@section('pageTitle', 'Hola, ' . auth()->user()->getFirstname())
@section('pageContent')
@endsection
@section('content')

    <div class="row justify-content-center">
        <a href="{{ route('admin.activities.index') }}" class="btn1">Tornar</a>
        <div class="col-md-8">
            <div class="card mt-5 mb-5">
                <div class="card-header">Editar Activitat</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.activities.update', $activity->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $activity->name }}" required>

                            <label for="date">Descripció</label>
                            <input type="text" class="form-control" id="description" name="description"
                                value="{{ $activity->description }}" required>

                            <label for="date">Zona</label>
                            <input type="number" class="form-control" id="location" name="location" min="1"
                                max="20" value="{{ $activity->location }}" required>

                            <label for="image_path">Imatge</label>
                            <input type="file" class="form-control" id="image_path" name="image_path"
                                value="{{ $activity->image_path }}">

                            <div class="form-group">
                                <img src="{{ asset('img/' . $activity->image_path) }}" alt="img" class="img-thumbnail"
                                    style="max-width: 150px;">
                            </div>

                            <input type="submit" class="btn1 mt-3" value="Actualizar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
