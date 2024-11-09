@extends('layouts.frontend.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Profil') }}
                        <div class="float-end">
                            <a href="{{ route('profile.tickets') }}" class="btn btn-primary btn-sm float">Bilety</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Imię: {{ $user->name }}<br>
                        Nazwisko: {{ $user->surname }}<br>
                        Email: {{ $user->email }}<br>
                        Nr telefonu: {{ $user->phone_number }}<br>

                        <a href="{{ route('profile.update_form') }}" class="btn btn-primary btn-sm float">Edytuj</a>
                            @if($user->google_id==NULL)
                                <a href="{{ route('profile.update_password_form') }}" class="btn btn-primary btn-sm float">Zmień hasło</a>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
