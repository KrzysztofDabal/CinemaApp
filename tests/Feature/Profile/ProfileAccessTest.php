<?php

namespace Profile;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProfileAccessTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_profile_access_as_guest()
    {
        $response = $this->get('/profile');

        $response->assertStatus(302)
            ->assertLocation('/login');
    }
    public function test_profile_tickets_access_as_guest()
    {
        $response = $this->get('/profile/tickets');

        $response->assertStatus(302)
            ->assertLocation('/login');
    }

    public function test_profile_access_as_user()
    {
        $user = User::create([
            'name' => 'Pan',
            'surname' => 'User',
            'email' => 'testuser@gmail.com',
            'password' => Hash::make('asdasdasd'),
        ]);

        $this->actingAs($user);

        $response = $this->get('/profile/');

        $response->assertStatus(200);
    }

    public function test_profile_show_ticket_as_user()
    {
        $user = User::create([
            'name' => 'Pan',
            'surname' => 'User',
            'email' => 'testuser@gmail.com',
            'password' => Hash::make('asdasdasd'),
        ]);

        $reservation = Reservation::factory([
            'user_id' => $user->id,
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
        ])->create();

        $this->actingAs($user);

        $response = $this->get('/profile/tickets/'. $reservation->id);

        $response->assertStatus(200);
    }
}
