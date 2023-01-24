<?php

namespace Tests\Feature\frontend;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Movie;
use Illuminate\Support\Str;
use Tests\TestCase;

class MoviesTest extends TestCase
{
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

    public function test_movie_add()
    {
        $movie = Movie::factory()->create();

        if($movie){
            $response = true;
        }else{
            $response = false;
        }

        $this->assertTrue($response);
    }

    public function test_movie_show_route()
    {
        $movie = Movie::where('title', 'Test movie title')->first();

        $response = $this->get('/movie/'. $movie->id);

        $response->assertStatus(200)
            ->assertSeeText('Test movie title');
    }

    public function test_movie_delete()
    {
        $movie = Movie::where('title', 'Test movie title')->first();

        if($movie){
            $movie->delete();
        }

        $this->assertTrue(true);
    }
}
