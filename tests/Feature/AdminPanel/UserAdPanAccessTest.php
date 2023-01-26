<?php

namespace AdminPanel;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserAdPanAccessTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_admin_panel_access_as_guest()
    {
        $response = $this->get('/admin/user');

        $response->assertStatus(302)
            ->assertLocation('/login');
    }

    public function test_user_admin_panel_access_as_admin()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/admin/user');

        $response->assertStatus(200);
    }
}
