<?php

namespace Tests;

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
        $this->loginUser();
        $response = $this->get('/login');

        $response->assertRedirect('/');
    }
}
