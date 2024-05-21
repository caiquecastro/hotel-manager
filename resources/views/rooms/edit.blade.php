@extends('layout')

@section('content')
    <h1>Editar Quarto</h1>
    <a href="{{ route('rooms.index') }}" class="btn btn-primary mb-3">Voltar</a>
    @include('errors.list')
    @include('partials._messages')
    <div class="row">
        <div class="col-md-8">
            {!! Form::model($room, ['method'=>'PUT', 'action' => ['RoomsController@update', $room->id]]) !!}
            @include('rooms._form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
