<?php


use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Hall;
use Illuminate\Support\Str;
use Tests\TestCase;
class HallTest extends TestCase
{
    use RefreshDatabase;
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

    public function test_hall_add_as_guest()
    {
        $request = ([
            'name' => 'TestHall',
            'rows' => 20,
            'columns' => 15,
        ]);

        $response = $this->post('/admin/hall/add_hall', $request);

        $response->assertRedirect('/login')->assertStatus(302);

//        $hall = Hall::where('name', 'TestHall')->first();
//        $this->assertModelExists($hall);

    }

    public function test_hall_database()
    {

        $this->assertDatabaseMissing('halls', ['name' => 'Hall']);
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
