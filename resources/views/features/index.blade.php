@extends('layout')

@section('content')
    <h1>Características</h1>
    <a href="{{ route('rooms.index') }}" class="btn btn-primary m-b">Voltar</a>
    <a href="{{ route('features.create') }}" class="btn btn-primary m-b">Nova característica</a>
    @include('errors.list')
    @include('partials._messages')
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($features as $feature)
            <tr>
                <td>{{ $feature->id }}</td>
                <td>{{ $feature->name }}</td>
                <td>
                    <a
                        href="{{ route('features.edit', ['feature' => $feature->id]) }}"
                        class="btn btn-secondary btn-sm"
                        aria-label="Editar"
                        data-balloon-pos="up"
                    >
                        <span class="fa fa-pencil"></span>
                    </a>
                    {{ html()->form('DELETE', '/features/' . $feature->id)->class('display-inline-block')->open() }}
                        <button
                            class="btn btn-danger btn-sm"
                            type="submit"
                            aria-label="Excluir"
                            data-balloon-pos="up"
                        >
                            <span class="fa fa-trash"></span>
                        </button>
                    {{ html()->form()->close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $features->render() !!}
@stop
