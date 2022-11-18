@extends('layouts.frontend.app')

@section('title', 'View Movie')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <h1>Movies List</h1>
            </div>
            <div class="card-body">

                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <table class="table table-bordered" id="myDataTable">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Director</th>
                        <th>Scriptwriter</th>
                        <th>Description</th>
                        <th>Length</th>
                        <th>Rating</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($movies as $movie)
                        <tr>
                            <td><img src="{{  asset('image/movie/'.$movie->image) }}" style="width: 70px; height: 100px;" alt="img"/></td>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->director }}</td>
                            <td>{{ $movie->scriptwriter }}</td>
                            <td>{{ $movie->description }}</td>
                            <td>{{ $movie->length }}min</td>
                            <td>{{ $movie->rating }}</td>
                            <td><a href="{{ route('show_movie', $movie->id) }}" class="btn btn-secondary btn-sm">View movie</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
