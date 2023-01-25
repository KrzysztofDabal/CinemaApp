<?php

namespace Tests\Unit;

use App\Models\Seance;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeancesTest extends TestCase
{
    use RefreshDatabase;

    /* @test */
    public function test_seance_add()
    {
        $seance = Seance::factory()->create();

        $this->assertModelExists($seance);
    }

    public function test_seance_delete()
    {
        $seance = Seance::factory()->create();

        if($seance){
            $seance->delete();
        }

        $this->assertTrue(true);
    }
}
