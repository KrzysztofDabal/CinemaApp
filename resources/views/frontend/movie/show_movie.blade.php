@extends('layouts.frontend.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-12 text-center">
                    <h1>{{ $movie->title }}</h1>
                </div>
                <div class="col-md-12 text-center">
                    <img src="{{  asset('image/movie/'.$movie->image) }}" style="width: 280px; height: 400px;" alt="img"/><br>
                    Director: {{ $movie->director }}<br>
                    Scriptwriter: {{ $movie->scriptwriter }}<br>
                    Description: {{ $movie->description }}<br>
                    Length: {{ $movie->length }}min<br>
                    Rating: {{ $movie->rating }}<br>
                    Category:@foreach($movie->category as $category) {{ $category }}<br> @endforeach<br>
                </div>

                <a href="{{ url()->previous() }}" class="btn btn-danger">Previous</a>
            </div>
        </div>
    </div>
@endsection
