<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    /**
 
     */
    public function authorize(): bool
    {

        return true;
    }

   
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users', // O email deve ser único na tabela 'users'
            'password' => 'required|string|min:6', // Mínimo de 6 caracteres
          
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Por favor, forneça um endereço de email válido.',
            'email.unique' => 'Este email já está registado.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
           
        ];
    }
    

 
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(
            response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}