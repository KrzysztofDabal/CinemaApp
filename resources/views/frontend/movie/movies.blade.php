@extends('layouts.frontend.app')

@section('title', 'View Movie')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <h1>Lista Filmów</h1>
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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($movies as $movie)
                        <tr>
                                <td>
                                    <a href="{{ route('show_movie', $movie->id) }}">
                                        <img src="{{  asset('image/movie/'.$movie->image) }}" style="width: 70px; height: 100px;" alt="img"/>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('show_movie', $movie->id) }}">
                                        {{ $movie->title }}
                                    </a>
                                </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
