@extends('layout')

@section('content')
    <h1>Novo Produto</h1>
    <a href="{{ route('productsController.index') }}" class="btn btn-secondary mb-3">Voltar</a>
    @include('errors.list')
    @include('partials._messages')
    <div class="row">
        <div class="col-md-8">
            {!! Form::open(array('action' => array('ProductsController@store'), 'class' => 'js-parse-price')) !!}
            @include('products._form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
