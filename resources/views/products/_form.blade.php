<div class="form-group row">
    {!! Form::label('name', 'Nome', ['class' => 'col-sm-2 form-control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('barcode', 'Código', ['class' => 'col-sm-2 form-control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('barcode', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('price', 'Preço', ['class' => 'col-sm-2 form-control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('price', null, ['class' => 'form-control js-price']) !!}
        <small class="text-muted">
            Preço de Venda
        </small>
    </div>
</div>
<div class="form-group row">
    {!! Form::label('saleable', 'Liberar venda', ['class' => 'col-sm-2']) !!}
    <div class="col-sm-5">
        <div class="checkbox">
            <label class="c-input c-checkbox">
                {!! Form::checkbox('saleable', true, true) !!}
                <span class="c-indicator"></span>
                Sim
            </label>
        </div>
    </div>
</div>
<div class="form-group row">
    {!! Form::label('uom', 'Unidade de Medida', ['class' => 'col-sm-2 form-control-label']) !!}
    <div class="col-sm-5">
        {!! Form::select("uom", ["unit"=>"Unidade", "weight" => "Peso"], null, ['class'=> 'c-select form-control']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('minimum_stock', 'Estoque Mínimo', ['class' => 'col-sm-2 form-control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('minimum_stock', null, ['class' => 'form-control']) !!}
        <small class="text-muted">
            Gerar alerta após se estoque for inferior
        </small>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>