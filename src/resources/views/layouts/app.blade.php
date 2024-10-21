<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <title>ONE LINE DIARY.</title>

</head>
<body>
    <div id="app">
        <header>
            <h1 class='title'>ONE LINE DIARY</h1>
        </header>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>