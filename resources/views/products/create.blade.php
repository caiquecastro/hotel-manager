@extends('layout')

@section('content')
    <h1>Novo Produto</h1>
    <a href="{{ action('ProductsController@index') }}" class="btn btn-primary m-b">Ver todos</a>
    <div class="row">
        <div class="col-md-8">
            <form>
                <div class="form-group row">
                    <label for="nome" class="col-sm-2 form-control-label">Nome</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nome">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="barcode" class="col-sm-2 form-control-label">Código</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="barcode">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-2 form-control-label">Preço</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="price">
                        <small class="text-muted">
                            Preço de Venda
                        </small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-2">Liberar venda</label>

                    <div class="col-sm-5">
                        <div class="checkbox">
                            <label class="c-input c-checkbox">
                                <input type="checkbox" id="saleable" value="saleable">
                                <span class="c-indicator"></span>
                                Sim
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="unit" class="col-sm-2 form-control-label">Unidade de Medida</label>

                    <div class="col-sm-5">
                        <select name="unit" id="unit" class="form-control c-select">
                            <option value="unit">Unidade</option>
                            <option value="weight">Peso</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-2 form-control-label">Estoque Mínimo</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="minimum-amount">
                        <small class="text-muted">
                            Gerar alerta após se estoque for inferior
                        </small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop