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
        <a href="{{ route('admin.mediaLinks.edit') }}" class="btn1">Actualitzar vídeo/Imatges</a>
        <a href="{{ route('admin.fairs.create') }}" class="btn1 mt-2">Crear Fira</a>
        <a href="{{ route('admin.activities.index') }}" class="btn1 mt-2">Activitats</a>

        <div class="table-responsive mt-4">
            <table id="table-fairs" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Actiu</th>
                        <th>Nom</th>
                        <th>Data</th>
                        <th>Reserves</th>
                        <th>Activitats</th>
                        <th>Accions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fairs as $fair)
                        <tr>
                            <td>{{ $fair->active ? '🟢' : '' }}</td>
                            <td>{{ $fair->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($fair->date)->format('d/m/Y') }}</td>
                            <td>{{ $fair->confirmedBookings->count() }}</td>
                            <td>{{ $fair->fairActivities->count() }}</td>
                            <td>
                                <a href="{{ route('admin.fairActivities', $fair->id) }}" class="btn1">Veure</a>
                                <a href="{{ route('admin.fairs.edit', $fair->id) }}" class="btn1">Editar</a>
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
