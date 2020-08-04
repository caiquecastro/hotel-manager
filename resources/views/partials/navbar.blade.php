<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{ auth()->user() ? '/' : '/register' }}">Chique na Roça</a>

  @auth
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item{{ request()->is('customers*') ? ' active' : '' }}">
        <a class="nav-link" href="/customers">Hóspedes</a>
      </li>
      <li class="nav-item{{ request()->is('rooms*') ? ' active' : '' }}">
        <a class="nav-link" href="/rooms">
          Quartos
        </a>
      </li>
      <li class="nav-item{{ request()->is('products*') ? ' active' : '' }}">
        <a class="nav-link" href="/products">
          Produtos
        </a>
      </li>
      <li class="nav-item{{ request()->is('bookings*') ? ' active' : '' }}">
        <a class="nav-link" href="/bookings">Reservas</a>
      </li>
      <li class="nav-item{{ request()->is('orders*') ? ' active' : '' }}">
        <a class="nav-link" href="/orders">Restaurante</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/inventory">Estoque</a>
      </li>
      <li class="nav-item">
        <a href="/reports" class="nav-link">Relatórios</a>
      </li>
      <li class="nav-item{{ request()->is('users*') ? ' active' : '' }}">
        <a class="nav-link" href="/users">Usuários</a>
      </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
            @auth
                <a href="#" class="nav-link">{{ auth()->user()->name }}</a>
            @else
                <a href="/login" class="nav-link">Login</a>
            @endauth
        </li>
    </ul>
    @endauth
  </div>
</nav>
