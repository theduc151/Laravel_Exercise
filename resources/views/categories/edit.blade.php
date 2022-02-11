@extends('layouts.master')

@section('title', 'Update Category')

@section('content')
    <h1 class="mb-4 mt-4 text-center display-6 fw-bold">Update Category</h1>

    <form action="{{ route('categories.update', $categories->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label for="" class="mb-3">Category Name</label>
            <input type="text" name="name" value="{{ $categories->name }}" class="form-control">
        </div>
        <div>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Category List</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection