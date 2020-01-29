@extends('layout')

@section('content')
    <h1>Novo Usuário</h1>
    <a href="{{ action('UsersController@index') }}" class="btn btn-secondary mb-3">Voltar</a>
    @include('errors.list')
    @include('partials._messages')
    {!! Form::open(array('action' => array('UsersController@store'))) !!}
        @include('users._form')
    {!! Form::close() !!}
@stop
