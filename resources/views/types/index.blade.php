@extends('layout')

@section('content')
    <h1>Tipos de Quarto</h1>
    <a href="{{ route('rooms.index') }}" class="btn btn-secondary mb-3">Voltar</a>
    <a href="{{ route('types.create') }}" class="btn btn-primary mb-3">Novo tipo de quarto</a>
    @include('errors.list')
    @include('partials._messages')
    <table class="table">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($types as $type)
            <tr>
                <td>{{ $type->name }}</td>
                <td>
                    <a
                        href="{{ route('types.edit', ['type' => $type->id]) }}"
                        class="btn btn-secondary btn-sm"
                        aria-label="Editar"
                        data-balloon-pos="up"
                    >
                        <span class="fa fa-pencil"></span>
                    </a>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['TypesController@destroy', $type->id], 'class' => 'display-inline-block']) !!}
                        <button
                            class="btn btn-danger btn-sm"
                            type="submit"
                            aria-label="Excluir"
                            data-balloon-pos="up"
                        >
                            <span class="fa fa-trash"></span>
                        </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $types->render() !!}
@stop
