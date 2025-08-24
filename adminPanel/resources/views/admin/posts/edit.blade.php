@extends('layouts.admin')
@section('content')
<h2>Edit Post</h2>
<form method="POST" action="{{ route('posts.update',$post->id) }}" enctype="multipart/form-data">
@csrf @method('PUT')
<label>Title</label>
<input type="text" name="title" value="{{ $post->title }}"><br><br>

<label>Category</label>
<select name="category_id">
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}" {{ $post->category_id==$cat->id ? 'selected':'' }}>
            {{ $cat->name }}
        </option>
    @endforeach
</select><br><br>

<label>Content</label>
<textarea name="content">{{ $post->content }}</textarea><br><br>

@if($post->image)
    <img src="{{ asset('storage/'.$post->image) }}" width="100"><br><br>
@endif

<label>Image</label>
<input type="file" name="image"><br><br>

<button type="submit" class="btn">Update</button>
</form>
@endsection
