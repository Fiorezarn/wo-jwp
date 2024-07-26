<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div id="app">
        @include('partials.navbar')
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
