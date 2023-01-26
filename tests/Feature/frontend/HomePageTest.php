<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
namespace Tests\Feature\frontend;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_home_page_route()
    {

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
