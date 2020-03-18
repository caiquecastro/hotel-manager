@extends('layout')

@section('content')
    <h1>Reservar Quarto</h1>
    <a href="{{ action('RoomsController@index') }}" class="btn btn-primary mb-3">Ver todos os quartos</a>
    @include('errors.list')
    @include('partials._messages')
    <booking-form />
@stop
