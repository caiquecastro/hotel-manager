<div class="form-group row">
    {!! Form::label('number', 'Número', ['class' => 'col-sm-2 form-control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('number', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('type_id', 'Tipo', ['class' => 'col-sm-2 form-control-label']) !!}
    <div class="col-sm-5">
        {!! Form::select("type_id", $types, null, ['class'=> 'c-select form-control']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('floor', 'Andar', ['class' => 'col-sm-2 form-control-label']) !!}
    <div class="col-sm-5">
        {!! Form::select("floor", ["ground"=>"Térreo", "first" => "1º Andar", "second" => "2º Andar"], null, ['class'=> 'c-select form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2">Características</label>
    <div class="col-sm-10">
        @foreach($features as $feature)
        <div class="checkbox">
            <label class="c-input c-checkbox">
                <input type="checkbox" name="features[]" value="{{ $feature->id }}">
                <span class="c-indicator"></span>
                {{ $feature->name }}
            </label>
        </div>
        @endforeach
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>