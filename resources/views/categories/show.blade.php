@extends('layouts.master')

@section('title', 'Category Detail')

@section('content')
    <h1 class="mb-4 mt-4 text-center display-6 fw-bold">Category Detail</h1>

    <div class="mb-2">
        <label for="">Category Name</label>
        <input type="text" name="name" value="{{ $categories->name }}" class="form-control">
    </div>

    <div class="mb-2">
        <a href="{{ route('categories.index') }}" class="btn btn-outline-primary">Category List</a>
    </div>
@endsection