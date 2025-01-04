<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;

class UserController extends Controller
{
  

    public function register(RegisterRequest $request)
    {
        // Criar um novo utilizador manualmente
        $role = Role::where("name","Guest")->first();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash da palavra-passe
        $user->role()->associate($role);
        $user->save();


        $token = JWTAuth::claims([
            "role" => $user->role
        ])->fromUser($user);

        // Retornar resposta JSON
        return response()->json(
            [
                'sucesso' => true,
                'mensagem' => 'Utilizador registado com sucesso.',
                "user" => $user,
                "token" => $token,
            ],
            201
        );
    }



    /**
     * Método para iniciar sessão (login).
     */
    public function login(Request $request)
    {
        // Obter credenciais da requisição
        $credentials = $request->only("email", "password");

        // Tentar autenticar com as credenciais fornecidas
        if (!($token = JWTAuth::attempt($credentials))) {
            return response()->json(
                ["erro" => "Credenciais inválidas."],
                401
            );
        }

        // Obter o utilizador autenticado
        $user = auth()->user();
        $token = JWTAuth::claims(["role" => $user->role])->fromUser($user);

        // Retornar resposta JSON com os dados do utilizador e o token
        return response()->json([
            "utilizador" => $user,
            "token" => $token,
        ]);
    }


    // função para obter dados do utilizador 

    public function me()
    {
        return response()->json(auth()->user());
    }
}
