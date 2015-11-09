@extends('layout')

@section('content')
    <h1>Reservas</h1>
    @include('errors.list')
    @include('partials._messages')
    <div class="row">
        @foreach($rooms as $room)
            <div class="col-sm-2">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">#{{ $room->number }}</h4>

                        @if ($room->status == "available")
                            <p class="card-text text-success">Disponível</p>
                            <a href="{{ action('BookingsController@create', $room->id) }}"
                               class="btn btn-primary btn-block">Reservar</a>
                        @elseif($room->status == "occupied")
                            <p class="card-text text-danger">Ocupado</p>
                            <a href="{{ action('BookingsController@getCheckout', $room->id) }}"
                               class="btn btn-secondary btn-block">Checkout</a>
                        @else
                            <p class="card-text text-warning">Manutenção</p>
                            <a href="{{ action('BookingsController@getCheckout', $room->id) }}"
                               class="btn btn-secondary btn-block invisible">Checkout</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ action('BookingsController@create', null) }}" class="btn btn-primary m-b">Nova reserva</a>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Quarto</th>
            <th>Início</th>
            <th>Término</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->customer->name }}</td>
                <td>{{ $booking->room->number }}</td>
                <td>{{ $booking->checkin->format("d/m/Y") }}</td>
                <td>{{ $booking->checkout->format("d/m/Y") }}</td>
                <td>
                    <a href="{{ action('BookingsController@edit', $booking->id) }}" class="btn btn-secondary btn-sm">
                        <span class="fa fa-pencil"></span>
                    </a>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['BookingsController@destroy', $booking->id], 'class' => 'display-inline-block']) !!}
                    {!! Form::button('<span class="fa fa-trash"></span>', ['type'=>'submit', 'class'=>'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $bookings->render() !!}
@stop