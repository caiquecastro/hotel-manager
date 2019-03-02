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
}
