@extends('layout')

@section('content')
    <h1>Movimentar Estoque</h1>

    <form action="/stock">
        {!! Form::token() !!}
        <div class="form-group row">
            <label for="barcode-search" class="col-sm-2 form-control-label">Código</label>

            <div class="col-sm-4">
                <input type="text" class="form-control" id="barcode-search">
            </div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 form-control-label">Nome</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="name" readonly>
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <input type="hidden" id="product_id" name="product_id">
            <label for="inventory-type" class="col-sm-2 form-control-label">Tipo de Movimentação</label>
            <div class="col-sm-3">
                <select name="inventory-type" id="inventory-type" class="form-control c-select">
                    <option value="inward">Entrada</option>
                    <option value="outward">Saída</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="amount" class="col-sm-2 form-control-label">Quantidade</label>

            <div class="col-sm-3">
                <input type="text" class="form-control" id="amount">
            </div>
        </div>
        <div class="form-group row">
            <label for="cost-price" class="col-sm-2 form-control-label">Preço de Custo</label>

            <div class="col-sm-3">
                <input type="text" class="form-control" id="cost-price">
            </div>
        </div>
        <div class="form-group row">
            <label for="profit" class="col-sm-2 form-control-label">Percentual de venda</label>

            <div class="col-sm-3">
                <input type="text" class="form-control" id="profit">
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 form-control-label">Preço de Venda</label>

            <div class="col-sm-3">
                <input type="text" class="form-control" id="price">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </form>
@stop