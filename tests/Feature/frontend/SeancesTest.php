<?php

namespace Tests\Feature\frontend;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeancesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_seances_route_can_be_accessed()
    {
        $response = $this->get('/seances');

        $response->assertStatus(200);
    }
}
