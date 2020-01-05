@extends('layout')

@section('content')
    <h1>Ficha do Cliente</h1>
    <a href="{{ action('CustomersController@index') }}" class="btn btn-primary mb-3">Voltar</a>

    <dl class="row">
        <dt class="col-2">Nome</dt>
        <dd class="col-4">{{ $customer->name }}</dt>

        <dt class="col-2">E-mail</dt>
        <dd class="col-4">{{ $customer->email }}</dt>

        <dt class="col-2">Profissão</dt>
        <dd class="col-4">{{ $customer->job_title }}</dt>

        <dt class="col-2">Documento</dt>
        <dd class="col-4">{{ $customer->document_number }}</dt>

        <dt class="col-2">Nascimento</dt>
        <dd class="col-4">{{ $customer->birthdate }}</dt>

        <dt class="col-2">CEP</dt>
        <dd class="col-4">{{ $customer->zipcode }}</dt>

        <dt class="col-2">Endereço</dt>
        <dd class="col-4">{{ $customer->address }}</dt>

        <dt class="col-2">Cidade</dt>
        <dd class="col-4">{{ $customer->city }}</dt>

        <dt class="col-2">Estado</dt>
        <dd class="col-4">{{ $customer->state }}</dt>

        <dt class="col-2">Telefone</dt>
        <dd class="col-4">{{ $customer->phone }}</dt>

        <dt class="col-2">Placa do carro</dt>
        <dd class="col-4">{{ $customer->car_plate }}</dt>
    </dl>

    <h2>Reservas</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Checkin</th>
                <th>Checkout</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customer->bookings as $booking)
                <tr>
                    <td>{{ $booking->checkin->format('d/m/Y') }}</td>
                    <td>{{ $booking->checkout->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
