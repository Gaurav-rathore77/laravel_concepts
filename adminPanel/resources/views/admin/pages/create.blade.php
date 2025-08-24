@extends('layouts.layout')

@section('content')
<h2>Create Page</h2>
<form method="POST" action="{{ route('pages.store') }}">
    @csrf
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="mb-3">
        <label>Content</label>
        <textarea name="content" class="form-control"></textarea>
    </div>
    <button class="btn btn-success">Save</button>
</form>
@endsection
