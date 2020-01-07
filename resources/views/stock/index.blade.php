@extends('layout')

@section('content')
    <h1>Estoque</h1>

    <a href="/inventory/create" class="btn btn-primary mb-3">Nova Movimentação</a>

    <table class="table">
        <thead>
        <tr>
            <th>Produto</th>
            <th>Quantidade</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stocks as $stock)
            <tr>
                <td>{{ $stock->product->name }}</td>
                <td>{{ $stock->amount }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
