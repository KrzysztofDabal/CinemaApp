@extends('layouts.admin.admin-app')

@section('title', 'View Hall')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Hall</h1>
        <div class="card mb-4">

            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Halls
                <a href="{{ route('admin/add_hall') }}" class="btn btn-primary btn-sm float-end">Add Hall</a>
            </div>
            <div class="card-body">

                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <table class="table table-bordered" id="myDataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Rows</th>
                            <th>Columns</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($halls as $hall)
                        <tr>
                            <td>{{ $hall->id }}</td>
                            <td>{{ $hall->name }}</td>
                            <td>{{ $hall->slug }}</td>
                            <td>{{ $hall->rows }}</td>
                            <td>{{ $hall->columns }}</td>
                            <td><a href="{{ route('admin/edit_hall', $hall->id) }}" class="btn btn-secondary btn-sm">Edit Hall</a></td>
                            <td><a href="{{ route('admin/delete_hall', $hall->id) }}" class="btn btn-danger btn-sm">Delete Hall</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
