@extends('layouts.master')

@section('title', 'Create a Product')

@section('content')
    <h1 class="mb-4 mt-4 text-center display-6 fw-bold">Create a Product</h1>

    <form action="{{ route('products.store') }}" method="post">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <label for="category" class="mb-3">Category Name</label>
                <select name="category" id="category" class="form-select mb-3">
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}"> {{ $item->name }}  </option>
                    @endforeach                    
                </select>
            </div>
            <div class="col-md-6">
                <label for="product-price" class="mb-3">Product Price</label>
                <input type="text" name="product-price" id="product-price" class="form-control mb-3">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="product-name" class="mb-3">Product Name</label>
                <input type="text" name="product-name" id="product-name" class="form-control mb-3">
            </div>
            <div class="col-md-6">
                <label for="product-image" class="mb-3">Product Images</label>
                <input type="file" name="product-image" id="product-image" class="form-control mb-3">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="product-thumbnail" class="mb-3">Product Thumbnail</label>
                <input type="file" name="product-thumbnail" id="product-thumbnail" class="form-control mb-3">
            </div>
        </div>
        <div class="row">
            <div>
                <label for="product-content" class="mb-3">Product Content</label>
                <textarea name="product-content" id="product-content" rows="5" class="form-control mb-3"></textarea>
            </div>
        </div>
        <div>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Product List</a>
            <button type="submit" class="btn btn-primary">Store</button>
        </div>
    </form>
@endsection