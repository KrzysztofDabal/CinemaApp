<?php

namespace Database\Seeders;

use App\Http\Controllers\Admin\SlugController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Pan',
            'surname' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'phone_number' => 123456789,
            'role' => 3,
            'password' => Hash::make('asdasdasd'),
        ]);
    }
}
