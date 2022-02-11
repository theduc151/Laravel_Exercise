@extends('layouts.master')

@section('title', 'List of categories')

@section('content')
    <h1 class="mb-4 mt-4 text-center display-6 fw-bold">List of Category</h1>

    @if(Session::has('success'))
        <p class="text-success">{{ Session::get('success') }}</p>
    @endif

    @if(Session::has('error'))
        <p class="text-danger">{{ Session::get('error') }}</p>
    @endif

    <a href="{{ route('categories.create') }}" class="btn btn-outline-primary mb-3">Add New Category</a>

    @if (!empty($categories))
        <table class="table table-border">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th colspan="3" class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>
                            <a href="{{ route('categories.show', $value->id) }}" class="btn btn-outline-primary">View Detail</a>
                        </td>
                        <td>
                            <a href="{{ route('categories.edit', $value->id) }}" class="btn btn-outline-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('categories.destroy', $value->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $categories->links() }}
    @else
        No category yet
    @endif
@endsection