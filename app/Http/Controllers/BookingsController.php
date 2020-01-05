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
    public function index()
    {
        $bookings = Booking::paginate();
        $rooms = Room::orderBy('number')->get();

        return view('bookings.index', compact('bookings', 'rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param null $id
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
     * @param  \App\Http\Requests\BookingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        $data = $request->all();

        $room = Room::findOrFail($data['room_id']);

        $checkin = Carbon::createFromFormat('d/m/Y', $data['checkin']);
        $checkout = Carbon::createFromFormat('d/m/Y', $data['checkin']);

        $available_room = Booking::where('room_id', $room->id)
            ->where(function ($query) use ($checkin, $checkout) {
                $query->where('checkin', '>=', $checkin)
                ->orWhere('checkout', '>=', $checkout);
            })
            ->count();

        if ($available_room > 0) {
            \Session::flash('message_type', 'danger');
            \Session::flash('message', 'Não foi possível reservar o quarto na data desejada!');

            return redirect()->back();
        }

        \App\Booking::create($data);

        \Session::flash('message_type', 'success');
        \Session::flash('message', 'Reserva cadastrada com sucesso!');

        return redirect('bookings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(
            Booking::findOrFail($id)
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
