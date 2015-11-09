@extends('layout')

@section('content')
    <h1>Tipos de Quarto</h1>
    <a href="{{ action('RoomsController@index') }}" class="btn btn-primary m-b">Voltar</a>
    <a href="{{ action('TypesController@create') }}" class="btn btn-primary m-b">Novo tipo de quarto</a>
    @include('errors.list')
    @include('partials._messages')
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Diária</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($types as $type)
            <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->name }}</td>
                <td>{{ $type->price }}</td>
                <td>
                    <a href="{{ action('TypesController@edit', $type->id) }}" class="btn btn-secondary btn-sm">
                        <span class="fa fa-pencil"></span>
                    </a>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['TypesController@destroy', $type->id], 'class' => 'display-inline-block']) !!}
                    {!! Form::button('<span class="fa fa-trash"></span>', ['type'=>'submit', 'class'=>'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $types->render() !!}
@stop