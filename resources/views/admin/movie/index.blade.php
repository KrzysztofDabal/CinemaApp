@extends('layouts.admin.admin-app')

@section('title', 'View Movie')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Movie</h1>
        <div class="card mb-4">

            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Movies
                <a href="{{ route('admin/add_movie') }}" class="btn btn-primary btn-sm float-end">Add Movie</a>
            </div>
            <div class="card-body">

                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <table class="table table-bordered" id="myDataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Director</th>
                            <th>Scriptwriter</th>
                            <th>Description</th>
                            <th>Length</th>
                            <th>Rating</th>
                            <th>Category</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($movies as $movie)
                        <tr>
                            <td>{{ $movie->id }}</td>
                            <td><img src="{{  asset($image_route.$movie->image) }}" style="width: 70px; height: 100px;" alt="img"/></td>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->slug }}</td>
                            <td>{{ $movie->director }}</td>
                            <td>{{ $movie->scriptwriter }}</td>
                            <td>{{ $movie->description }}</td>
                            <td>{{ $movie->length }}min</td>
                            <td>{{ $movie->rating }}</td>
                            <td>{{ $movie->category }}</td>
                            <td><a href="{{ route('admin/edit_movie', $movie->id) }}" class="btn btn-secondary btn-sm">Edit Movie</a></td>
                            <td><a href="{{ route('admin/delete_movie', $movie->id) }}" class="btn btn-danger btn-sm">Delete Movie</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
