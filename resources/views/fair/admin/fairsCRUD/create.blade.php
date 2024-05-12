@extends('fair.layouts.app')
@section('title', 'Crear Fira')

@section('pageTitle', 'Hola, ' . auth()->user()->getFirstname())
@section('pageContent')
@endsection
@section('content')

    <div class="row justify-content-center">
        <a href="{{ route('admin.dashboard') }}" class="btn1">Tornar</a>
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Crear Fira</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.fairs.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="active">Actiu</label>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" name="active" role="switch">
                            </div>

                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" required>

                            <label for="date">Descripció</label>
                            <input type="text" class="form-control" id="description" name="description" required>

                            <label for="date">Data</label>
                            <input type="date" class="form-control" id="date" name="date" required>

                            <input type="submit" class="btn1 mt-3" value="Crear">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
