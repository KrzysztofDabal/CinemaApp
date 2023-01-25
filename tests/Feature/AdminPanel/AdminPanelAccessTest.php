<?php

namespace AdminPanel;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminPanelAccessTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_admin_panel_access_as_guest()
    {
        $response = $this->get('/admin');

        $response->assertStatus(302)
            ->assertLocation('/login');
    }

    public function test_admin_panel_access_as_admin()
    {
        $user = User::create([
            'name' => 'Pan',
            'surname' => 'Admin',
            'email' => 'testadmin@gmail.com',
            'phone_number' => 123456789,
            'role' => 3,
            'password' => Hash::make('asdasdasd'),
        ]);

        $this->actingAs($user);

        $response = $this->get('/admin');

        $response->assertStatus(200);
    }
}
