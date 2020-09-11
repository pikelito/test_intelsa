<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IdentificacionTipo;

class IdentificacionTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IdentificacionTipo::insert([
            ['name' => 'CC'],
            ['name' => 'TI'],
            ['name' => 'RC'],
            ['name' => 'PP'],
            ['name' => 'PEP'],
        ]);
    }
}
