@extends('layouts.admin.admin-app')

@section('title', 'Edit Movie')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Movie</h1>
        <div class="card mb-4">

            <div class="card-header">
                Edit Movie
                <a href="{{ route('admin/movie') }}" class="btn btn-primary btn-sm float-end"><- Back</a>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                @endforeach
                </div>
            @endif

            <div class="card-body">
                <form method="POST" action="{{ route('admin/edit_movie', $movie->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $movie->title }}" required autocomplete="title">

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="author" class="col-md-4 col-form-label text-md-end">{{ __('Director') }}</label>

                        <div class="col-md-6">
                            <input id="director" type="text" class="form-control @error('director') is-invalid @enderror" name="director" value="{{ $movie->director }}" required autocomplete="director">

                            @error('director')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="author" class="col-md-4 col-form-label text-md-end">{{ __('Scriptwriter') }}</label>

                        <div class="col-md-6">
                            <input id="scriptwriter" type="text" class="form-control @error('scriptwriter') is-invalid @enderror" name="scriptwriter" value="{{ $movie->scriptwriter }}" required autocomplete="scriptwriter">

                            @error('scriptwriter')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="length" class="col-md-4 col-form-label text-md-end">{{ __('Length') }}</label>

                        <div class="col-md-6">
                            <input id="length" type="number" class="form-control @error('length') is-invalid @enderror" name="length" value="{{ $movie->length }}" required autocomplete="length">

                            @error('length')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <textarea id="description" rows="5" class="form-control @error('description') is-invalid @enderror" name="description"required autocomplete="description">{{ $movie->description }}</textarea>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image_file" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                        <div class="col-md-6">
                            <input id="image_file" type="file" class="form-control @error('image_file') is-invalid @enderror" name="image_file" value="{{ $movie->image }}"  autocomplete="image_file">

                            @error('image_file')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="rating" class="col-md-4 col-form-label text-md-end">{{ __('Rating') }}</label>

                        <div class="col-md-6">
                            <input id="rating" type="number" class="form-control @error('rating') is-invalid @enderror" name="rating" value="{{ $movie->rating }}" required autocomplete="rating" autofocus>

                            @error('rating')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>

                        <div class="col-md-6">
                            <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ $movie->category }}" required autocomplete="category" autofocus>

                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
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
