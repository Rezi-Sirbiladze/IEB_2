@extends('fair.layouts.app')
@section('title', 'Editar Fira')

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
                    <form method="POST" action="{{ route('admin.fairs.update', $fair->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="active">Actiu</label>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" name="active" role="switch"
                                    {{ $fair->active ? 'checked' : '' }}>
                            </div>

                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $fair->name }}" required>

                            <label for="date">Descripció</label>
                            <input type="text" class="form-control" id="description" name="description"
                                value="{{ $fair->description }}" required>

                            <label for="date">Data</label>
                            <input type="date" class="form-control" id="date" name="date"
                                value="{{ $fair->date }}" required>

                            <input type="submit" class="btn1 mt-3" value="Actualizar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
