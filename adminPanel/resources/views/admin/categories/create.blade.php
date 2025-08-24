@extends('layouts.admin')
@section('content')
<h2>Create Category</h2>
<form method="POST" action="{{ route('categories.store') }}">
@csrf
<input type="text" name="name" placeholder="Category Name">
<button class="btn" type="submit">Save</button>
</form>
@endsection
