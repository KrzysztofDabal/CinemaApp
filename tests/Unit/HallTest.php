<?php

namespace Tests\Unit;

use App\Models\Hall;
use Illuminate\Support\Str;
use Tests\TestCase;
class HallTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_hall_route()
    {
        $response = $this->get('/hall');

        $response->assertStatus(404);
    }

    public function test_hall_add()
    {
//        $hall = Hall::factory()->create();

        $hall = Hall::create([
            'name' => 'Test hall',
            'slug' => Str::slug('name'),
            'rows' => 10,
            'columns' => 10,
        ]);

        if($hall){
            $response = true;
        }else{
            $response = false;
        }

        $this->assertTrue($response);
    }

    public function test_hall_delete()
    {
        $hall = Hall::where('name', 'Test hall')->first();

        if($hall){
            $hall->delete();
        }

        $this->assertTrue(true);
    }
}
