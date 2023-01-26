<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;

namespace Tests\Feature\frontend;

use Tests\TestCase;

class GoogleLoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_google_login_redirect()
    {
        $response = $this->get('/google/login');

        $response->assertStatus(302);
    }
}
