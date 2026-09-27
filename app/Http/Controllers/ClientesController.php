<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function novoCliente(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nome        = $request->input('nome');
        $cliente->cpf_cnpj    = $request->input('cpf_cnpj');
        $cliente->telefone    = $request->input('telefone');
        $cliente->email       = $request->input('email');
        $cliente->endereco    = $request->input('endereco');
        $cliente->observacoes = $request->input('observacoes');

        $cliente->save();
        return response()->json([
            'mensagem' => 'Cliente Cadastrado com sucesso',
            'dados'    => $cliente
        ], 201);
    }

    public function ListarClientes()
    {
        $clientes = Cliente::all();
        return response()->json([
            'mensagem' => 'Clientes cadastrados',
            'dados'    => $clientes,
        ], 200);
    }
}
