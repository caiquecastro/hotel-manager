<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function testRequiresAuthenticationToListCustomers()
    {
        $response = $this->get('customers');

        $response->assertRedirect('login');
    }

    public function testViewCustomerList()
    {
        $this->withoutExceptionHandling();

        $this->loginUser();
        $response = $this->get('customers');

        $response->assertSuccessful();
    }

    public function testCreatePersonCustomer()
    {
        $this->withoutExceptionHandling();

        $this->loginUser();
        $response = $this->post('customers', [
            'person_type' => 'App\\NaturalPerson',
            'cpf' => '16828363710',
            'birthday' => '1980-12-27',
            'name' => 'John Doe',
            'phone' => '(11) 2121-2807',
            'address' => 'Infantino Street',
        ]);

        $response->assertSessionHas(['message' => 'Cliente cadastrado com sucesso!']);
    }

    public function testCustomerNameIsRequired()
    {
        $this->loginUser();
        $response = $this->post('customers', [
            'person_type' => 'App\\NaturalPerson',
            'cpf' => '16828363710',
            'birthday' => '1980-12-27',
            'gender' => 'male',
            'name' => '',
            'phone' => '(11) 2121-2807',
            'address' => 'Infantino Street',
        ]);

        $response->assertSessionHasErrors(['name' => 'The name field is required.']);
    }

    public function testCustomerHasAddress()
    {
        $this->loginUser();
        $response = $this->post('customers', [
            'name' => 'John Doe',
            'address' => '9th Avenue',
        ]);

        $this->assertDatabaseHas('customers', [
            'name' => 'John Doe',
            'address' => '9th Avenue',
        ]);
    }

    public function testCustomerHasDocument()
    {
        $this->loginUser();
        $response = $this->post('customers', [
            'document_number' => '123',
            'name' => 'John Doe',
        ]);

        $this->assertDatabaseHas('customers', [
            'document_number' => '123',
            'name' => 'John Doe',
        ]);
    }

    public function testCustomerBirthdayRequiresDateFormat()
    {
        $this->loginUser();
        $response = $this->post('customers', [
            'name' => 'John Doe',
            'birthdate' => 'foo',
        ]);

        $response->assertSessionHasErrors([
            'birthdate' => 'The birthdate does not match the format d/m/Y.',
        ]);
    }

    public function testCreateCompanyCustomer()
    {
        $this->withoutExceptionHandling();

        $this->loginUser();
        $response = $this->post('customers', [
            'person_type' => 'App\\LegalPerson',
            'name' => 'Acme Ltda.',
            'address' => 'Infantino Street',
            'cnpj' => '46777333000122',
            'phone' => '(11) 92121-2807',
        ]);

        $response->assertSessionHas(['message' => 'Cliente cadastrado com sucesso!']);
    }

    public function testCustomerHasEmail()
    {
        $this->loginUser();
        $response = $this->post('customers', [
            'person_type' => 'App\\LegalPerson',
            'name' => 'Acme Ltda.',
            'address' => 'Infantino Street',
            'phone' => '(11) 92121-2807',
            'email' => 'johndoe@example.com',
        ]);

        $response->assertSessionHas('message', 'Cliente cadastrado com sucesso!');
    }
}
