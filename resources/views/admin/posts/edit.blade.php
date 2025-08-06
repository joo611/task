@extends('adminlte::page')

@section('title', 'Edit Post')

@section('content_header')
    <h1>Edit Post</h1>
@stop

@section('content')
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>User</label>
            <select name="user_id" class="form-control" required>
                <option value="">-- Select User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $post->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->username }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title', $post->title) }}">
        </div>

        <div class="mb-3">
            <label>Description (max 2KB)</label>
            <textarea name="description" class="form-control" rows="5" maxlength="2048" required>{{ old('description', $post->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required value="{{ old('phone', $post->phone) }}">
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@stop
