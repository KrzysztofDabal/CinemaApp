@extends('layouts.frontend.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Profil') }}
                        <div class="float-end">
                            <a href="{{ route('profile.dashboard') }}" class="btn-secondary btn btn-sm float"><-Wróć</a>
                            <a href="{{ route('profile.update') }}" class="btn btn-primary btn-sm float">Edytuj</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            {{ $user->name }} {{ $user->surname }}<br>
                            {{ $user->email }}<br>
                            {{ $user->phone_number }}<br>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
