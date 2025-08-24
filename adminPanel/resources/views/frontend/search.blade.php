@extends('layouts.frontend')
@section('content')
<h1>Search Results for: "{{ $query }}"</h1>
@if($posts->count())
    @foreach($posts as $post)
        <h2><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h2>
        <p>{{ Str::limit($post->content,150) }}</p>
    @endforeach
    {{ $posts->links() }}
@else
    <p>No results found.</p>
@endif
@endsection
