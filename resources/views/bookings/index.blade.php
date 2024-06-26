@extends('layout')

@section('content')
    <h1>Reservas</h1>
    @include('errors.list')
    @include('partials._messages')
    <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-2">Nova reserva</a>
    <a href="{{ route('calendar') }}" class="btn btn-primary mb-2">Calendário</a>
    <div class="row">
        @foreach($rooms as $room)
            <div class="col-sm-4">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">#{{ $room->number }}</h5>

                        @if ($room->status == "available")
                            <p class="card-text text-success">Disponível</p>
                            <a
                                href="{{ url('/bookings/create?roomId='.$room->id) }}"
                                class="btn btn-primary btn-block"
                            >
                                Reservar
                            </a>
                        @elseif($room->status == "occupied")
                            <p class="card-text text-danger">Ocupado</p>
                            <a
                                href="{{ url('/bookings/'.$room->id.'/checkout') }}"
                                class="btn btn-secondary btn-block"
                            >
                                Checkout
                            </a>
                        @else
                            <p class="card-text text-warning">Manutenção</p>
                            <a
                                href="{{ url('/bookings/'.$room->id.'/maintenance') }}"
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
                <td>{{ $booking->customer->name ?? 'Sem cliente' }}</td>
                <td>{{ $booking->room->number }}</td>
                <td>{{ $booking->checkin->format("d/m/Y H:i:s") }}</td>
                <td>{{ $booking->checkout->format("d/m/Y H:i:s") }}</td>
                <td>
                    <a
                        href="{{ url('/bookings/'.$booking->id) }}"
                        class="btn btn-info btn-sm"
                        aria-label="Ver detalhes"
                        data-balloon-pos="up"
                    >
                        <span class="fa fa-eye"></span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $bookings->render() !!}
@stop
