@extends('layout')

@section('content')
    <h1>Características</h1>
    <a href="{{ action('RoomsController@index') }}" class="btn btn-primary m-b">Voltar</a>
    <a href="{{ action('FeaturesController@create') }}" class="btn btn-primary m-b">Nova característica</a>
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
                    <a href="{{ action('FeaturesController@edit', $feature->id) }}" class="btn btn-secondary btn-sm">
                        <span class="fa fa-pencil"></span>
                    </a>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['FeaturesController@destroy', $feature->id], 'class' => 'display-inline-block']) !!}
                    {!! Form::button('<span class="fa fa-trash"></span>', ['type'=>'submit', 'class'=>'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $features->render() !!}
@stop