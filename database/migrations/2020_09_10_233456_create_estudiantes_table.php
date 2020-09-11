<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->unsignedInteger('identificacion_tipo_id')->comment('tipo de identificación');
            $table->string('identificacion_numero');
            $table->unsignedInteger('genero_id')->comment('Lista de generos');
            $table->date('fecha_nacimiento');
            $table->unsignedInteger('carrera_id')->comment('Lista de carreras');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('identificacion_tipo_id')->references('id')->on('identificacion_tipos');
            $table->foreign('genero_id')->references('id')->on('generos');
            $table->foreign('carrera_id')->references('id')->on('carreras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
