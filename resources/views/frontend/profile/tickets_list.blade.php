@extends('layouts.frontend.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Tickets List') }}
                        <div class="float-end">
                            <a href="{{ route('profile.dashboard') }}" class="btn-secondary btn btn-sm float"><-Wróć</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            @foreach($reservations as $reservation)
                                <a href="{{ route('profile.ticket_show', $reservation->id) }}" class="btn btn-sm {{ ($reservation->paid==0)? 'btn-danger' : 'btn-success' }}">
                                    Film: {{ $reservation->title }}Data: {{ $reservation->date }} Godzina: {{ \Carbon\Carbon::parse($reservation->time)->format('H:i') }}Status: {{ ($reservation->paid==0)? 'nieoplacone' : 'opłacone' }}<br>
                                </a>
                            @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
