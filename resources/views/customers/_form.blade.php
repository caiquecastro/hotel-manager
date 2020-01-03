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
    <div class="col">
        <div class="form-group">
            {!! Form::label('address', 'Endereço', ['class' => 'form-control-label']) !!}
            {!! Form::text('address', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col cpf-field">
        <div class="form-group">
            {!! Form::label('document_number', 'Documento', ['class' => 'form-control-label']) !!}
            {!! Form::text('cpf', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col row-birthdate">
        <div class="form-group">
            {!! Form::label('birthday', 'Nascimento', ['class' => 'form-control-label']) !!}
            {!! Form::text('birthday', null, ['class' => 'form-control js-date']) !!}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('phone', 'Telefone', ['class' => 'form-control-label']) !!}
            {!! Form::text('phone', null, ['class' => 'form-control js-telefone']) !!}
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
