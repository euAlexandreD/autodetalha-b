<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Table('ordens_servico')]
#[Fillable([
    'cliente_id', 'veiculo_id', 'box_id', 'status', 'valor_total',
    'observacoes', 'data_entrada', 'data_conclusao',
])]
class OrdemServico extends Model
{
    use SoftDeletes;

    public const STATUS_ABERTA = 'aberta';

    public const STATUS_AGENDADA = 'agendada';

    public const STATUS_EM_ANDAMENTO = 'em_andamento';

    public const STATUS_AGUARDANDO_PAGAMENTO = 'aguardando_pagamento';

    public const STATUS_CONCLUIDA = 'concluida';

    public const STATUS_CANCELADA = 'cancelada';

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'valor_total' => 'decimal:2',
            'data_entrada' => 'datetime',
            'data_conclusao' => 'datetime',
        ];
    }

    /**
     * @return BelongsTo<Cliente, $this>
     */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * @return BelongsTo<Veiculo, $this>
     */
    public function veiculo(): BelongsTo
    {
        return $this->belongsTo(Veiculo::class);
    }

    /**
     * @return BelongsTo<Box, $this>
     */
    public function box(): BelongsTo
    {
        return $this->belongsTo(Box::class);
    }

    /**
     * @return HasMany<OrdemServicoItem, $this>
     */
    public function itens(): HasMany
    {
        return $this->hasMany(OrdemServicoItem::class);
    }

    /**
     * @return HasMany<Agendamento, $this>
     */
    public function agendamentos(): HasMany
    {
        return $this->hasMany(Agendamento::class);
    }

    /**
     * @return HasMany<ChecklistFoto, $this>
     */
    public function checklistFotos(): HasMany
    {
        return $this->hasMany(ChecklistFoto::class);
    }

    /**
     * @return HasMany<NotificacaoWhatsapp, $this>
     */
    public function notificacoesWhatsapp(): HasMany
    {
        return $this->hasMany(NotificacaoWhatsapp::class);
    }
}
