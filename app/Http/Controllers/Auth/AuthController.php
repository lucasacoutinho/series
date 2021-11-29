<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api'])->except(['login']);
    }

    /**
     * Login
     *
     * Gera um token de acesso ao sistema
     * @group Auth
     * @responseFile 200 response/auth/DetalhesToken.json
     * @responseFile 422 response/auth/ValidarLogin.json
     */
    public function login(LoginRequest $request)
    {
        if (! $token = getAuthenticationGuard()->attempt($request->only(['email', 'password']))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Meu perfil
     *
     * Gera um token de acesso ao sistema
     * @group Auth
     * @responseFile 200 response/auth/DetalhesUsuario.json
     * @responseFile 401 response/auth/ValidarAutenticacao.json
     */
    public function me()
    {
        return response()->json(getAuthenticatedUser());
    }

    /**
     * Logout
     *
     * Invalida o token do usuário autenticado
     * @group Auth
     * @responseFile 401 response/auth/ValidarAutenticacao.json
     */
    public function logout()
    {
        getAuthenticationGuard()->logout();

        return response()->json();
    }

    /**
     * Refresh
     *
     * Gera um novo token de acesso ao usuário autenticado
     * @group Auth
     * @responseFile 200 response/auth/DetalhesToken.json
     * @responseFile 401 response/auth/ValidarAutenticacao.json
     */
    public function refresh()
    {
        return $this->respondWithToken(getAuthenticationGuard()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => getAuthenticationGuard()->factory()->getTTL() * 60
        ]);
    }
}
