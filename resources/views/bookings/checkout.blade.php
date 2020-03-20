@extends('layout')

@section('content')
    <h1>Checkout</h1>
    <a href="{{ action('BookingsController@index') }}" class="btn btn-primary m-b">Voltar</a>
    <div class="row">
        <div class="col-md-12">
            <form action="finish-checkout.html">
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Cliente</label>

                    <div class="col-sm-10">
                        <p class="form-control-static">{{ $booking->customer->name }}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Quarto</label>

                    <div class="col-sm-10">
                        <p class="form-control-static">{{ $booking->room->number }}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Entrada</label>

                    <div class="col-sm-5">
                        <p class="form-control-static">{{ $booking->checkin->format("d-m-Y") }}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Saída</label>

                    <div class="col-sm-5">
                        <p class="form-control-static">{{ $booking->checkout->format("d-m-Y") }}</p>
                    </div>
                </div>
                <h2 class="h4">Consumo</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descrição</th>
                        <th class="text-center">Quantidade</th>
                        <th class="text-right">Valor Unitário</th>
                        <th class="text-right">Valor Total</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td colspan="4" class="text-right">Total</td>
                        <td class="text-right">
                            R$ {{ number_format($booking->consumptions->sum('total_price') + $roomPrice * $bookingDays, 2, ',', '.') }}
                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    <tr>
                        <td>{{ $booking->room->number }}</td>
                        <td>{{ $booking->room->type->name }}</td>
                        <td class="text-center">
                            {{ $bookingDays }}
                        </td>
                        <td class="text-right">R$ {{ number_format($roomPrice, 2, ',', '.') }}</td>
                        <td class="text-right">R$ {{ number_format($roomPrice * $bookingDays, 2, ',', '.') }}</td>
                    </tr>
                    @foreach ($booking->consumptions as $consumption)
                        <tr>
                            <td>{{ $consumption->product->barcode }}</td>
                            <td>
                                {{ $consumption->product->name }} ({{ $consumption->created_at->format("d-m-Y H:i") }})
                            </td>
                            <td class="text-center">
                                {{ $consumption->amount }}
                            </td>
                            <td class="text-right">
                                R$ {{ number_format($consumption->price, 2, ',', '.') }}
                            </td>
                            <td class="text-right">
                                R$ {{ number_format($consumption->total_price, 2, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Meio de Pagamento</label>

                    <div class="col-sm-3">
                        <select name="payment-method" id="payment-method" class="form-control c-select">
                            <option value="cash">Dinheiro</option>
                            <option value="creditcard">Cartão de Crédito</option>
                            <option value="debitcard">Cartão de Débito</option>
                            <option value="bill">Fatura mensal</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary pull-right">Finalizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
