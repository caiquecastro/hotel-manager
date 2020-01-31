@extends('layout')

@section('content')
    <h1>Restaurante</h1>

    <button type="button" class="btn btn-primary open-consumption">
        Novo Pedido
    </button>

    <div class="row row-narrow mb-3">
        @foreach ($openOrders as $order)
            <div class="col-2">
                <a href="{{ route('orders.show', $order) }}" class="btn btn-dark btn-block mt-1 OrderButton">
                    {{ $order->customer->activeBooking->room->number ?? $order->customer->name }}
                </a>
            </div>
        @endforeach
    </div>

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
