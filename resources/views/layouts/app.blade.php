<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials._head')
    @yield('links')
</head>

<body>
    <div id="app">

        @include('partials._navbar')

        <main class="container py-4">
            @yield('content')
        </main>

        @include('partials._footer')

    </div>

    @include('partials._scripts')
</body>
</html>
