<?php


use App\Models\Seance;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeancesTest extends TestCase
{
    use RefreshDatabase;

    /* @test */
    public function test_seance_route()
    {
        $seance = Seance::factory()->create();

        $response = $this->get('/seances');

        $response->assertStatus(200)
            ->assertSeeText(['Test movie title', $seance->time]);
    }

    public function test_seance_list_working()
    {
        $seance = Seance::factory()->create();

        $response = $this->get('/seances');

        $response->assertSeeText(['Test movie title', $seance->time]);
    }
}
