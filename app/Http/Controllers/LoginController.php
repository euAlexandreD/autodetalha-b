<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function executarLogin(Request $request)
    {
        $credenciais = $request->validate([
            'emailUsuario' => ['required', 'email'],
            'senhaUsuario' => ['required', 'string'],
        ]);

        $usuario = User::where('email', $credenciais['emailUsuario'])->first();

        if (! $usuario || ! Hash::check($credenciais['senhaUsuario'], $usuario->password)) {
            return response()->json([
                'mensagem' => 'Credenciais invalidas',
            ], 401);
        }

        $token = $usuario->createToken('api-token')->plainTextToken;

        return response()->json([
            'mensagem' => 'Usuario '.$usuario->name.' logado com sucesso',
            'token' => $token,
            'dados' => $usuario,
        ], 200);
    }

    public function executarLogout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'mensagem' => 'Logout realizado com sucesso',
        ], 200);
    }
}
