<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
namespace Tests\Feature\frontend;

use App\Http\Controllers\Admin\SeanceController;
use App\Models\Hall;
use App\Models\Movie;
use App\Models\Seance;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class SeancesTest extends TestCase
{
//    use RefreshDatabase;

    /* @test */
    public function test_seance_route_list_working()
    {
        $seance = Seance::factory()->create();

        $response = $this->get('/seances');

        $response->assertStatus(200)
            ->assertSeeText(['Test movie title', $seance->time]);

        $hall = Hall::find($seance->hall_id)->delete();
        $movie = Movie::find($seance->movie_id)->delete();
        $seance->delete();
    }
}
