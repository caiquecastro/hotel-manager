@extends('layout')

@section('content')
    <h1>Hóspedes</h1>
    <a href="{{ action('CustomersController@create') }}" class="btn btn-primary mb-3">Adicionar novo</a>
    @include('errors.list')
    @include('partials._messages')
    <table class="table">
        <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Cliente desde</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->created_at->format("d/m/Y") }}</td>
                <td>
                    <a
                        href="{{ action('CustomersController@show', $customer->id) }}"
                        class="btn btn-primary btn-sm"
                        aria-label="Ficha do cliente"
                        data-balloon-pos="up"
                    >
                        <span class="fa fa-file"></span>
                    </a>
                    <a
                        href="{{ action('CustomersController@edit', $customer->id) }}"
                        class="btn btn-secondary btn-sm"
                        aria-label="Editar cliente"
                        data-balloon-pos="up"
                    >
                        <span class="fa fa-pencil"></span>
                    </a>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['CustomersController@destroy', $customer->id], 'class' => 'display-inline-block']) !!}
                        <button
                            class="btn btn-danger btn-sm"
                            type="submit"
                            aria-label="Excluir cliente"
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
    {!! $customers->render() !!}
@stop
