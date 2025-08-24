@extends('layouts.frontend')
@section('content')
<h1>Latest Posts</h1>

{{-- Filters --}}
<h3>Filter by Category:</h3>
@foreach($categories as $cat)
    <a href="{{ route('category.show', $cat->slug) }}">{{ $cat->name }}</a>
@endforeach

<h3>Filter by Tag:</h3>
@foreach($tags as $tag)
    <a href="{{ route('tag.show', $tag->slug) }}">{{ $tag->name }}</a>
@endforeach

<hr>
{{-- Posts --}}
@foreach($posts as $post)
    <h2><a href="{{ route('post.show',$post->slug) }}">{{ $post->title }}</a></h2>
    <p>{{ Str::limit($post->content,150) }}</p>
@endforeach

{{ $posts->links() }}
@endsection
