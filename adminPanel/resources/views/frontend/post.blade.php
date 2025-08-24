@extends('layouts.frontend')
@section('content')
<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>

<hr>
<h3>Comments</h3>
@foreach($post->comments as $comment)
    <div>
        <strong>{{ $comment->user->name }}</strong>: {{ $comment->body }}
    </div>
@endforeach

@auth
<form method="POST" action="{{ route('comments.store', $post->id) }}">
    @csrf
    <textarea name="body" rows="3" required></textarea>
    <button type="submit">Add Comment</button>
</form>
@endauth
@endsection
