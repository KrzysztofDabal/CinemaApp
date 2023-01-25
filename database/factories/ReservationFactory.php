<?php

namespace Database\Factories;

use App\Models\Seance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $seance = Seance::factory()->create();
        return [
            'seance_id'=>$seance->id,
            'seat_row' => 2,
            'seat_column' => 2,
        ];
    }
}
