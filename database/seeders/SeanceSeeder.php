<?php

namespace Database\Seeders;

use App\Http\Controllers\Admin\SeanceController;
use App\Models\Hall;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hall_id = Hall::first()->id;
        for($i=2; $i<6; $i++){
            for($movie_id = 1; $movie_id<4; $movie_id++){
                DB::table('seances')->insert([
                    'movie_id' => $movie_id,
                    'hall_id' => $hall_id,
                    'date' => \Carbon\Carbon::now()->format('Y-m-d'),
                    'time' => \Carbon\Carbon::now()->addHour($i)->format('H:i:s'),
                    'hall_res_time' => (new SeanceController)->hall_res_time($movie_id),
                ]);

            }
        }
    }
}
