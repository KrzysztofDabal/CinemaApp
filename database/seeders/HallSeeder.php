<?php

namespace Database\Seeders;

use App\Http\Controllers\Admin\SlugController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        $row = 15;
        $columns =20;
        for($i=0; $i<4; $i++){
            DB::table('halls')->insert([
                'name' => $alphabet[$i].$i+1,
                'slug' => Str::slug('name'),
                'rows' => $row,
                'columns' => $columns,
            ]);
        }
    }
}
