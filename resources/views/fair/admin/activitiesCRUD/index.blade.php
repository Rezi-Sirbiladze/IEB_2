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
        Admin
        <a href="{{ route('admin.dashboard') }}" class="btn1">Tornar</a>
        <a href="{{ route('admin.activities.create') }}" class="btn1 mt-2">Crear Activitat</a>
        <div class="table-responsive mt-4">
            <table id="table-fairs" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Descripció</th>
                        <th>Zona</th>
                        <th>Accions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $activity->name }}</td>
                            <td>{{ $activity->description }}</td>
                            <td>{{ $activity->location }}</td>
                            <td>
                                <a href="{{ route('admin.activities.edit', $activity->id) }}" class="btn1">Editar</a>
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
                ordering: false
            });
        });
    </script>

@endsection
