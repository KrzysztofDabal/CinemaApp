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
    public function test_the_admin_route_can_be_accessed()
    {
        $response = $this->get('/admin');

        $response->assertStatus(302);
    }
}
