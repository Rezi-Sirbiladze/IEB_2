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
        <button class="btn1" onclick="window.history.back()">Tornar</button>

        {{ $fairActivity->activity->name }} | {{ $fairActivity->start_time }} - {{ $fairActivity->end_time }}
        <div class="table-responsive mt-4">
            <table id="table-fairs" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nom complet</th>
                        <th>Correu electrònic</th>
                        <th>Presentat</th>
                        <th>Valoració</th>
                        <th>Comentari</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr data-booking-id="{{ $booking->id }}">
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->user->email }}</td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="presented-checkbox form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault{{ $booking->id }}"
                                        {{ $booking->presented ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>{{ $booking->review ? $booking->review->score : '' }}</td>
                            <td>{{ $booking->review ? $booking->review->comment : '' }}</td>
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

        // Listen for change events on the checkboxes
        $(document).on('change', '.presented-checkbox', function() {
            var $row = $(this).closest('tr');
            var presented = $(this).prop('checked') ? 'On' : 'Off';
            $row.find('td.presented').text(presented);

            $.ajax({
                url: "{{ route('admin.updatepresentedstatus') }}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    booking_id: $row.data('booking-id'),
                    presented: $(this).prop('checked') ? 1 : 0
                },
                success: function(response) {

                },
                error: function(xhr, status, error) {

                }
            });
        });
    </script>

@endsection
