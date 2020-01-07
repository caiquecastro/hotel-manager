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
                <th>Quarto</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consumptions as $consumption)
                <tr>
                    <td>{{ $consumption->booking->room->number }}</td>
                    <td>{{ $consumption->product->name }}</td>
                    <td>{{ $consumption->price }}</td>
                    <td>{{ $consumption->created_at->format('d/m/Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="modal-consumption" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Inserir consumo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        {{ csrf_field() }}
                        <input type="hidden" id="booking_id" value="">
                        <input type="hidden" name="product_id" id="product_id">

                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="barcode-search">Código do Produto</label>
                                    <input type="text" class="form-control form-control-lg" id="barcode-search">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <input type="text" class="form-control form-control-lg" id="name" readonly>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="amount">Valor Unitário</label>
                                    <input type="text" class="form-control form-control-lg" id="price" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="amount">Quantidade</label>
                                    <input type="text" class="form-control form-control-lg" id="amount">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="amount">Total</label>
                                    <input type="text" class="form-control form-control-lg" id="total" readonly>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="save-consumption">Salvar</button>
                </div>
            </div>
        </div>
    </div>
@stop
