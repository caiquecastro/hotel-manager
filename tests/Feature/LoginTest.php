<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanLogin()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('login');

        $response->assertSuccessful();
    }

    public function testUserIsRedirectToDashboardAfterLogin()
    {
        $email = 'johndoe@example.com';
        $password = 'secret';

        \App\User::factory()->create([
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $response = $this->post('/login', [
            'email' => $email,
            'password' => $password,
        ]);

        $response->assertRedirect('/');
    }
}
