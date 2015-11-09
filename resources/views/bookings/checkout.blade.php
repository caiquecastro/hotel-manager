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
                        <p class="form-control-static">101</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Entrada</label>

                    <div class="col-sm-5">
                        <p class="form-control-static">13/06/2015</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Saída</label>

                    <div class="col-sm-5">
                        <p class="form-control-static">23/06/2015</p>
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
                        <td colspan="4" class="text-right">Subtotal</td>
                        <td class="text-right">R$ 1828,00</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Total</td>
                        <td class="text-right">R$ 1828,00</td>
                    </tr>
                    </tfoot>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Diária Suite Master</td>
                        <td class="text-center">11</td>
                        <td class="text-right">R$ 149,00</td>
                        <td class="text-right">R$ 1639,00</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Almoço (15/06/2015)</td>
                        <td class="text-center">1</td>
                        <td class="text-right">R$ 89,00</td>
                        <td class="text-right">R$ 89,00</td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>Refrigerante Coca-Cola</td>
                        <td class="text-center">20</td>
                        <td class="text-right">R$ 5,00</td>
                        <td class="text-right">R$ 100,00</td>
                    </tr>
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