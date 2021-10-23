@extends('layout')

@section('content')
    <h1>Restaurante</h1>

    <a href="/orders/create" class="btn btn-primary">Abrir Comanda</a>
    <a href="/order-items/create" class="btn btn-primary">Novo Pedido</a>

    @if ($displayMode === 'grid')
        <a href="/orders?closed" class="btn btn-primary">Mesas Fechadas</a>
        <div class="row row-narrow mb-3">
            @foreach ($orders as $order)
                <div class="col-2">
                    <a
                        href="{{ route('orders.show', $order) }}"
                        class="btn btn-dark btn-block mt-1 OrderButton"
                    >
                        {{ $order->number }}
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <a href="/orders" class="btn btn-primary">Mesas Abertas</a>
        <div class="row">
            <div class="col-12">
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>Mesa</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->number }}</td>
                                <td>
                                    <a href="/orders/{{ $order->id }}">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
