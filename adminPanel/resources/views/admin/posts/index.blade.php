@extends('layouts.admin')
@section('content')
<a href="{{ route('posts.create') }}">+ New Post</a>
<table>
<tr><th>Title</th><th>Category</th><th>Actions</th></tr>
@foreach($posts as $post)
<tr>
  <td>{{ $post->title }}</td>
  <td>{{ $post->category->name }}</td>
  <td>
     <a href="{{ route('posts.edit',$post->id) }}">Edit</a>
     <form action="{{ route('posts.destroy',$post->id) }}" method="POST" style="display:inline">
        @csrf @method('DELETE')
        <button type="submit">Delete</button>
     </form>
  </td>
</tr>
@endforeach
</table>
@endsection
