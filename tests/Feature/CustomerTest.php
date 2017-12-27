<?php

namespace Tests\Feature;

use Tests\TestCase;

class CustomerTest extends TestCase
{
    public function testExample()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('customers');

        $response->assertSuccessful();
    }
}
