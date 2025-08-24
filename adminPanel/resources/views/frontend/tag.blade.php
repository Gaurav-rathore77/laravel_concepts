@extends('layouts.frontend')
@section('content')
<h1>Tag: {{ $tag->name }}</h1>
@foreach($tag->posts as $post)
    <h2><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h2>
@endforeach
@endsection
