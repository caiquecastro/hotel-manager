<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
            'checkin' => '2019-03-04',
            'checkout' => '2019-04-05',
        ]);

        $this->loginUser();
        $this->post('bookings', [
            'customer_id' => factory(\App\Customer::class)->create()->id,
            'room_id' => $room->id,
            'checkin' => '2019-03-04',
            'checkout' => '2019-04-26',
        ]);

        $bookingsCount = \App\Booking::count();

        $this->assertEquals(1, $bookingsCount);
    }
}
