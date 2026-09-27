<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notificacoes_whatsapp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ordem_servico_id')->constrained('ordens_servico')->cascadeOnDelete();
            $table->string('telefone_destino', 20);
            $table->string('tipo'); // agendamento_criado, servico_iniciado, servico_concluido, etc.
            $table->text('mensagem');
            $table->string('status')->default('pendente'); // pendente, enviado, falhou
            $table->timestamp('enviado_em')->nullable();
            $table->text('erro')->nullable();
            $table->timestamps();

            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notificacoes_whatsapp');
    }
};
