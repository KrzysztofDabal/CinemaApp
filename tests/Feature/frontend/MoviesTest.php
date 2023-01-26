<?php


namespace Tests\Feature\frontend;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MoviesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_movie_route()
    {
        $response = $this->get('/movie/');

        $response->assertStatus(200);
    }

    public function test_movie_list()
    {
        $movie = Movie::factory()->create();
        $response = $this->get('/movie/');

        $response->assertSeeText($movie->title);
    }

    public function test_movie_show_route()
    {
        $movie = Movie::factory()->create();

        $response = $this->get('/movie/' . $movie->id);

        $response->assertStatus(200);
    }

    public function test_bad_movie_show_redirect()
    {
        Movie::factory()->create();
        $movie = Movie::all()->last();

        $response = $this->get('/movie/' . $movie->id + 1);

        $response->assertStatus(302)
            ->assertLocation('/');
    }
}
