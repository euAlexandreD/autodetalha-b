<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VeiculoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['status' => 'ok'], 200);
});

Route::post('/adicionar_veiculo', [VeiculoController::class, 'novVeiculo'])->name('addVeiculo');
Route::post('/adicionar_cliente', [ClientesController::class, 'novoCliente'])->name('addCliente');
Route::post('/adicionar_servico', [ServicosController::class, 'novoServico'])->name('addServico');
Route::post('/adicionar_usuario', [UsersController::class, 'novoUsuario'])->name('novoUsuario');
Route::post('/fazer_login', [LoginController::class, 'executarLogin'])->name('executarLogin');
Route::post('/fazer_logout', [LoginController::class, 'executarLogout'])->middleware('auth:sanctum')->name('executarLogout');
Route::get('/listar_servicos', [ServicosController::class, 'listarServicos'])->name('listarServicos');
Route::get('/listar_veiculos', [VeiculoController::class, 'ListarVeiculos'])->name('listarVeiculos');
Route::get('/listar_usuarios', [UsersController::class, 'ListarUsuarios'])->name('listarUsuarios');
Route::get('/listar_clientes', [ClientesController::class, 'ListarClientes'])->name('listarClientes');
