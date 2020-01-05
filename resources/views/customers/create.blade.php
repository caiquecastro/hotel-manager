@extends('layout')

@section('content')
    <h1>Novo Cliente</h1>
    <a href="{{ action('CustomersController@index') }}" class="btn btn-secondary mb-3">Voltar</a>
    @include('errors.list')
    @include('partials._messages')
    {!! Form::open(array('action' => array('CustomersController@store'))) !!}
        @include('customers._form')
    {!! Form::close() !!}
@stop
