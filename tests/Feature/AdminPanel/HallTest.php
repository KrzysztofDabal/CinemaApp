<?php


namespace AdminPanel;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HallTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_hall_add_as_guest()
    {
        $request = ([
            'name' => 'TestHall',
            'rows' => 20,
            'columns' => 15,
        ]);

        $response = $this->post('/admin/hall/add_hall', $request);

        $response->assertRedirect('/login')->assertStatus(302);
    }
}
