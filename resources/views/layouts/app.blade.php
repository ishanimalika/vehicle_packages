<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.head')
</head>
<body class="d-flex flex-column min-vh-100">

    @include('components.header')

    <main class="flex-fill">
        @yield('content')
    </main>

    @include('components.footer')

    @stack('scripts')

</body>
</html>


