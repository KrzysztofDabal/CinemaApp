@extends('layouts.admin.admin-app')

@section('title', 'View Discount')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Discount</h1>
        <div class="card mb-4">

            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Discounts
                <a href="{{ route('admin/add_discount') }}" class="btn btn-primary btn-sm float-end">Add Discount</a>
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
                            <th>Discount</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($discounts as $discount)
                        <tr>
                            <td>{{ $discount->id }}</td>
                            <td>{{ $discount->name }}</td>
                            <td>{{ $discount->discount }}</td>
                            <td><a href="{{ route('admin/edit_discount', $discount->id) }}" class="btn btn-secondary btn-sm">Edit Discount</a></td>
                            <td><a href="{{ route('admin/delete_discount', $discount->id) }}" class="btn btn-danger btn-sm">Delete Discount</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
