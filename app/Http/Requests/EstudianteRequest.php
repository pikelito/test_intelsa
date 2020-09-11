<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method()) {
            case 'POST':
                return [
                    "nombres" => "required|string",
                    "apellidos" => "required|string",
                    "identificacion_numero" => "required|numeric|min:6",
                    "identificacion_tipo_id" => "required|integer|exists:identificacion_tipos,id",
                    "fecha_nacimiento" => "required|date|date_format:Y-m-d",
                    "genero_id" => "required|integer|exists:generos,id",
                    "carrera_id" => "required|integer|exists:carreras,id",
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    "nombres" => "required|string",
                    "apellidos" => "required|string",
                    "identificacion_numero" => "required|numeric|min:6",
                    "identificacion_tipo_id" => "required|integer|exists:identificacion_tipos,id",
                    "fecha_nacimiento" => "required|date|date_format:Y-m-d",
                    "genero_id" => "required|integer|exists:generos,id",
                    "carrera_id" => "required|integer|exists:carreras,id",
                ];
            default: break;
        }
    }
}
