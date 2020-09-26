<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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

    public function testListProducts()
    {
        $this->loginUser();

        $product = \App\Product::factory()->create([
            'name' => 'AAA',
        ]);

        $response = $this->getJson('products');

        $response->assertJson([
            'data' => [
                $product->toArray(),
            ],
        ]);
    }

    public function testSortProductsByCustomField()
    {
        $this->loginUser();

        $productOne = \App\Product::factory()->create([
            'name' => 'AAA',
        ]);
        $productTwo = \App\Product::factory()->create([
            'name' => 'BBB',
        ]);
        $productThree = \App\Product::factory()->create([
            'name' => 'CCC',
        ]);

        $response = $this->getJson('products?sort=-name');

        $response->assertJson([
            'data' => [
                $productThree->toArray(),
                $productTwo->toArray(),
                $productOne->toArray(),
            ],
        ]);
    }
}
