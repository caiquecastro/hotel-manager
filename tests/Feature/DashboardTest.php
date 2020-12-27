<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function testUserIsRedirectToLoginIfNotAuthenticated()
    {
        $response = $this->get('/bookings');

        $response->assertRedirect('login');
    }

    public function testLoggedUserIsRedirectedToDashboardIfVisitLoginPage()
    {
        $this->loginUser();
        $response = $this->get('/login');

        $response->assertRedirect('/');
    }
}
