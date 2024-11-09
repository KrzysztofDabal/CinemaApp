@extends('layouts.frontend.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-12 text-center">
                    <h1>Polecane filmy</h1>
                    <ul class="nav justify-content-center nav-fill">
                        @foreach($movies_rating as $movie)
                            <li class="nav-item">
                                <a>
                                    <img src="{{  asset('image/movie/'.$movie->image) }}" style="width: 140px; height: 200px;" alt="{{  $movie->title }}"/><br>
                                    <a href="{{ route('show_movie', $movie->id) }}">
                                        {{  $movie->title }}
                                    </a>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-12 text-center">
                    <h1>Polecane filmy - tytuł</h1>
                    <ul class="nav justify-content-center nav-fill">
                        @foreach($movies_title as $movie)
                            <li class="nav-item">
                                <a>
                                    <img src="{{  asset('image/movie/'.$movie->image) }}" style="width: 140px; height: 200px;" alt="{{  $movie->title }}"/><br>
                                    <a href="{{ route('show_movie', $movie->id) }}">
                                        {{  $movie->title }}
                                    </a>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection
