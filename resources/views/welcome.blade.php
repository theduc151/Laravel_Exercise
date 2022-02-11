@extends('layouts.master')

{{-- set page title --}}
@section('title', 'Home Page')

@section('content')
    <!-- show error messsage -->
    @include('errors.error')
    
    {{-- category - product --}}
    <section class="category-product">
        <div class="row">
            <div class="col-3">
                {{-- menu left --}}
                @include('home_parts.menu_left')
            </div>
            <div class="col-9">
                {{-- slide --}}
                @include('home_parts.slide')
            </div>
        </div>
    </section>

    {{-- advertisement --}}
    <section class="advertisement-section">
        @include('home_parts.advertisement')
    </section>

    {{-- list product --}}
    <section class="list-product-section">
        @include('home_parts.product_list')
    </section>
@endsection

@push('css')
    <link rel="stylesheet" href="/css/home.css">
@endpush

@push('js')
    <script src="/js/home.js"></script>
@endpush