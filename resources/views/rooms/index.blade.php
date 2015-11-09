@extends('layout')

@section('content')
    <h1>Quartos</h1>
    <a href="{{ action('RoomsController@create') }}" class="btn btn-primary m-b">Adicionar novo</a>
    <a href="{{ action('FeaturesController@index') }}" class="btn btn-primary m-b">Características</a>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Andar</th>
            {{--<th>Tipo</th>--}}
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
                {{--<td>{{ $room->type->name }}</td>--}}
                <td>
                    @foreach($room->features as $feature)
                        {{ $feature->name }}
                    @endforeach
                </td>
                <td>
                    @if($room->status == "available")
                        <span class="text-success">
                            <span class="fa fa-circle"></span>
                            Disponível
                        </span>
                    @elseif($room->status == "occupied")
                        <span class="text-warning">
                            <span class="fa fa-circle"></span>
                            Manutenção
                        </span>
                    @else
                        <span class="text-danger">
                            <span class="fa fa-circle"></span>
                            Ocupado
                        </span>
                    @endif
                </td>
                <td>
                    <a href="{{ action('RoomsController@getBook', $room->id) }}" class="btn btn-primary btn-sm">
                        <span class="fa fa-calendar"></span>
                    </a>
                    <a href="{{ action('RoomsController@edit', $room->id) }}" class="btn btn-secondary btn-sm">
                        <span class="fa fa-pencil"></span>
                    </a>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['RoomsController@destroy', $room->id], 'class' => 'display-inline-block']) !!}
                    {!! Form::button('<span class="fa fa-trash"></span>', ['type'=>'submit', 'class'=>'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $rooms->render() !!}
@stop