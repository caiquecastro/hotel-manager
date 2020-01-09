<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    public function testViewCreateBookingPage()
    {
        $this->withoutExceptionHandling();

        $this->loginUser();
        $response = $this->get('bookings/create');

        $response->assertSuccessful();
    }

    public function testForbidConflictingBookings()
    {
        $this->withoutExceptionHandling();

        $room = factory(\App\Room::class)->create();
        factory(\App\Booking::class)->create([
            'room_id' => $room->id,
            'checkin' => '04/03/2019',
            'checkout' => '05/04/2019',
            'price' => '100',
        ]);

        $this->loginUser();
        $this->post('bookings', [
            'customer_id' => factory(\App\Customer::class)->create()->id,
            'room_id' => $room->id,
            'checkin' => '03/04/2019',
            'checkout' => '26/04/2019',
            'price' => '100',
        ]);

        $bookingsCount = \App\Booking::count();

        $this->assertEquals(1, $bookingsCount);
    }

    public function testAllowNonConflictingBookings()
    {
        $this->withoutExceptionHandling();

        $room = factory(\App\Room::class)->create();
        factory(\App\Booking::class)->create([
            'room_id' => $room->id,
            'checkin' => '10/03/2019',
            'checkout' => '12/03/2019',
            'price' => '100',
        ]);

        $this->loginUser();
        $this->post('bookings', [
            'customer_id' => factory(\App\Customer::class)->create()->id,
            'room_id' => $room->id,
            'checkin' => '08/03/2019',
            'checkout' => '09/03/2019',
            'price' => '100',
        ]);

        $bookingsCount = \App\Booking::count();

        $this->assertEquals(2, $bookingsCount);
    }
}
