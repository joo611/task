<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daily Report - {{ $today }}</title>
</head>
<body>
    <h2>📊 Daily Report - {{ $today }}</h2>

    <h3>🧑 New Users</h3>
    @if($newUsers->isEmpty())
        <p>No new users today.</p>
    @else
        <ul>
            @foreach($newUsers as $user)
                <li>{{ $user->name }} ({{ $user->email }}) - Registered at {{ $user->created_at->format('H:i') }}</li>
            @endforeach
        </ul>
    @endif

    <h3>📝 New Posts</h3>
    @if($newPosts->isEmpty())
        <p>No new posts today.</p>
    @else
        <ul>
            @foreach($newPosts as $post)
                <li>{{ $post->title }} by {{ $post->user->name }} - Posted at {{ $post->created_at->format('H:i') }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
