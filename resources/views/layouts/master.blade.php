<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Home Page')</title>

    @include('layouts.css')
</head>
<body>
    {{-- @include('layouts.header') --}}

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
    
    {{-- @include('layouts.footer') --}}

    @include('layouts.js')
</body>
</html>