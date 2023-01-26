<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
namespace Tests\Feature\frontend;

use Tests\TestCase;

class RegulaminTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_regulamin_route()
    {

        $response = $this->get('/regulamin');

        $response->assertStatus(200);
    }
}
