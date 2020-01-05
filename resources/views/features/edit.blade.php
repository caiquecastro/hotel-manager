@extends('layout')

@section('content')
    <h1>Editar Característica</h1>
    <a href="{{ action('FeaturesController@index') }}" class="btn btn-secondary mb-3">Voltar</a>
    @include('errors.list')
    @include('partials._messages')
    <div class="row">
        <div class="col-md-8">
            {!! Form::model($feature, ['method'=>'PUT', 'action' =>['FeaturesController@update', $feature->id]]) !!}
            @include('features._form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
