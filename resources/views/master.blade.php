<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messierlog</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/screen.css') }}" />
</head>
<body>
<div id="container">
<header><h1>MESSIERLOG</h1></header>
<main>
    @yield('content')
</main>
</div>

<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>