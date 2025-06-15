<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body class="bg-gray-100">
    <div class="flex">
        @include('partials.sidebar')

        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>

    @stack('scripts')
</body>
</html>
