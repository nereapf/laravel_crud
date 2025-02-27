<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProyectoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:100|unique:proyectos,titulo',
            'horas_previstas' => 'required|integer|min:1',
            'fecha_de_comienzo' => 'required|date|before:today',
        ];
    }

    public function messages(): array
    {
        return [
            "titulo.required" => "Debe introducir un titulo",
            "titulo.unique" => "Este proyecto ya existe",
            "horas_previstas.required" => "Debe introducir una hora prevista",
            "horas_previstas.min" => "Como mínimo debe haber 1 hora prevista",
            "fecha_de_comienzo.required" => "Debe introducir una fecha de comienzo",
            "fecha_de_comienzo.before" => "La fecha no puede ser posterior a la fecha actual"
        ];
    }

}
