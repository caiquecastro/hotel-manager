@extends('layout')

@section('content')
    <h1>Restaurante</h1>

    <div class="row">
        @foreach($activeRooms as $booking)
            <div class="col-sm-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">#{{ $booking->room->number }}</h4>
                        <button type="button" class="btn btn-primary btn-block open-consumption"
                                data-id="{{ $booking->id }}">
                            Inserir
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Reserva</th>
                <th>Quarto</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Total</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consumptions as $consumption)
                <tr>
                    <td>{{ $consumption->booking->id }}</td>
                    <td>{{ $consumption->booking->room->number }}</td>
                    <td>{{ $consumption->product->name }}</td>
                    <td>{{ $consumption->price }}</td>
                    <td>{{ $consumption->amount }}</td>
                    <td>{{ $consumption->price * $consumption->amount }}</td>
                    <td>{{ $consumption->created_at->format('d/m/Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <consumption-form />
@endsection
