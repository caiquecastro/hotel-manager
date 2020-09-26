<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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

    public function testViewEditRoomPage()
    {
        $this->withoutExceptionHandling();
        $room = \App\Room::factory()->create();

        $this->loginUser();
        $response = $this->get("rooms/$room->id/edit");

        $response->assertSuccessful();
    }

    public function testCreateRoomWithoutFeatures()
    {
        $this->withoutExceptionHandling();

        $roomType = \App\Type::factory()->create();

        $this->loginUser();
        $response = $this->post('rooms', [
            'type_id' => $roomType->id,
            'number' => '1',
            'floor' => '0',
        ]);

        $response->assertRedirect('/rooms');
        $this->assertDatabaseHas('rooms', [
            'number' => '1',
        ]);
    }

    public function testItRequiresTypeIdToCreateRoom()
    {
        $this->loginUser();
        $response = $this->post('rooms', [
            'number' => '1',
            'floor' => '0',
        ]);

        $response->assertSessionHasErrors(['type_id' => 'The type id field is required.']);
    }

    public function testItAllowToUpdateRoomWithoutFeatures()
    {
        $this->withoutExceptionHandling();

        $room = \App\Room::factory()->create();

        $this->loginUser();
        $response = $this->patch("rooms/$room->id", [
            //
        ]);

        $response->assertRedirect('/rooms');
    }
}
