@extends('layout')

@section('content')
    <h1>Editar Tipo de Quarto</h1>
    <a href="{{ action('TypesController@index') }}" class="btn btn-primary m-b">Ver todos</a>
    @include('errors.list')
    @include('partials._messages')
    <div class="row">
        <div class="col-md-8">
            {!! Form::model($type, ['method'=>'PUT', 'action' =>['TypesController@update', $type->id]]) !!}
            @include('types._form')
            {!! Form::close() !!}
        </div>
    </div>
@stop