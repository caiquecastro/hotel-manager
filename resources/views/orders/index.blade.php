@extends('layout')

@section('content')
    <h1>Restaurante</h1>

    <button type="button" class="btn btn-primary open-consumption">
        Novo Pedido
    </button>

    <table class="table">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Detalhes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($openOrders as $order)
                <tr>
                    <td>{{ $order->customer->name }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order) }}">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Consumos</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Reserva</th>
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
                    <td>{{ $orderItem->order->customer->activeBooking->id ?? 'Sem reserva' }}</td>
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
