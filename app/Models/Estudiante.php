<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estudiante extends Model
{
    use HasFactory, SoftDeletes;

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected $fillable = [
        "nombres", "apellidos", "identificacion_tipo_id", "identificacion_numero", "fecha_nacimiento", "genero_id", "carrera_id"
    ];

    public function genero()
    {
        return $this->belongsTo('App\Models\Genero','genero_id','id');
    }

    public function identificacion_tipo()
    {
        return $this->belongsTo('App\Models\IdentificacionTipo','identificacion_tipo_id','id');
    }

    public function carreras()
    {
        return $this->belongsTo('App\Models\Carreras','carrera_id','id');
    }

}
