@extends('layouts.admin.admin-app')

@section('title', 'Create Hall')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Hall</h1>
        <div class="card mb-4">

            <div class="card-header">
                Create Hall
                <a href="{{ route('admin/hall') }}" class="btn btn-primary btn-sm float-end"><- Back</a>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                @endforeach
                </div>
            @endif

            <div class="card-body">
                <form method="POST" action="{{ route('admin/store_hall') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="rows" class="col-md-4 col-form-label text-md-end">{{ __('Rows') }}</label>

                        <div class="col-md-6">
                            <input id="rows" type="number" class="form-control @error('rows') is-invalid @enderror" name="rows" value="{{ old('rows') }}" required autocomplete="rows">

                            @error('rows')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="columns" class="col-md-4 col-form-label text-md-end">{{ __('Columns') }}</label>

                        <div class="col-md-6">
                            <input id="columns" type="number" class="form-control @error('columns') is-invalid @enderror" name="columns" value="{{ old('columns') }}" required autocomplete="columns">

                            @error('columns')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
