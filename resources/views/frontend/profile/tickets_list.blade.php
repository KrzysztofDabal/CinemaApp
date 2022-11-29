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

                        @foreach($tickets as $ticket)
                                {{ $ticket->id }} <br>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
