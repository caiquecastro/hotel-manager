<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/">Chique na Roça</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Clientes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ action('CustomersController@index') }}">Ver Clientes</a>
          <a class="dropdown-item" href="{{ action('CustomersController@create') }}">Novo Cliente</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Quartos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ action('RoomsController@index') }}">Ver Quartos</a>
          <a class="dropdown-item" href="{{ action('RoomsController@create') }}">Novo Quarto</a>
          <a class="dropdown-item" href="{{ action('TypesController@index') }}">Tipos de Quarto</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produtos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ action('ProductsController@index') }}">Ver Produtos</a>
          <a class="dropdown-item" href="{{ action('ProductsController@create') }}">Novo Produto</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Reservas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ action('BookingsController@index') }}">Ver Reservas</a>
          <a class="dropdown-item" href="{{ action('BookingsController@create') }}">Nova Reserva</a>
          <a class="dropdown-item" href="{{ action('ConsumptionController@index') }}">Consumos</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Estoque
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ action('StockController@index') }}">Ver Estoque</a>
          <a class="dropdown-item" href="{{ action('StockController@create') }}">Movimentar Estoque</a>
        </div>
      </li>
      <li class="nav-item">
        <a href="/reports" class="nav-link">Relatórios</a>
      </li>
    </ul>
  </div>
</nav>
