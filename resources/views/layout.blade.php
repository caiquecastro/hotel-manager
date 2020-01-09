<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hotel Manager</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
@include('partials.navbar')
<div class="container" id="app">
    @yield('content')
</div>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
