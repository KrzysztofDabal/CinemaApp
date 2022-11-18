@extends('layouts.admin.admin-app')

@section('title', 'Create Reservation')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Reservation</h1>
        <div class="card mb-4">

            <div class="card-header">
                Create Reservation
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
                <form method="POST" action="{{ route('admin/select_seat') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="rows" class="col-md-4 col-form-label text-md-end">{{ __('User') }}</label>

                        <div class="col-md-6">
                            <select id="user_id" class="form-select @error('user_id') is-invalid @enderror" name="user_id" aria-label="Default select example" required>

                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</option>
                                @endforeach
                            </select>

                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="rows" class="col-md-4 col-form-label text-md-end">{{ __('Seance') }}</label>

                        <div class="col-md-6">
                            <select id="seance_id" class="form-select @error('seance_id') is-invalid @enderror" name="seance_id" aria-label="Default select example" required>

                                {{ $selected = false }}
                                @foreach($seances as $seance)
                                    <option value="{{ $seance->id }}">
                                        {{ \App\Models\Movie::find($seance->movie_id)->id  }} | {{ \App\Models\Movie::find($seance->movie_id)->title  }}
                                    </option>
                                @endforeach
                            </select>

                            @error('seance_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Select Seat
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
