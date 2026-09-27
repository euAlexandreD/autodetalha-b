<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ordem_servico_id')->constrained('ordens_servico')->cascadeOnDelete();
            $table->foreignId('box_id')->constrained('boxes')->restrictOnDelete();
            $table->dateTime('inicio_previsto');
            $table->dateTime('fim_previsto');
            $table->dateTime('inicio_real')->nullable();
            $table->dateTime('fim_real')->nullable();
            $table->string('status')->default('agendado');
            // agendado, confirmado, em_andamento, concluido, cancelado
            $table->timestamps();

            $table->index(['box_id', 'inicio_previsto']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
