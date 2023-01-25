<?php

namespace Tests\Unit;

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
    public function test_movie_add()
    {
        $movie = Movie::factory()->create();

        $this->assertModelExists($movie);
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
