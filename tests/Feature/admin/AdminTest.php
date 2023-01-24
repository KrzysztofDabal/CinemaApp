<?php

namespace Tests\Feature\admin;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_access_admin_panel()
    {
        $response = $this->get('/admin');

        $response->assertStatus(302)
            ->assertLocation('/login');
    }
}
