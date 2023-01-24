<?php

namespace Database\Factories;

use App\Http\Controllers\Admin\SeanceController;
use App\Models\Hall;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\HallFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seance>
 */
class SeanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $movie = Movie::factory()->create();
        $hall = Hall::factory()->create();
        return [
            'movie_id' => $movie->id,
            'hall_id' => $hall->id,
            'date' => \Carbon\Carbon::now()->format('Y-m-d'),
            'time' => \Carbon\Carbon::now()->format('H:i'),
            'hall_res_time' => (new SeanceController)->hall_res_time($movie->id),
        ];
    }
}
