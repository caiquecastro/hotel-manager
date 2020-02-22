@extends('layout')

@section('content')
    <h1>Novo Pedido</h1>

    <form action="/orders" method="POST">
        @csrf

        <div class="form-group">
            {!! Form::label('customer_id', 'Cliente', ['class' => 'form-control-label']) !!}
            <select name="customer_id" id="customer_id" class="form-control">
                <option value="">Selecione</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('number', 'Nº Comanda', ['class' => 'form-control-label']) !!}
            {!! Form::text('number', null, ['class' => 'form-control']) !!}
        </div>
    </form>
@endsection
