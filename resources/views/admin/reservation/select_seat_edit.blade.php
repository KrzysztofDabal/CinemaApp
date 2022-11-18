@extends('layouts.admin.admin-app')

@section('title', 'Select Seat')

@section('content')
    @inject('reservation_controller', 'App\Http\Controllers\Admin\ReservationController')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Select Seat</h1>
        <div class="card mb-4">

            <div class="card-header">
                Select Seat
                <a href="{{ route('admin/reservation') }}" class="btn btn-primary btn-sm float-end"><- Back</a>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="card-body">
                <form method="POST" action="{{ route('admin/edit_reservation', $reservation->id) }}">
                    @csrf
                    @method('PUT')

                    <input type="number" name="user_id" id="user_id" value="{{ $request['user_id'] }}" hidden>
                    <input type="number" name="seance_id" id="seance_id" value="{{ $request['seance_id'] }}" hidden>

                    <div class="row mb-3 justify-content-center">

                        <div class="col-md-8 bg-dark text-white text-center">
                            EKRAN
                        </div>
                        <div class="col-md-8 bg-opacity-50 bg-dark text-white justify-content-center">
                            @for($row=1; $row<=$hall->rows; $row++)

                                <div class="col-form-label-sm justify-content-center">
                                    @for($column=1; $column<=$hall->rows; $column++)

                                        <input type="radio" name="seat" class="btn-check text-center" id="seat{{ $row }},{{ $column }}" value='{"row": "{{ $row }}", "column": "{{ $column }}"}' {{ ($reservation->seat_row == $row && $reservation->seat_column == $column)? 'checked': (($reservation_controller->check_reservation($request['seance_id'], $row, $column) == true)? 'disabled': '') }} >
                                        <label class="btn btn-outline-primary {{ ($reservation->seat_row == $row && $reservation->seat_column == $column)? 'btn-info': (($reservation_controller->check_reservation($request['seance_id'], $row, $column) == true)? 'btn-danger': 'btn-light') }}" style="height: 45px; width: 45px; font-size: small" for="seat{{ $row }},{{ $column }}">
                                            {{ $row_name[$row-1] }} {{ ($column>=10)? $column: '0'.$column }}
                                        </label>
                                    @endfor
                                </div>
                            @endfor

                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ url()->previous() }}" class="btn btn-danger">Previous</a>
                            <button type="submit" class="btn btn-primary">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
