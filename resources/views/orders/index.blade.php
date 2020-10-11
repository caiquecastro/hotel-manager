@extends('layout')

@section('content')
    <h1>Restaurante</h1>

    <a href="/orders/create" class="btn btn-primary">Abrir Comanda</a>
    <a href="/order-items/create" class="btn btn-primary">Novo Pedido</a>

    <div class="row row-narrow mb-3">
        @foreach ($openOrders as $order)
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
@endsection
