@extends('layout')

@section('content')
    <h1>Pedido</h1>

    <dl class="row">
        <dt class="col-2">Cliente</dt>
        <dd class="col-10">{{ $order->customer->name ?? '-' }}</dd>

        <dt class="col-2">Número</dt>
        <dd class="col-10">{{ $order->number }}</dd>
    </dl>

    <table class="table">
        <thead>
            <tr>
                <th>Data</th>
                <th>Produto</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>Total</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="4">Subtotal</td>
                <td>R$ {{ number_format($order->total, 2) }}</td>
            </tr>
            <tr>
                <td colspan="4">10%</td>
                <td>R$ {{ number_format($order->total * .1, 2) }}</td>
            </tr>
            <tr>
                <td colspan="4">Total</td>
                <td>R$ {{ number_format($order->total * 1.1, 2) }}</td>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>R$ {{ $item->price }}</td>
                    <td>{{ $item->amount }}</td>
                    <td>R$ {{ number_format($item->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($order->status !== 'paid')
        <form action="/orders/{{ $order->id }}" method="POST">
            @csrf
            {{ method_field('PATCH') }}
            <button class="btn btn-primary" name="status" value="paid">Fechar pedido</button>
        </form>
    @endif
@endsection
