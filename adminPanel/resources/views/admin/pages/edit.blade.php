@extends('layouts.layout')

@section('content')
<h2>Edit Page</h2>
<form method="POST" action="{{ route('pages.update', $page->id) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ $page->title }}">
    </div>
    <div class="mb-3">
        <label>Content</label>
        <textarea name="content" class="form-control">{{ $page->content }}</textarea>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
