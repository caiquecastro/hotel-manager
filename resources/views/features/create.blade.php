@extends('layout')

@section('content')
    <h1>Nova Característica</h1>
    <a href="{{ action('FeaturesController@index') }}" class="btn btn-primary m-b">Ver todos</a>
    @include('errors.list')
    @include('partials._messages')
    <div class="row">
        <div class="col-md-8">
            {!! Form::open(array('action' => array('FeaturesController@store'))) !!}
            @include('features._form')
            {!! Form::close() !!}
        </div>
    </div>
@stop