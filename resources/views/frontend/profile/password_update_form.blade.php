@extends('layouts.frontend.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Edytuj Profil') }}
                    </div>

                    <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                                <div class="row mb-3">
                                    <label for="old_password" class="col-md-4 col-form-label text-md-end">{{ __('Stare hasło') }}</label>

                                    <div class="col-md-6">
                                        <input id="old_password" type="password" class="form-control
                                        @error('old_password') is-invalid @enderror" name="old_password" value="" required autocomplete="old_password">

                                        @error('old_password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Nowe hasło') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control
                                        @error('password') is-invalid @enderror" name="password" value="" required autocomplete="password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Powtórz nowe hasło') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control
                                        @error('password-confirm') is-invalid @enderror" name="password-confirm" value="" required autocomplete="password-confirm">

                                        @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                        </div>

                        <div class="float-end">
                            <a href="{{ route('profile.dashboard') }}" class="btn-secondary btn btn-sm float"><-Wróć</a>
                            <button type="submit" class="btn-primary btn btn-sm float">
                                Zapisz
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
