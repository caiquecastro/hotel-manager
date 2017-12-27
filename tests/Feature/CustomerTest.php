<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function testViewCustomerList()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('customers');

        $response->assertSuccessful();
    }

    public function testCreateCustomerWithoutCnpj()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('customers', [
            'person_type' => 'App\\NaturalPerson',
            'cpf' => '16828363710',
            'birthday' => '1980-12-27',
            'gender' => 'male',
            'name' => 'John Doe',
            'phone' => '(11) 2121-2807',
            'address' => 'Infantino Street',
        ]);

        $response->assertSessionHas(['message' => 'Cliente cadastrado com sucesso!']);
    }
}
