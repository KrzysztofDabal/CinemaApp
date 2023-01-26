<?php

namespace AdminPanel;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class MovieAdPanAccessTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_movie_admin_panel_access_as_guest()
    {
        $response = $this->get('/admin/movie');

        $response->assertStatus(302)
            ->assertLocation('/login');
    }

    public function test_movie_admin_panel_access_as_user()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/admin/movie');

        $response->assertStatus(302)
            ->assertLocation('/');
    }

    public function test_movie_admin_panel_access_as_admin()
    {
        $user = User::factory(['role' => 2])->create();

        $this->actingAs($user);

        $response = $this->get('/admin/movie');

        $response->assertStatus(200);
    }
}
