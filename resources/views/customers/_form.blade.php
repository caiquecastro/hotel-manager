<div class="form-row">
    <div class="col-7">
        <div class="form-group">
            {!! Form::label('name', 'Nome', ['class' => 'form-control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            {!! Form::label('email', 'E-mail', ['class' => 'form-control-label']) !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            {!! Form::label('job_title', 'Profissão', ['class' => 'form-control-label']) !!}
            {!! Form::text('job_title', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('document_number', 'Documento', ['class' => 'form-control-label']) !!}
            {!! Form::text('document_number', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            {!! Form::label('birthdate', 'Nascimento', ['class' => 'form-control-label']) !!}
            {!! Form::text('birthdate', null, ['class' => 'form-control js-date']) !!}
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            {!! Form::label('zipcode', 'CEP', ['class' => 'form-control-label']) !!}
            {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-9">
        <div class="form-group">
            {!! Form::label('address', 'Endereço', ['class' => 'form-control-label']) !!}
            {!! Form::text('address', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('city', 'Cidade', ['class' => 'form-control-label']) !!}
            {!! Form::text('city', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            {!! Form::label('state', 'Estado', ['class' => 'form-control-label']) !!}
            {!! Form::text('state', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            {!! Form::label('phone', 'Telefone', ['class' => 'form-control-label']) !!}
            {!! Form::text('phone', null, ['class' => 'form-control js-telefone']) !!}
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            {!! Form::label('car_plate', 'Placa do Carro', ['class' => 'form-control-label']) !!}
            {!! Form::text('car_plate', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
