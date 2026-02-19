<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class usuariosRequest extends FormRequest
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
                'email' => 'required|email|max:255',
                'password' => 'required|min:8',
                'role' => 'required|in:admin,barbero,cliente',
            ];
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            // VALIDACIÓN PARA ACTUALIZAR
            return [
                'nameEdit' => 'required|string|max:255',
                'emailEdit' => 'required|email|max:255',
                'roleEdit' => 'required|in:admin,barbero,cliente',
                'passwordEdit' => 'nullable|min:8',
            ];
        }

        return [];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El campo email debe ser un endereço de email válido.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'role.required' => 'El campo rol es obligatorio.',
            'role.in' => 'El rol debe ser admin, barber o cliente.',
            'nameEdit.required' => 'El campo nombre es obligatorio.',
            'emailEdit.required' => 'El campo email es obligatorio.',
            'emailEdit.email' => 'El campo email debe ser un endereço de email válido.',
            'roleEdit.required' => 'El campo rol es obligatorio.',
            'roleEdit.in' => 'El rol debe ser admin, barber o cliente.',
        ];
    }
}
