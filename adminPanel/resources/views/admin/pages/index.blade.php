@extends('layouts.layout')

@section('content')
<h2>Pages</h2>
<a href="{{ route('pages.create') }}" class="btn btn-primary mb-3">+ Add New</a>

<table class="table table-bordered">
    <thead>
        <tr><th>Title</th><th>Actions</th></tr>
    </thead>
    <tbody>
        @foreach($pages as $page)
        <tr>
            <td>{{ $page->title }}</td>
            <td>{{ $page->content }}</td>

            <td>
                <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
