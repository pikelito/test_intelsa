<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Carreras;
use App\Models\Genero;
use App\Models\IdentificacionTipo;
use App\Models\Estudiante;

class EstudianteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $carreras = Carreras::class;
    protected $genero =  Genero::class;
    protected $identificacion_tipo = IdentificacionTipo::class;
    protected $model  = Estudiante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nombres" => $this->faker->firstName,
            "apellidos" => $this->faker->lastName,
            "identificacion_tipo_id" => $this->identificacion_tipo::all()->random()->id,
            "identificacion_numero" => $this->faker->isbn10,
            "fecha_nacimiento" => $this->faker->dateTimeThisCentury->format('Y-m-d'),
            "genero_id" => $this->genero::all()->random()->id,
            "carrera_id" => $this->carreras::all()->random()->id,
        ];
    }
}
