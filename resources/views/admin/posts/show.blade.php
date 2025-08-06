@extends('adminlte::page')

@section('title', 'Post Details')

@section('content_header')
    <h1 class="mb-3">Post Details</h1>
@stop

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ $post->title }}</h4>
        </div>

        <div class="card-body">
            <dl class="row mb-4">
                <dt class="col-sm-3">Author</dt>
                <dd class="col-sm-9">{{ $post->user->name }}</dd>

                <dt class="col-sm-3">Created</dt>
                <dd class="col-sm-9">{{ $post->created_at->format('F j, Y \a\t g:i A') }}</dd>

                <dt class="col-sm-3">Last Updated</dt>
                <dd class="col-sm-9">{{ $post->updated_at->format('F j, Y \a\t g:i A') }}</dd>
            </dl>

            <hr>

            <h5 class="fw-bold">Content</h5>
            <div class="p-3 bg-light rounded border">
                {!! nl2br(e($post->description)) !!}
            </div>
        </div>

        <div class="card-footer text-end">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Back to Posts
            </a>
        </div>
    </div>
@stop
