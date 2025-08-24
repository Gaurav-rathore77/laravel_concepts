@extends('layouts.layout')

@section('content')
<h2>Available Pages</h2>
<ul>
    @foreach($pages as $page)
        <li><a href="{{ url('page/'.$page->id) }}">{{ $page->title }}</a></li>
    @endforeach
</ul>
@endsection
