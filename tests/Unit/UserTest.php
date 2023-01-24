<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form_route()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_user_email_duplication()
    {
        $TestUser1 = User::make([
            'name' => 'Test',
            'surname' => 'User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('asdasdasd'),
        ]);
        $TestUser2 = User::make([
            'name' => 'Test',
            'surname' => 'User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('asdasdasd'),
        ]);

        $this->assertTrue($TestUser1->email != $TestUser2->email);
    }

    public function test_user_delete()
    {
        $user = User::factory()->count(1)->make();

        $user = User::first();

        if($user){
            $user->delete();
        }

        $this->assertTrue(true);
    }


}
