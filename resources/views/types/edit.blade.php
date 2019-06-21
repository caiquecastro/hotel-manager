@extends('layout')

@section('content')
    <h1 class="title">Editar Tipo de Quarto</h1>
    <a href="{{ action('TypesController@index') }}" class="button is-primary">Ver todos</a>
    @include('errors.list')
    @include('partials._messages')
    <div class="row">
        <div class="col-md-8">
            <room-type-form method="PATCH" action="/types/{{ $type->id }}" :initial-data="{{ $type }}" />
        </div>
    </div>
@stop
