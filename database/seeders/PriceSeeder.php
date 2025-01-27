<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prices')->insert(
            [
                'name' => 'Normalny',
                'price' => 30
            ]
            );
        DB::table('prices')->insert(
            [
                'name' => 'Ulgowy',
                'price' => 20
            ]
            );
    }
}
