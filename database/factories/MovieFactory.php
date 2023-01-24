<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => 'Test movie title',
            'slug' => Str::slug('Test movie title'),
            'director' => 'Test director',
            'scriptwriter' => 'Test scriptwriter',
            'length' => '150',
            'description' => 'Lorem ipsum czy cos',
            'image' => 'test/spiderman.jpg',
            'rating' => '80',
            'category' => json_encode(['Dramat']),
        ];
    }
}
