@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required value="{{ old('username', $user->username) }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-3">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control" required value="{{ old('mobile', $user->mobile) }}">
        </div>

        <div class="mb-3">
            <label>New Password (leave blank to keep current)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@stop
