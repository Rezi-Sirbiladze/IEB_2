@extends('fair.layouts.app')
@section('title', 'Editar Activitiat de Fira')

@section('pageTitle', 'Hola, ' . auth()->user()->getFirstname())
@section('pageContent')
@endsection
@section('content')

    <div class="row justify-content-center">
        <a href="{{ route('admin.fairActivities', $fair->id) }}" class="btn1">Tornar</a>
        <div class="col-md-8">
            <div class="card mt-5 mb-5">
                <div class="card-header">Editar Activitiat de Fira</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.fairActivities.update', $fairActivity->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="hidden" name="fair_id" value="{{ $fair->id }}">

                            <label for="activity_id">Activitat</label>
                            <select class="form-control" id="activity_id" name="activity_id" required>
                                @foreach ($activities as $activity)
                                    <option value="{{ $activity->id }}" @if ($activity->id == $fairActivity->activity_id) selected @endif>
                                        {{ $activity->name }}</option>
                                @endforeach
                            </select>

                            <label for="capacity">Places</label>
                            <input type="number" class="form-control" id="capacity" name="capacity" min="1"
                                max="100" value="{{ $fairActivity->capacity }}" required>

                            <label for='start_time'>Hora d'inici</label>
                            <input type="time" class="form-control" id="start_time" name="start_time"
                                value="{{ $fairActivity->start_time }}" required>

                            <label for='end_time'>Hora de fi</label>
                            <input type="time" class="form-control" id="end_time" name="end_time"
                                value="{{ $fairActivity->end_time }}" required>

                            <input type="submit" class="btn1 mt-3" value="Actualizar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
