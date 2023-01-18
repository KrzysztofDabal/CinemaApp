@extends('layouts.frontend.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Tickets List') }}
                        <div class="float-end">
                            <a href="{{ route('profile.tickets') }}" class="btn-secondary btn btn-sm float"><-Wróć</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            Tytuł: {{ $reservation->title }}<br>
                            Imię: {{ $reservation->name }} {{ $reservation->surname }}<br>
                            Sala: {{ $reservation->hallName }}<br>
                            Data: {{ $reservation->date }} Godzina: {{ \Carbon\Carbon::parse($reservation->time)->format('H:i') }}<br>
                            Rząd: {{ $reservation->seat_row }} Miejsce: {{ $reservation->seat_column }}<br>
                            Status: {{ ($reservation->paid==0)? 'nieopłacone' : 'opłacone' }}<br>

                        <button class="btn btn-secondary">Zapłać</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
