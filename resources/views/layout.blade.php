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
            <a class="nav-link" href="product-index.html">Produtos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="manage-room.html">Recepção</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="consumo.html">Consumo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="inventory.html">Estoque</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="finances.html">Contabilidade</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="report.html">Relatórios</a>
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