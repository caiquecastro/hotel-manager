<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomTest extends TestCase
{
    use RefreshDatabase;

    public function testViewCreateRoomPage()
    {
        $this->withoutExceptionHandling();

        $this->loginUser();
        $response = $this->get('rooms/create');

        $response->assertSuccessful();
    }
}
