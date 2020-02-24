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
@endsection
