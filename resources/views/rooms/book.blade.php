@extends('layout')

@section('content')
<h1>Reservar Quarto</h1>
<a href="{{ action('RoomsController@index') }}" class="btn btn-primary m-b">Ver todos</a>
<div class="row">
    <div class="col-md-8">
        <form>
            <div class="form-group row">
                {!! Form::label('customer', 'Cliente', ['class' => 'col-sm-2 form-control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::select('customer', $customers, null, ['class' => 'form-control c-select']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="checkin" class="col-sm-2 form-control-label">Entrada</label>
                <div class="col-sm-5">
                    {!! Form::text('checkin', \Carbon\Carbon::now()->format("d/m/Y"), ['class' => 'form-control js-date']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="checkout" class="col-sm-2 form-control-label">Saída</label>
                <div class="col-sm-5">
                    {!! Form::text('checkout', \Carbon\Carbon::now()->format("d/m/Y"), ['class' => 'form-control js-date']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="room" class="col-sm-2 form-control-label">Quarto</label>
                <div class="col-sm-5">
                    {!! Form::select('room', $rooms, $room->id, ['class' => 'form-control c-select']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label">Diária</label>
                <div class="col-sm-5">
                    {{--<p class="form-control-static">{{ $room->type->price }}</p>--}}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label">Total</label>
                <div class="col-sm-5">
                    {{--<p class="form-control-static">{{ $room->type->price }}</p>--}}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Reservar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop