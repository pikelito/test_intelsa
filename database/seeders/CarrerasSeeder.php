<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carreras;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carreras::insert([
            ['name' => 'Educación Física'],
            ['name' => 'Fisioterapía'],
            ['name' => 'Ingeniería Civil'],
            ['name' => 'Ingeniería de Sistemas'],
            ['name' => 'Medicina'],
        ]);
    }
}
