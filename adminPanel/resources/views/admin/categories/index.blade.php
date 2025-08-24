@extends('layouts.admin')
@section('content')
<h2>Categories</h2>
<a class="btn" href="{{ route('categories.create') }}">+ New Category</a>
<table>
<tr><th>Name</th><th>Actions</th></tr>
@foreach($categories as $cat)
<tr>
    <td>{{ $cat->name }}</td>
    <td>
        <a class="btn" href="{{ route('categories.edit',$cat->id) }}">Edit</a>
        <form action="{{ route('categories.destroy',$cat->id) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn" type="submit">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
@endsection
