@extends('layouts.admin.admin-app')

@section('title', 'View Reservation')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Reservation</h1>
        <div class="card mb-4">

            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Reservation
                <a href="{{ route('admin/add_reservation') }}" class="btn btn-primary btn-sm float-end">Add Reservation</a>
            </div>
            <div class="card-body">

                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <table class="table table-bordered" id="myDataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Seance ID</th>
                            <th>Seat Name</th>
                            <th>Row</th>
                            <th>Column</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->user_id }}</td>
                            <td>{{ $reservation->seance_id }}</td>
                            <td>{{ $row_name[$reservation->seat_row-1] }}{{ $reservation->seat_column }}</td>
                            <td>{{ $reservation->seat_row }}</td>
                            <td>{{ $reservation->seat_column }}</td>
                            <td><a href="{{ route('admin/edit_reservation', $reservation->id) }}" class="btn btn-secondary btn-sm">Edit Reservation</a></td>
                            <td><a href="{{ route('admin/delete_reservation', $reservation->id) }}" class="btn btn-danger btn-sm">Delete Reservation</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
