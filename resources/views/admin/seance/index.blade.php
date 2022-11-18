@extends('layouts.admin.admin-app')

@section('title', 'View Seance')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Seance</h1>
        <div class="card mb-4">

            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Seance
                <a href="{{ route('admin/add_seance') }}" class="btn btn-primary btn-sm float-end">Add Seance</a>
            </div>
            <div class="card-body">

                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <table class="table table-bordered" id="myDataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Movie</th>
                            <th>Hall</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Hall Res Time</th>
                            <th>Status</th>
                            <th></th>
                            <th>Created by</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($seances as $seance)
                        <tr>
                            <td>{{ $seance->id }}</td>
                            <td>ID:<b>{{ $seance->movie_id }}</b>    Title:<b>{{ \App\Models\Movie::find($seance->movie_id)->title }}</b></td>
                            <td>ID:<b>{{ $seance->hall_id }}</b>    Name:<b>{{ \App\Models\Hall::find($seance->hall_id)->name }}</b></td>
                            <td>{{ $seance->date }}</td>
                            <td>{{ \Carbon\Carbon::parse($seance->time)->format('H:i') }}</td>
                            <td>{{ $seance->hall_res_time }}min</td>
                            <td  class="{{ $seance->status == false ? 'bg-danger' : 'bg-success'}}"> {{ $seance->status == false ? 'Hidden' : 'Active'}}</td>
                            <th>
                                <form method="POST" action="{{ route('admin/edit_seance_status', $seance->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <button type="submit" class="btn btn-primary">
                                        Change Status
                                    </button>

                                </form>
                            </th>
                            <td>{{ $seance->created_by }}</td>
                            <td><a href="{{ route('admin/edit_seance', $seance->id) }}" class="btn btn-secondary btn-sm">Edit Seance</a></td>
                            <td><a href="{{ route('admin/delete_seance', $seance->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete Seance</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<script>
    var deleteLinks = document.querySelectorAll('.delete');

    for (var i = 0; i < deleteLinks.length; i++) {
        deleteLinks[i].addEventListener('click', function(event) {
            event.preventDefault();

            var choice = confirm(this.getAttribute('data-confirm'));

            if (choice) {
                window.location.href = this.getAttribute('href');
            }
        });
    }
</script>
