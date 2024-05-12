@extends('fair.layouts.app')
@section('title', 'Crear Activitat')

@section('pageTitle', 'Hola, ' . auth()->user()->getFirstname())
@section('pageContent')
@endsection
@section('content')

    <div class="row justify-content-center">
        <a href="{{ route('admin.activities.index') }}" class="btn1">Tornar</a>
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Crear Activitat</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.activities.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" required>

                            <label for="date">Descripció</label>
                            <input type="text" class="form-control" id="description" name="description" required>

                            <label for="date">Zona</label>
                            <input type="number" class="form-control" id="location" name="location" min="1" max="20" required>

                            <label for="image_path">Imatge</label>
                            <input type="file" class="form-control" id="image_path" name="image_path" required>

                            <input type="submit" class="btn1 mt-3" value="Crear">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
