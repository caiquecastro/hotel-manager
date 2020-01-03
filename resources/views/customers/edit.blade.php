@extends('layout')

@section('content')
    <h1>Editar Cliente</h1>
    <a href="{{ action('CustomersController@index') }}" class="btn btn-primary m-b">Ver todos</a>
    @include('errors.list')
    @include('partials._messages')
    {!! Form::model($customer, ['method'=>'PUT', 'action' => ['CustomersController@update', $customer->id]]) !!}
        {!! Form::hidden('person_type') !!}
        @include('customers._form')
    {!! Form::close() !!}
@stop
