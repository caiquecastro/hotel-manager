@extends('layout')

@section('content')
    <h1>Consumo</h1>

    <div class="row">
        @foreach($occupied_rooms as $room)
            <div class="col-sm-2">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">#{{ $room->number }}</h4>
                        <button type="button" class="btn btn-primary btn-block" id="open-consumption"
                                data-id="{{ $room->id }}">
                            Inserir
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="modal fade" id="modal-consumption" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Inserir consumo</h4>
                </div>
                <div class="modal-body">
                    <form action="">
                        {!! Form::token() !!}
                        <div class="form-group">
                            <label for="barcode-search">Código do Produto</label>
                            <input type="text" class="form-control" id="barcode-search">
                        </div>
                        <input type="hidden" name="product_id" id="product_id">

                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <input type="text" class="form-control" id="name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="amount">Valor Unitário</label>
                            <input type="text" class="form-control" id="price" readonly>
                        </div>
                        <div class="form-group">
                            <label for="amount">Quantidade</label>
                            <input type="text" class="form-control" id="amount">
                        </div>
                        <div class="form-group">
                            <label for="amount">Total</label>
                            <input type="text" class="form-control" id="total" readonly>
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