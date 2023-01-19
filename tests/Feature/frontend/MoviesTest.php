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
    public function test_the_admin_route_can_be_accessed()
    {
        $seance = Movie::create([
            'title' => 'Test movie title',
            'slug' => Str::slug('Test movie title'),
            'director' => 'Test director',
            'scriptwriter' => 'Test scriptwriter',
            'length' => '150',
            'description' => 'Lorem ipsum czy cos',
            'image' => 'test/spiderman.jpg',
            'rating' => '80',
            'category' => json_encode(['Dramat']),
        ]);

        $response = $this->get('/movie/'. $seance->id);

        $response->assertStatus(200)
            ->assertSeeText('Test movie title');
    }
}
