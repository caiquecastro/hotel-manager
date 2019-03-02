<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function testRequiresAuthenticationToListProducts()
    {
        $response = $this->get('products');

        $response->assertRedirect('login');
    }

    public function testForbidCreateProductWithoutName()
    {
        $this->loginUser();

        $response = $this->post('products', [
            'name' => null,
        ]);

        $response->assertSessionHasErrors(['name' => 'The name field is required.']);
    }

    public function testForbidCreateProductWithoutPrice()
    {
        $this->loginUser();

        $response = $this->post('products', [
            'price' => null,
        ]);

        $response->assertSessionHasErrors(['price' => 'The price field is required.']);
    }
}
