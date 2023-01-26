<?php

namespace Profile;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProfileDataAccessTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_profile_data_access_as_guest()
    {
        $response = $this->get('/profile/data');

        $response->assertStatus(302)
            ->assertLocation('/login');
    }

    public function test_profile_data_access_as_user()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/profile/data');

        $response->assertStatus(200)
            ->assertSeeText($user->name, $user->surname);
    }

    public function test_profile_data_access_as_admin()
    {
        $user = User::factory(['role' => 2])->create();

        $this->actingAs($user);

        $response = $this->get('/profile/data');

        $response->assertStatus(200)
            ->assertSeeText($user->name, $user->surname);
    }
}
