@extends('layout')

@section('content')
    <h1>Novo Tipo de Quarto</h1>
    <a href="{{ action('TypesController@index') }}" class="btn btn-primary m-b">Ver todos</a>
    @include('errors.list')
    @include('partials._messages')
    <div class="row">
        <div class="col-md-8">
            {!! Form::open(array('action' => array('TypesController@store'), 'class' => 'js-parse-price')) !!}
            @include('types._form')
            {!! Form::close() !!}
        </div>
    </div>
@stop