<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Messierlog</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/screen.css') }}" />
</head>
<body>
<div class="container">
<header class="mt-5"><h1>MESSIERLOG</h1></header>
<main class="row" id="app">
    @yield('content')
</main>
</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>