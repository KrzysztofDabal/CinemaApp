<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
namespace Tests\Feature;

use Tests\TestCase;

class RegulaminTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_regulamin_route_can_be_accessed()
    {

        $response = $this->get('/regulamin');

        $response->assertStatus(200);
    }
}
