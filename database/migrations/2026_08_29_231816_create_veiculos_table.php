<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->cascadeOnDelete();
            $table->string('placa', 10);
            $table->string('marca')->nullable();
            $table->string('modelo');
            $table->string('cor')->nullable();
            $table->year('ano_modelo')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('placa');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
