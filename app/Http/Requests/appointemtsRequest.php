<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class appointemtsRequest extends FormRequest
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
             'dateEdit' => 'required|date|after_or_equal:today',
             'timeEdit' => 'required|date_format:H:i',


        ];
    }
    public function messages()
    {
        return [
            'dateEdit.required' => 'El campo fecha es obligatorio.',
            'dateEdit.date' => 'El campo fecha debe ser una fecha válida.',
            'dateEdit.after_or_equal' => 'La fecha no puede ser anterior a hoy.',
            'timeEdit.required' => 'El campo hora es obligatorio.',
            'timeEdit.date_format' => 'El campo hora debe tener el formato HH:mm.',
        ];
    }
}
