@extends('layout')

@section('content')
    <h1>Calendário</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Chalés</th>
                @foreach ($period as $day)
                    <th>{{ $day->format('d/m') }} {{ $day->format('l') }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->number }}</td>
                    @foreach ($period as $day)
                        <td>
                            <div class="booking-box">
                                {{ $room->bookingsFor($day)->customer->name ?? '-' }}
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
