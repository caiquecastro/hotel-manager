@extends('layout')

@section('content')
    <h1>Usuários</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Adicionar novo</a>
    @include('errors.list')
    @include('partials._messages')
    <table class="table">
        <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a
                        href="{{ route('users.edit', ['user' => $user->id]) }}"
                        class="btn btn-secondary btn-sm"
                        aria-label="Editar usuário"
                        data-balloon-pos="up"
                    >
                        <span class="fa fa-pencil"></span>
                    </a>
                    {{ html()->form('DELETE', '/users/' . $user->id)->class('display-inline-block')->open() }}
                        <button
                            class="btn btn-danger btn-sm"
                            type="submit"
                            aria-label="Excluir usuário"
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
@stop
