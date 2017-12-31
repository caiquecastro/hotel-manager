<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function testUserIsRedirectToLoginIfNotAuthenticated()
    {
        $response = $this->get('/');

        $response->assertRedirect('login');
    }

    public function testLoggedUserIsRedirectedToDashboardIfVisitLoginPage()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/login');

        $response->assertRedirect('/');
    }
}
