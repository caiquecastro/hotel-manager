@extends('layout')

@section('content')
    <h1>Novo Tipo de Quarto</h1>
    <a href="{{ action('TypesController@index') }}" class="btn btn-primary m-b">Ver todos</a></a>
    <div class="row">
        <div class="col-md-8">
            {!! Form::open(array('action' => array('TypesController@store'))) !!}
            @include('types._form')
            {!! Form::close() !!}
        </div>
    </div>
@stop