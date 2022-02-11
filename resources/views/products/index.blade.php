@extends('layouts.master')

@section('title', 'Product List')

@section('content')
    <h1 class="mb-4 mt-4 text-center display-6 fw-bold">Product List</h1>

    @if(Session::has('success'))
        <p class="text-success">{{ Session::get('success') }}</p>
    @endif

    @if(Session::has('error'))
        <p class="text-danger">{{ Session::get('error') }}</p>
    @endif

    <a href="{{ route('products.create') }}" class="btn btn-outline-primary mb-3">Add New Product</a>

    <form action="" method="GET">
        
    </form>

    @if (!empty($categories))
        <table class="table table-border">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Thumbnail</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->category->name }}</td>
                        <td>{{ $value->thumbnail }}</td>
                        <td>
                            <a href="{{ route('products.show', $value->id) }}" class="btn btn-outline-primary">View Detail</a>
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $value->id) }}" class="btn btn-outline-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('products.destroy', $value->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#productDelete" id="myBtn">
                                    Delete
                                </button>

                                <div id="productDelete"  class="modal " tabindex="-1" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            {{-- <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">This is Modal</h4>
                                            </div> --}}
                                            <div class="modal-body">
                                                <p>Are you sure delete the Product #{{ $value->name }} ?</p>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary">Ok</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    @else
        No product yet
    @endif
@endsection

{{-- @push('js')
    <script src="../../../public/js/modal-test.js"></script>
@endpush --}}