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

    public function testCreatePersonCustomer()
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

    public function testCustomerNameIsRequired()
    {
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

    public function testCustomerAddressIsRequired()
    {
        $response = $this->post('customers', [
            'person_type' => 'App\\NaturalPerson',
            'cpf' => '16828363710',
            'birthday' => '1980-12-27',
            'gender' => 'male',
            'name' => 'John Doe',
            'phone' => '(11) 2121-2807',
            'address' => '',
        ]);

        $response->assertSessionHasErrors(['address' => 'The address field is required.']);
    }

    public function testCustomerDocumentIsRequired()
    {
        $response = $this->post('customers', [
            'person_type' => 'App\\NaturalPerson',
            'cpf' => '',
            'birthday' => '1980-12-27',
            'gender' => 'male',
            'name' => 'John Doe',
            'phone' => '(11) 2121-2807',
            'address' => 'Infantino Street',
        ]);

        $response->assertSessionHasErrors([
            'cpf' => 'The cpf field is required when person type is App\NaturalPerson.',
        ]);
    }

    public function testCustomerBirthdayIsRequired()
    {
        $response = $this->post('customers', [
            'person_type' => 'App\\NaturalPerson',
            'cpf' => '16828363710',
            'birthday' => '',
            'gender' => 'male',
            'name' => 'John Doe',
            'phone' => '(11) 2121-2807',
            'address' => 'Infantino Street',
        ]);

        $response->assertSessionHasErrors([
            'birthday' => 'The birthday field is required when person type is App\NaturalPerson.',
        ]);
    }

    public function testCreateCompanyCustomer()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('customers', [
            'person_type' => 'App\\LegalPerson',
            'name' => 'Acme Ltda.',
            'address' => 'Infantino Street',
            'cnpj' => '46777333000122',
            'phone' => '(11) 92121-2807',
        ]);

        $response->assertSessionHas(['message' => 'Cliente cadastrado com sucesso!']);
    }

    public function testCompanyCustomerRequiresCnpj()
    {
        $response = $this->post('customers', [
            'person_type' => 'App\\LegalPerson',
            'name' => 'Acme Ltda.',
            'address' => 'Infantino Street',
            'cnpj' => '',
            'phone' => '(11) 92121-2807',
        ]);

        $response->assertSessionHasErrors([
            'cnpj' => 'The cnpj field is required when person type is App\LegalPerson.',
        ]);
    }
}
