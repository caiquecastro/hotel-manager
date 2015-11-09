@extends('layout')

@section('content')
    <h1>Clientes</h1>
    <a href="{{ action('CustomersController@create') }}" class="btn btn-primary m-b">Adicionar novo</a>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Documento</th>
            <th>Telefone</th>
            <th>Cliente desde</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->person->cpf or $customer->person->cnpj }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->created_at->format("d/m/Y") }}</td>
                <td>
                    <a href="{{ action('CustomersController@show', $customer->id) }}" class="btn btn-secondary btn-sm">
                        <span class="fa fa-file"></span>
                    </a>
                    <a href="{{ action('CustomersController@edit', $customer->id) }}" class="btn btn-secondary btn-sm">
                        <span class="fa fa-pencil"></span>
                    </a>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['CustomersController@destroy', $customer->id], 'class' => 'display-inline-block']) !!}
                        {!! Form::button('<span class="fa fa-trash"></span>', ['type'=>'submit', 'class'=>'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $customers->render() !!}
@stop