<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Hotel Manager</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<nav class="navbar navbar-light bg-faded">
    <a class="navbar-brand" href="/">Hotel Manager</a>
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ action('CustomersController@index') }}">Clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ action('RoomsController@index') }}">Quartos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ action('ProductsController@index') }}">Produtos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ action('BookingsController@index') }}">Reservas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ action('ConsumptionController@index') }}">Consumo</a>
        </li>
        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="{{ action('StockController@index') }}">Estoque</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="{{ action('FinancesController@index') }}">Contabilidade</a>--}}
        {{--</li>--}}
        <li class="nav-item">
            <a class="nav-link" href="{{ action('ReportsController@index') }}">Relatórios</a>
        </li>
    </ul>
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @yield('content')
        </div>
    </div>
</div>
<script src="/js/all.js"></script>
</body>
</html>