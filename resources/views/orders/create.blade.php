@extends('layout')

@section('content')
    <h1>Abrir Comanda</h1>

    <form action="/orders" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-control-label" for="customer_id">Cliente</label>
            <select name="customer_id" id="customer_id" class="form-control">
                <option value="">Selecione</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="number" class="form-control-label">Nº Comanda</label>
            <input type="text" name="number" id="number" class="form-control" />
        </div>

        <button class="btn btn-primary">Salvar</button>
    </form>
@endsection
