<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
namespace Tests\Feature;

use Tests\TestCase;

class AboutTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_about_us_route()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }
}
