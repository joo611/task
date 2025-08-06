@extends('adminlte::page')

@section('title', 'Notifications')

@section('content_header')
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h1 class="h4">Notifications</h1>
        <form action="{{ route('notifications.markAllRead') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btn-success">Mark All as Read</button>
        </form>
    </div>

@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Created By</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($notifications as $index => $notification)
            <tr>
                <td>{{ $index + 1 }}</td>

                <td>
                    <a href="{{ route('admin.posts.show', $notification->data['post_id']) }}">
                        {{ $notification->data['title'] ?? 'No Title' }}
                    </a>
                </td>

                <td>{{ $notification->data['created_by'] ?? '-' }}</td>

                <td>
                    @if($notification->read_at)
                        <span class="badge badge-success">Read</span>
                    @else
                        <span class="badge badge-warning">Unread</span>
                    @endif
                </td>

                <td>{{ $notification->created_at->diffForHumans() }}</td>

                <td>
                    @if(!$notification->read_at)
                        <form action="{{ route('notifications.markRead', $notification->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-primary">
                                Mark as Read
                            </button>
                        </form>
                    @else
                        <button class="btn btn-sm btn-secondary" disabled>Marked</button>
                    @endif
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $notifications->links() }}
@stop
