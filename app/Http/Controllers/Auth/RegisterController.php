<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterStoreRequest;

class RegisterController extends Controller
{
    /**
     * Registro
     *
     * Cadastra usuário no sistema
     * @group Auth
     * @responseFile 201 response/auth/RegistroSucesso.json
     * @responseFile 422 response/auth/ValidarRegistro.json
     */
    public function register(RegisterStoreRequest $request)
    {
        DB::transaction(function () use ($request) {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return $user;
        });

        return response()->json(['message' => 'User created successfully'], 201);
    }
}
