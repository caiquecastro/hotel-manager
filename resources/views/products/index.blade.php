@extends('layout')

@section('content')
    <h1>Produtos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Adicionar novo</a>
    @include('errors.list')
    @include('partials._messages')

    @livewire('product-list')
@endsection
