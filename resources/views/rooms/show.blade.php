@extends('layout')

@section('content')
    <h1>Ver Quarto</h1>
    <a href="{{ action('RoomsController@index') }}" class="btn btn-secondary mb-3">Voltar</a>

    <h2>Reservas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Hóspede</th>
                <th>Checkin</th>
                <th>Checkout</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($room->bookings as $booking)
                <tr>
                    <td>{{ $booking->customer->name }}</td>
                    <td>{{ $booking->checkin->format('d/m/Y') }}</td>
                    <td>{{ $booking->checkout->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
