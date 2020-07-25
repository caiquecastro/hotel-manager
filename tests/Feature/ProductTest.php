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

    public function testSortProductsByCustomField()
    {
        $this->loginUser();

        $productOne = factory(\App\Product::class)->create([
            'name' => 'AAA',
        ]);
        $productTwo = factory(\App\Product::class)->create([
            'name' => 'BBB',
        ]);
        $productThree = factory(\App\Product::class)->create([
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

        // dd($response->json()).

        // $response->assertSessionHasErrors(['price' => 'The price field is required.']);
    }
}
