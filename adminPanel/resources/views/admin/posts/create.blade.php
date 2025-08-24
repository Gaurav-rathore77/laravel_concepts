@extends('layouts.admin')
@section('content')
<h2>Create Post</h2>
<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
@csrf
<label>Title</label>
<input type="text" name="title"><br><br>

<label>Category</label>
<select name="category_id">
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
    @endforeach
</select><br><br>

<label>Content</label>
<textarea name="content"></textarea><br><br>

<label>Image</label>
<input type="file" name="image"><br><br>

<button type="submit" class="btn">Save</button>
</form>
@endsection
