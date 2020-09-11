<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carreras;
use App\Models\Genero;
use App\Models\IdentificacionTipo;

class GeneralController extends Controller
{
    public function getListas()
    {
        $listas= [];
        $listas['lista_genero'] = Genero::all();
        $listas['lista_carreras'] = Carreras::all();
        $listas['lista_identificacion'] = IdentificacionTipo::all();
        return response()->json($listas);
    }
}
