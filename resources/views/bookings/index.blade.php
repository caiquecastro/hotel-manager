@extends('layout')

@section('content')
    <h1>Reservas</h1>
    @include('errors.list')
    @include('partials._messages')
    <a href="{{ action('BookingsController@create', null) }}" class="btn btn-primary mb-2">Nova reserva</a>
    <a href="{{ action('CalendarController@index', null) }}" class="btn btn-primary mb-2">Calendário</a>
    <div class="row">
        @foreach($rooms as $room)
            <div class="col-sm-4">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">#{{ $room->number }}</h5>

                        @if ($room->status == "available")
                            <p class="card-text text-success">Disponível</p>
                            <a
                                href="{{ action('BookingsController@create', ['roomId' => $room->id]) }}"
                                class="btn btn-primary btn-block"
                            >
                                Reservar
                            </a>
                        @elseif($room->status == "occupied")
                            <p class="card-text text-danger">Ocupado</p>
                            <a
                                href="{{ action('BookingsController@getCheckout', $room->id) }}"
                                class="btn btn-secondary btn-block"
                            >
                                Checkout
                            </a>
                        @else
                            <p class="card-text text-warning">Manutenção</p>
                            <a
                                href="{{ action('BookingsController@getCheckout', $room->id) }}"
                                class="btn btn-secondary btn-block"
                            >
                                Tirar manutenção
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
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
                <td>{{ $booking->checkin->format("d/m/Y H:i:s") }}</td>
                <td>{{ $booking->checkout->format("d/m/Y H:i:s") }}</td>
                <td>
                    <a
                        href="{{ action('BookingsController@edit', $booking->id) }}"
                        class="btn btn-secondary btn-sm"
                        aria-label="Editar"
                        data-balloon-pos="up"
                    >
                        <span class="fa fa-pencil"></span>
                    </a>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['BookingsController@destroy', $booking->id], 'class' => 'display-inline-block']) !!}
                        <button
                            class="btn btn-danger btn-sm"
                            type="submit"
                            aria-label="Excluir"
                            data-balloon-pos="up"
                        >
                            <span class="fa fa-trash"></span>
                        </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $bookings->render() !!}
@stop
