<?php

namespace Database\Seeders;

use App\Http\Controllers\Admin\SlugController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'title' => 'Spider-man: Bez drogi do domu',
            'slug' => Str::slug('Spider-man: Bez drogi do domu'),
            'director' => 'Frank Darabont',
            'scriptwriter' => 'Frank Darabont, Frank Darabont',
            'length' => '150',
            'description' => 'Kiedy cały świat dowiaduje się, że pod maską Spider Mana skrywa się Peter Parker, superbohater decyduje się zwrócić o pomoc do Doktora Strange\'a.',
            'image' => 'test/spiderman.jpg',
            'rating' => '80',
            'category' => '{"0":"Akcja","1":"Sci-Fi"}',
        ]);
        DB::table('movies')->insert([
            'title' => 'Skazany na Showshakn',
            'slug' => Str::slug('Skazany na Showshakn'),
            'director' => 'Frank Darabont',
            'scriptwriter' => 'Frank Darabont, Frank Darabont, Frank Darabont',
            'length' => '148',
            'description' => 'Adaptacja opowiadania Stephena Kinga. Niesłusznie skazany na dożywocie bankier, stara się przetrwać w brutalnym, więziennym świecie.',
            'image' => 'test/shawshank.jpg',
            'rating' => '88',
            'category' => '{"0":"Dramat"}',
        ]);
        DB::table('movies')->insert([
            'title' => 'Cars',
            'slug' => Str::slug('Cars'),
            'director' => 'Janek Darabont',
            'scriptwriter' => 'Janek Darabont, Frank Darabont',
            'length' => '150',
            'description' => 'Kiedy cały świat dowiaduje się, że pod maską Spider Mana skrywa się Peter Parker, superbohater decyduje się zwrócić o pomoc do Doktora Strange\'a.',
            'image' => 'test/cars.jpg',
            'rating' => '100',
            'category' => '{"0":"Animacja","1":"Komedia"}',
        ]);
    }
}
