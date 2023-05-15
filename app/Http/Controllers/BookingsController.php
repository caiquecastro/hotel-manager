<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Http\Requests\BookingRequest;
use App\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $activeFilter = $request->has('active');

        $bookings = Booking::when($activeFilter, function ($query) {
            return $query->whereNotNull('checkin_at')
                ->whereNull('checkout_at');
        })
        ->orderBy('checkout', 'desc')
        ->paginate();

        if ($request->wantsJson()) {
            $bookings->load('customer')->load('room');

            return $bookings;
        }

        $rooms = Room::orderBy('number')->get();

        return view('bookings.index', compact('bookings', 'rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  null  $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::orderBy('number')->pluck('number', 'id');
        $customers = \App\Customer::pluck('name', 'id');

        return view('bookings.create', compact('rooms', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        return \App\Booking::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Booking $booking)
    {
        if ($request->wantsJson()) {
            return $booking;
        }

        return view('bookings.show', [
            'booking' => $booking,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('bookings.edit', [
            'booking' => $booking,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingRequest $request, Booking $booking)
    {
        // if ($request->has('checkin')) {
        //     $booking->forceFill([
        //         'checkin_at' => now(),
        //     ])->save();
        // }

        // if ($request->has('checkout')) {
        //     $booking->forceFill([
        //         'checkout_at' => now(),
        //     ])->save();
        // }

        $booking->update($request->all());

        return $booking->fresh();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCheckout($id)
    {
        $room = Room::findOrFail($id);
        $booking = Booking::where('room_id', '=', $room->id)
            ->where('checkin', '>=', Carbon::today())
            ->orWhere('checkout', '<=', Carbon::today())
            ->firstOrFail();

        $bookingDays = $booking->checkout->diffInDays($booking->checkin) + 1;
        $roomPrice = $booking->room->type->price;

        return view('bookings.checkout', compact('booking', 'bookingDays', 'roomPrice'));
    }
}
