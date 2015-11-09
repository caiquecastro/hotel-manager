@extends('layout')

@section('content')
    <h1>Editar Produto</h1>
    <a href="{{ action('ProductsController@index') }}" class="btn btn-primary m-b">Ver todos</a>
    @include('errors.list')
    @include('partials._messages')
    <div class="row">
        <div class="col-md-8">
            {!! Form::model($product, ['method'=>'PUT', 'action' => ['ProductsController@update', $product->id]]) !!}
            {!! Form::hidden('person_type') !!}
            @include('products._form')
            {!! Form::close() !!}
        </div>
    </div>
@stop