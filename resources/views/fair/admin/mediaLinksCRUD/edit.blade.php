@extends('fair.layouts.app')
@section('title', 'Editar vídeo/Imatges')

@section('pageTitle', 'Hola, ' . auth()->user()->getFirstname())
@section('pageContent')
@endsection
@section('content')

    <div class="row justify-content-center">
        <a href="{{ route('admin.dashboard') }}" class="btn1">Tornar</a>
        <div class="col-md-8">
            <div class="card mt-5 mb-5">
                <div class="card-header">Editar vídeo/Imatges</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.mediaLinks.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="media_type">Tipus</label>
                            <select name="media_type" id="media_type" class="form-control">
                                <option value="indexVideo">Vídeo de Fons</option>
                                <option value="map">Mapa</option>
                                <option value="mapLeg">Llegenda de mapa</option>
                            </select>

                            <label for="media_path">Vídeo/Imatge</label>
                            <input type="file" class="form-control" id="media_path" name="media_path" required>

                            <input type="submit" class="btn1 mt-3" value="Actualizar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
