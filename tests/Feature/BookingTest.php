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
        $room = factory(\App\Room::class)->create();
        factory(\App\Booking::class)->create([
            'room_id' => $room->id,
            'checkin' => '2019-03-04T14:00:00',
            'checkout' => '2019-04-05T12:00:00',
            'price' => '100',
        ]);

        $this->loginUser();
        $response = $this->postJson('bookings', [
            'customer_id' => factory(\App\Customer::class)->create()->id,
            'room_id' => $room->id,
            'checkin' => '2019-04-03T14:00',
            'checkout' => '2019-04-26T12:00',
            'price' => '100',
        ]);

        $response->assertStatus(422);

        $bookingsCount = \App\Booking::count();

        $this->assertEquals(1, $bookingsCount);
    }

    public function testAllowNonConflictingBookings()
    {
        $this->withoutExceptionHandling();

        $room = factory(\App\Room::class)->create();
        factory(\App\Booking::class)->create([
            'room_id' => $room->id,
            'checkin' => '2019-03-25',
            'checkout' => '2019-03-27',
            'price' => '100',
        ]);

        $this->loginUser();
        $this->post('bookings', [
            'customer_id' => factory(\App\Customer::class)->create()->id,
            'room_id' => $room->id,
            'checkin' => '2019-03-28',
            'checkout' => '2019-03-30',
            'price' => '100',
        ]);

        $bookingsCount = \App\Booking::count();

        $this->assertEquals(2, $bookingsCount);
    }
}
