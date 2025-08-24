@extends('layouts.frontend')
@section('content')
<h1>Category: {{ $category->name }}</h1>
@foreach($category->posts as $post)
    <h2><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h2>
@endforeach
@endsection
