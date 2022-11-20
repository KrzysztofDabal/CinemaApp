@extends('layouts.admin.admin-app')

@section('title', 'View User')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">User</h1>
        <div class="card mb-4">

            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Users
                <a href="{{ route('admin/user.add') }}" class="btn btn-primary btn-sm float-end">Add User</a>
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
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Slug</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><img src="{{  asset('image/user/'.$user->avatar) }}" style="width: 50px; height: 50px;" alt="img"/></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->slug }}</td>
                            <td>{{ $user->email }}</td>
                            @if($user->id == auth()->user()->id)
                                <td>
                                    @foreach($roles as $role)
                                        {{ ($role->id == $user->role)? $role->name: '' }}
                                    @endforeach
                                </td>
                                <td>It's you</td>
                            @else
                                <form method="POST" action="{{ route('admin/change.role', $user->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <select id="role" name="role">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{ ($role->id == $user->role)? 'selected': '' }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-success">
                                            Change Role
                                        </button>
                                    </td>
                                </form>
                            @endif
                            <td><a href="{{ route('admin/user.edit', $user->id) }}" class="btn btn-secondary btn-sm">Edit User</a></td>
                            <td><a href="{{ route('admin/user.delete', $user->id) }}" class="btn btn-danger btn-sm">Delete User</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
