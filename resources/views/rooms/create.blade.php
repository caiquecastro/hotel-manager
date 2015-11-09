@extends('layout')

@section('content')
    <h1>Novo Quarto</h1>
    <a href="{{ action('RoomsController@index') }}" class="btn btn-primary m-b">Ver todos</a></a>
    <div class="row">
        <div class="col-md-8">
            {!! Form::open(array('action' => array('RoomsController@store'))) !!}
            @include('rooms._form')
            {!! Form::close() !!}
        </div>
    </div>
@stop