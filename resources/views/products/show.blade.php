@extends('layouts.master')

@section('title', 'Product Detail')

@section('content')
    <h1 class="mb-4 mt-4 text-center display-6 fw-bold">Product Detail</h1>

    <div class="mb-2">
        <label for="">Product Name</label>
        <input type="text" name="name" value="{{ $products->name }}" class="form-control">
    </div>

    <div class="mb-2">
        <a href="{{ route('products.index') }}" class="btn btn-outline-primary">Product List</a>
    </div>
@endsection