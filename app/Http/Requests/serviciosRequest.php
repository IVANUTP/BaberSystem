<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class serviciosRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            // VALIDACIÓN PARA CREAR
            return [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'duration' => 'required|integer|min:1',
                'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ];
        }
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            // VALIDACIÓN PARA ACTUALIZAR
            return [
                'nameEdit' => 'required|string|max:255',
                'descriptionEdit' => 'nullable|string',
                'priceEdit' => 'required|numeric|min:0',
                'durationEdit' => 'required|integer|min:1',
                'imgEdit' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ];
        }
        return [];
    }
    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'description.required' => 'El campo descripción es obligatorio.',
            'price.required' => 'El campo precio es obligatorio.',
            'price.numeric' => 'El campo precio debe ser un número.',
            'price.min' => 'El campo precio no puede ser negativo.',
            'duration.required' => 'El campo duración es obligatorio.',
            'duration.integer' => 'El campo duración debe ser un número entero.',
            'duration.min' => 'El campo duración debe ser al menos 1 minuto.',
            'nameEdit.required' => 'El campo nombre es obligatorio.',
            'descriptionEdit.required' => 'El campo descripción es obligatorio.',
            'priceEdit.required' => 'El campo precio es obligatorio.',
            'priceEdit.numeric' => 'El campo precio debe ser un número.',
            'priceEdit.min' => 'El campo precio no puede ser negativo.',
            'durationEdit.required' => 'El campo duración es obligatorio.',
            'durationEdit.integer' => 'El campo duración debe ser un número entero.',
            'durationEdit.min' => 'El campo duración debe ser al menos 1 minuto.',

        ];
    }
}
