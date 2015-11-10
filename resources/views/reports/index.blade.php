@extends('layout')

@section('content')
    <h1>Relatório</h1>

    <h2 class="m-t-md">Quartos</h2>
    {{--<form action="">--}}
        {{--<div class="form-group row">--}}
            {{--<label for="start" class="form-control-label col-md-2 text-right">--}}
                {{--Inicio--}}
            {{--</label>--}}
            {{--<div class="col-md-3">--}}
                {{--<input type="text" id="start" class="form-control js-date">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group row">--}}
            {{--<label for="end" class="form-control-label col-md-2 text-right">--}}
                {{--Término--}}
            {{--</label>--}}
            {{--<div class="col-md-3">--}}
                {{--<input type="text" id="end" class="form-control js-date">--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</form>--}}
    <div class="row">
        <div class="col-sm-5">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th class="text-center">Movimentações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->number }}</td>
                    <td class="text-center">{{ count($room->bookings) }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-7">
            {{--<canvas id="chart-room" class="chart"></canvas>--}}
        </div>
        <div class="clearfix visible-xs-block"></div>
        {{--<div class="col-sm-5">--}}
            {{--<h2 class="m-t-md">Produtos</h2>--}}
            {{--<table class="table">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th>#</th>--}}
                    {{--<th class="text-center">Movimentações</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--<tr>--}}
                    {{--<td>101</td>--}}
                    {{--<td class="text-center">10</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>102</td>--}}
                    {{--<td class="text-center">7</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>103</td>--}}
                    {{--<td class="text-center">7</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>104</td>--}}
                    {{--<td class="text-center">5</td>--}}
                {{--</tr>--}}
                {{--</tbody>--}}
            {{--</table>--}}
        {{--</div>--}}
    </div>
@stop