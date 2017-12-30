<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hotel Manager</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<nav class="navbar is-primary">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            Hotel Manager
        </a>
    </div>
    <div class="navbar-start">
        <ul class="navbar-menu">
            <li class="navbar-item">
                <a class="navbar-link" href="/">Dashboard</a>
            </li>
            <li class="navbar-item">
                <a class="navbar-link" href="{{ action('CustomersController@index') }}">Clientes</a>
            </li>
            <li class="navbar-item">
                <a class="navbar-link" href="{{ action('RoomsController@index') }}">Quartos</a>
            </li>
            <li class="navbar-item">
                <a class="navbar-link" href="{{ action('ProductsController@index') }}">Produtos</a>
            </li>
            <li class="navbar-item">
                <a class="navbar-link" href="{{ action('BookingsController@index') }}">Reservas</a>
            </li>
            <li class="navbar-item">
                <a class="navbar-link" href="{{ action('ConsumptionController@index') }}">Consumo</a>
            </li>
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{ action('StockController@index') }}">Estoque</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{ action('FinancesController@index') }}">Contabilidade</a>--}}
            {{--</li>--}}
            <li class="navbar-item">
                <a class="navbar-link" href="{{ action('ReportsController@index') }}">Relatórios</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
<script src="/js/all.js"></script>
</body>
</html>
