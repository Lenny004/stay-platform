<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nameU' => 'required|string|max:100|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
            'user' => 'required|string|max:25|unique:users,username|alpha_num',
            'email' => 'required|email|max:90|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:40',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/'
            ],
            'phone' => 'required|string|max:20',
            'phone-suffix' => 'required|string|max:10',
            'divisa' => 'required|integer|exists:currencies,id',
            'id_nacionalidad' => 'required|integer|exists:nationalities,id',
            'id_state' => 'nullable|integer|exists:us_states,id',
        ];
    }

    public function messages()
    {
        return [
            'nameU.required' => 'El nombre completo es obligatorio',
            'nameU.regex' => 'El nombre solo puede contener letras y espacios',
            'user.unique' => 'Este nombre de usuario ya está en uso',
            'user.alpha_num' => 'El usuario solo puede contener letras y números',
            'email.unique' => 'Este correo electrónico ya está registrado',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.regex' => 'La contraseña debe contener mayúsculas, minúsculas y números',
            'divisa.exists' => 'La divisa seleccionada no es válida',
            'id_nacionalidad.exists' => 'La nacionalidad seleccionada no es válida',
        ];
    }
}