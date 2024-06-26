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
        <a href="{{ route('admin.dashboard') }}" class="btn1">Tornar</a>
        <a href="{{ route('admin.fairActivities.create', ['fair_id' => $fair->id]) }}" class="btn1 mt-2">Crear Actividad de
            Feria</a>

        {{ $fair->name }} | {{ $fair->date }}
        <div class="table-responsive mt-4">
            <table id="table-fairs" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Hora inici</th>
                        <th>Hora fi</th>
                        <th>Nom</th>
                        <th>Capacitat</th>
                        <th>Reserves</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fair->fairActivities as $fairActivity)
                        <tr>
                            <td>{{ $fairActivity->start_time }}</td>
                            <td>{{ $fairActivity->end_time }}</td>
                            <td>{{ $fairActivity->activity->name }}</td>
                            <td>{{ $fairActivity->capacity }}</td>
                            <td>{{ $fairActivity->confirmedBookings->count() }}</td>
                            <td>
                                <a href="{{ route('admin.fairActivityBookings', $fairActivity->id) }}"
                                    class="btn1">Veure</a>
                                <a href="{{ route('admin.fairActivities.edit', [$fair->id, $fairActivity->id]) }}"
                                    class="btn1 mt-1">Editar</a>
                                <form method="POST"
                                    action="{{ route('admin.fairActivities.destroy', [$fairActivity->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn1 mt-1">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#table-fairs').DataTable({
                dom: 'Bfrtip',
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    ['10 rows', '25 rows', '50 rows', '100 rows', 'Show all']
                ],
                buttons: ['excel', 'print', 'pageLength'],
            });
        });
    </script>

@endsection
