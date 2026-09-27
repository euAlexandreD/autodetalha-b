<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicosController extends Controller
{
    public function novoServico(Request $request)
    {
        $servico = new Servico();
        $servico->nome                 = $request->input('nome');
        $servico->descricao            = $request->input('descricao');
        $servico->preco_base           = $request->input('preco_base');
        $servico->duracao_estimada_min = $request->input('duracao_estimada_min');

        $servico->save();
        return response()->json([
            'mensagem' => 'Serviço adicionado com sucesso',
            'dados'    => $servico,
        ], 201);
    }


    public function listarServicos()
    {
        $servico = Servico::all();
        return response()->json([
            'mensagem' => 'Serviços cadastrados: ',
            'dados'    => $servico,
        ], 200);
    }
}
