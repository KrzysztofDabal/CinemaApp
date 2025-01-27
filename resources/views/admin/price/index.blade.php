@extends('layouts.admin.admin-app')

@section('title', 'View Price')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Movie</h1>
        <div class="card mb-4">

            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Movies
                <a href="{{ route('admin/add_price') }}" class="btn btn-primary btn-sm float-end">Add Price</a>
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
                            <th>Price</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($prices as $price)
                        <tr>
                            <td>{{ $price->id }}</td>
                            <td>{{ $price->name }}</td>
                            <td>{{ $price->price }} Zł</td>
                            <td><a href="{{ route('admin/edit_price', $price->id) }}" class="btn btn-secondary btn-sm">Edit Price</a></td>
                            <td><a href="{{ route('admin/delete_price', $price->id) }}" class="btn btn-danger btn-sm">Delete Price</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
