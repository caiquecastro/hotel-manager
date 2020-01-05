<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Room;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $fromDate = $request->query('from');

        $fromDate = $fromDate ? Carbon::parse($fromDate)->startOfDay() : Carbon::now()->startOfDay();

        $toDate = $fromDate->copy()->addDays(6);
        $period = new CarbonPeriod($fromDate, '1 day', $toDate);

        $rooms = Room::orderBy('number')->get();
        $bookings = Booking::all();

        return view('calendar', compact('bookings', 'rooms', 'period', 'fromDate', 'toDate'));
    }
}
