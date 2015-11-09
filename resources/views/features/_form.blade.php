<div class="form-group row">
    {!! Form::label('name', 'Nome', ['class' => 'col-sm-2 form-control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</div>