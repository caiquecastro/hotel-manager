@extends('layout')

@section('content')
    <h1>Novo Cliente</h1>
    <a href="{{ action('CustomersController@index') }}" class="btn btn-primary m-b">Ver todos</a>
    <div class="row">
        <div class="col-md-8">
            {!! Form::open(array('action' => array('CustomersController@store'))) !!}
            <div class="form-group row">
                {!! Form::label('person_type', 'Tipo', ['class' => 'col-sm-2']) !!}
                <div class="col-sm-10">
                    <div class="radio">
                        <label class="c-input c-radio">
                            {!! Form::radio('person_type', 'App\NaturalPerson', true) !!}
                            <span class="c-indicator"></span>
                            Pessoa Física
                        </label>
                    </div>
                    <div class="radio">
                        <label class="c-input c-radio">
                            {!! Form::radio('person_type', 'App\LegalPerson') !!}
                            <span class="c-indicator"></span>
                            Pessoa Jurídica
                        </label>
                    </div>
                </div>
            </div>
                @include('customers._form')
            {!! Form::close() !!}
        </div>
    </div>
@stop