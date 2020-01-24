@extends('layout')

@section('content')
    <h1>Reserva</h1>

    @include('partials._messages')

    <dl class="row">
        <dt class="col-2">Quarto</dt>
        <dd class="col-4">{{ $booking->room->number }}</dt>

        <dt class="col-2">Hóspede</dt>
        <dd class="col-4">{{ $booking->customer->name }}</dt>

        <dt class="col-2">Checkin</dt>
        <dd class="col-4">{{ $booking->checkin->format('d/m/Y H:i:s') }}</dt>

        <dt class="col-2">Checkin em</dt>
        <dd class="col-4">{{ $booking->checkin_at }}</dt>

        <dt class="col-2">Checkout</dt>
        <dd class="col-4">{{ $booking->checkout->format('d/m/Y H:i:s') }}</dt>

        <dt class="col-2">Checkout em</dt>
        <dd class="col-4">{{ $booking->checkout_at }}</dt>
    </dl>

    <form action="{{ route('bookings.update', $booking) }}" method="POST">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        @if (!$booking->checkin_at)
            <button class="btn btn-primary mb-3" name="checkin">Realizar checkin</button>
        @endif
        @if ($booking->checkin_at && !$booking->checkout_at)
            <button class="btn btn-primary mb-3" name="checkout">Realizar checkout</button>
        @endif
    </form>

    <h2>Consumos</h2>

    <table class="table">
        <thead>
        <tr>
            <th>Código</th>
            <th>Descrição</th>
            <th class="text-center">Quantidade</th>
            <th class="text-right">Valor Unitário</th>
            <th class="text-right">Valor Total</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="4" class="text-right">Total</td>
            <td class="text-right">
                R$ {{ number_format($booking->consumptions->sum('total_price'), 2, ',', '.') }}
            </td>
        </tr>
        </tfoot>
        <tbody>
        @foreach ($booking->consumptions as $consumption)
            <tr>
                <td>{{ $consumption->product->barcode }}</td>
                <td>
                    {{ $consumption->product->name }} ({{ $consumption->created_at->format("d-m-Y H:i") }})
                </td>
                <td class="text-center">
                    {{ $consumption->amount }}
                </td>
                <td class="text-right">
                    R$ {{ number_format($consumption->price, 2, ',', '.') }}
                </td>
                <td class="text-right">
                    R$ {{ number_format($consumption->total_price, 2, ',', '.') }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
