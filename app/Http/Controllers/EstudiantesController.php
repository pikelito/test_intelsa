<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EstudianteRequest;
use App\Models\Estudiante;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantesQuery = Estudiante::with(['genero','identificacion_tipo','carreras'])->get();

        return  response()->json($estudiantesQuery);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstudianteRequest  $request)
    {
        $data=$request->validated();

        $estudiante= new Estudiante;
        $estudiante->nombres = $data['nombres'];
        $estudiante->apellidos = $data['apellidos'];
        $estudiante->identificacion_numero = $data['identificacion_numero'];
        $estudiante->identificacion_tipo_id = $data['identificacion_tipo_id'];
        $estudiante->fecha_nacimiento = $data['fecha_nacimiento'];
        $estudiante->genero_id = $data['genero_id'];
        $estudiante->carrera_id = $data['carrera_id'];

        $estudiante->save();

        return response()->json([ 'success' => true, 'message' => 'Estudiante guardado con éxito.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = Estudiante::with(['genero','identificacion_tipo','carreras'])->findOrFail($id);
        return response()->json($estudiante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstudianteRequest $request, $id)
    {
        $data=$request->validated();

        $estudiante = Estudiante::findOrFail($id);
        $estudiante->nombres = $data['nombres'];
        $estudiante->apellidos = $data['apellidos'];
        $estudiante->identificacion_numero = $data['identificacion_numero'];
        $estudiante->identificacion_tipo_id = $data['identificacion_tipo_id'];
        $estudiante->fecha_nacimiento = $data['fecha_nacimiento'];
        $estudiante->genero_id = $data['genero_id'];
        $estudiante->carrera_id = $data['carrera_id'];
        $estudiante->save();

        return response()->json(['success'=>true,'message' => 'Usuario actualizado con éxito.', 'updated'=> $estudiante]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($estudiante)
    {
        $estudiante_delete = Estudiante::findOrFail($estudiante);
        $estudiante_delete->delete();

        return response()->json([
            'success'=>true,
            'message' => 'Estudiante eliminado exitosamente.',
            'deleted'=> $estudiante_delete
        ],200);
    }
}
