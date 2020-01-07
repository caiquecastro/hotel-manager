@extends('layout')

@section('content')
    <h1>Quartos</h1>
    <a href="{{ action('RoomsController@create') }}" class="btn btn-primary mb-3">Adicionar novo</a>
    <a href="{{ action('FeaturesController@index') }}" class="btn btn-primary mb-3">Características</a>
    <a href="{{ action('TypesController@index') }}" class="btn btn-primary mb-3">Tipos de Quarto</a>
    @include('errors.list')
    @include('partials._messages')
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Andar</th>
            <th>Características</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rooms as $room)
            <tr>
                <td>{{ $room->number }}</td>
                <td>
                    @if($room->floor == "ground")
                        Térreo
                    @elseif($room->floor == "first")
                        1º Andar
                    @else
                        2º Andar
                    @endif
                </td>
                <td>
                    {{ $room->features->implode('name', ', ') }}
                </td>
                <td>
                    @if($room->status == "available")
                        <span class="text-success">
                            <span class="fa fa-circle"></span>
                            Disponível
                        </span>
                    @elseif($room->status == "occupied")
                        <span class="text-danger">
                            <span class="fa fa-circle"></span>
                            Ocupado
                        </span>
                    @else
                        <span class="text-warning">
                            <span class="fa fa-circle"></span>
                            Manutenção
                        </span>
                    @endif
                </td>
                <td>
                    <a
                        href="{{ action('RoomsController@show', $room->id) }}"
                        class="btn btn-sm btn-info"
                        aria-label="Ver"
                        data-balloon-pos="up"
                    >
                        <span class="fa fa-eye"></span>
                    </a>
                    {!! Form::open(['method'=>'PUT', 'action'=>['RoomsController@putMaintenance', $room->id], 'class' => 'display-inline-block']) !!}
                        <button
                            class="btn btn-warning btn-sm"
                            type="submit"
                            aria-label="Manutenção"
                            data-balloon-pos="up"
                        >
                            <span class="fa fa-wrench"></span>
                        </button>
                    {!! Form::close() !!}
                    <a
                        href="{{ action('BookingsController@create', ['roomId' => $room->id]) }}"
                        class="btn btn-primary btn-sm"
                        aria-label="Reservar"
                        data-balloon-pos="up"
                    >
                        <span class="fa fa-calendar"></span>
                    </a>
                    <a
                        href="{{ action('RoomsController@edit', $room->id) }}"
                        class="btn btn-secondary btn-sm"
                        aria-label="Editar"
                        data-balloon-pos="up"
                    >
                        <span class="fa fa-pencil"></span>
                    </a>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['RoomsController@destroy', $room->id], 'class' => 'display-inline-block']) !!}
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
    {!! $rooms->render() !!}
@stop
