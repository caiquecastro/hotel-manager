@extends('layout')

@section('content')
    <h1>Restaurante</h1>

    <a href="/orders/create" class="btn btn-primary">Abrir Comanda</a>
    <a href="/order-items/create" class="btn btn-primary">Novo Pedido</a>

    <div class="row row-narrow mb-3">
        @foreach ($openOrders as $order)
            <div class="col-2">
                <a href="{{ route('orders.show', $order) }}" class="btn btn-dark btn-block mt-1 OrderButton">
                    {{ $order->number }}
                </a>
            </div>
        @endforeach
    </div>

    <h2>Consumos</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Quarto</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Total</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderItems as $orderItem)
                <tr>
                    <td>{{ $orderItem->order->customer->name ?? 'Sem reserva' }}</td>
                    <td>{{ $orderItem->order->customer->activeBooking->room->number ?? 'Sem reserva' }}</td>
                    <td>{{ $orderItem->product->name }}</td>
                    <td>R$ {{ $orderItem->price }}</td>
                    <td>{{ $orderItem->amount }}</td>
                    <td>R$ {{ number_format($orderItem->total, 2) }}</td>
                    <td>{{ $orderItem->created_at->format('d/m/Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <consumption-form />
@endsection
