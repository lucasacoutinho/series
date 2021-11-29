<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'email' => [
                'description' => 'O email do usuário',
                'example' => 'teste@example.com',
            ],
            'password' => [
                'description' => 'A senha do usuário',
                'example' => 'senha123',
            ],
        ];
    }
}
