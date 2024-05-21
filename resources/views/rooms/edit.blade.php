@extends('layout')

@section('content')
    <h1>Editar Quarto</h1>
    <a href="{{ route('rooms.index') }}" class="btn btn-primary mb-3">Voltar</a>
    @include('errors.list')
    @include('partials._messages')
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('rooms.update', ['room' => $room->id]) }}" method="POST">
                @method('PUT')
                @include('rooms._form')
            </form>
        </div>
    </div>
@stop
