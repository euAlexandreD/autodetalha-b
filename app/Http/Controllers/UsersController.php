<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function novoUsuario(Request $request)
    {
        $usuario = new User();
        $usuario->name     = $request->input('name');
        $usuario->email    = $request->input('email');
        $usuario->password = Hash::make($request->input('password'));

        $usuario->save();
        return response()->json([
            'mensagem' => 'Usuario cadastrado com sucesso',
            'dados'    => $usuario,
        ], 201);
    }

    public function listarUsuarios()
    {
        $usuarios = User::all();
        return response()->json([
            'mensagem' => 'Usuarios cadastrados',
            'dados'    => $usuarios,
        ], 200);
    }
}
