<div class="form-group row">
    {!! Form::label('name', 'Nome', ['class' => 'col-sm-2 form-control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('address', 'Endereço', ['class' => 'col-sm-2 form-control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row row-cpf">
    {!! Form::label('cpf', 'CPF', ['class' => 'col-sm-2 form-control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('cpf', null, ['class' => 'form-control js-cpf']) !!}
    </div>
</div>
<div class="form-group row row-cnpj" hidden>
    {!! Form::label('cnpj', 'CNPJ', ['class' => 'col-sm-2 form-control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('cnpj', null, ['class' => 'form-control js-cnpj', 'disabled'=>'true']) !!}
    </div>
</div>
<div class="form-group row row-birthdate">
    {!! Form::label('birthday', 'Nascimento', ['class' => 'col-sm-2 form-control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('birthday', null, ['class' => 'form-control js-date']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('phone', 'Telefone', ['class' => 'col-sm-2 form-control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('phone', null, ['class' => 'form-control js-telefone']) !!}
    </div>
</div>
<div class="form-group row row-gender">
    <label class="col-sm-2">Sexo</label>
    <div class="col-sm-10">
        <div class="radio">
            <label class="c-input c-radio">
                {!! Form::radio('gender', 'male', true) !!}
                <span class="c-indicator"></span>
                Masculino
            </label>
        </div>
        <div class="radio">
            <label class="c-input c-radio">
                {!! Form::radio('gender', 'female') !!}
                <span class="c-indicator"></span>
                Feminino
            </label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>