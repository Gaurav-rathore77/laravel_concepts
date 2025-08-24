@extends('layouts.admin')
@section('content')
<h1>Welcome, Admin</h1>
<p>Total Posts: {{ \App\Models\Post::count() }}</p>
<p>Total Categories: {{ \App\Models\Category::count() }}</p>
<p>Total Tags: {{ \App\Models\Tag::count() }}</p>

<div class="container">
    <h4>Unread Notifications</h4>
    @foreach($unread as $notification)
        <div class="alert alert-info">
            {{ $notification->data['message'] }}
            <small>{{ $notification->created_at->diffForHumans() }}</small>
        </div>
    @endforeach

    <a href="{{ route('notifications.read') }}" class="btn btn-primary mt-3">Mark All as Read</a>
</div>
@endsection
