@extends('layout')

@section('content')
    <h1>Novo Quarto</h1>
    <a href="{{ route('rooms.index') }}" class="btn btn-secondary mb-3">Voltar</a>
    @include('errors.list')
    @include('partials._messages')
    <div class="row">
        <div class="col-md-8">
            {!! Form::open(array('action' => array('RoomsController@store'))) !!}
            @include('rooms._form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
