<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function testViewCreateOrdersPage()
    {
        $this->withoutExceptionHandling();

        $this->loginUser();
        $response = $this->get('orders/create');

        $response->assertSuccessful();
    }
}
