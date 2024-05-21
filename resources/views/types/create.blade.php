@extends('layout')

@section('content')
    <h1>Novo Tipo de Quarto</h1>
    <a href="{{ route('types.index') }}" class="btn btn-primary mb-3">Ver todos</a>
    @include('errors.list')
    @include('partials._messages')
    <room-type-form method="POST" action="/types" />
@endsection
