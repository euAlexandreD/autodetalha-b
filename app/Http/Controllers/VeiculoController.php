<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function novoVeiculo(Request $request)
    {
        $veiculo = new Veiculo();
        $veiculo->cliente_id  = $request->input('cliente_id');
        $veiculo->placa       = $request->input('placa');
        $veiculo->marca       = $request->input('marca');
        $veiculo->modelo      = $request->input('modelo');
        $veiculo->cor         = $request->input('cor');
        $veiculo->ano_modelo  = $request->input('ano_modelo');
        $veiculo->observacoes = $request->input('observacoes');

        $veiculo->save();
        return response()->json([
            'mensagem' => 'salvo com sucesso',
            'dados'    => $veiculo,
        ], 201);
    }

    public function listarVeiculos()
    {
        $veiculos = Veiculo::all();
        return response()->json([
            'mensagem' => 'Veiculos cadastrados: ',
            'dados'    => $veiculos,
        ], 200);
    }
}
