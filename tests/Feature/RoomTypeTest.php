<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomTypeTest extends TestCase
{
    use RefreshDatabase;

    public function testItDeletesARoomType()
    {
        $this->withoutExceptionHandling();

        $roomType = factory(\App\Type::class)->create();

        $this->loginUser();
        $response = $this->delete("types/$roomType->id");
        $response->assertStatus(302);

        $this->assertEquals(0, \App\Type::count());
    }

    public function testItDeletesAUnexistentRoomType()
    {
        $this->loginUser();
        $response = $this->delete('types/100');

        $response->assertStatus(404);
    }
}
