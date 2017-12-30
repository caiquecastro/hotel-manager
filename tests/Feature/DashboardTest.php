<?php

namespace Tests;

class DashboardTest extends TestCase
{
    public function testUserIsRedirectToLoginIfNotAuthenticated()
    {
        $response = $this->get('/');

        $response->assertRedirect('login');
    }
}
