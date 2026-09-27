<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ordens_servico', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->restrictOnDelete();
            $table->foreignId('veiculo_id')->constrained('veiculos')->restrictOnDelete();
            $table->foreignId('box_id')->nullable()->constrained('boxes')->nullOnDelete();
            $table->string('status')->default('aberta');
            // aberta, agendada, em_andamento, aguardando_pagamento, concluida, cancelada
            $table->decimal('valor_total', 10, 2)->default(0);
            $table->text('observacoes')->nullable();
            $table->timestamp('data_entrada')->nullable();
            $table->timestamp('data_conclusao')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ordens_servico');
    }
};
