<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'ordem_servico_id', 'box_id', 'inicio_previsto', 'fim_previsto',
    'inicio_real', 'fim_real', 'status',
])]
class Agendamento extends Model
{
    public const STATUS_AGENDADO = 'agendado';

    public const STATUS_CONFIRMADO = 'confirmado';

    public const STATUS_EM_ANDAMENTO = 'em_andamento';

    public const STATUS_CONCLUIDO = 'concluido';

    public const STATUS_CANCELADO = 'cancelado';

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'inicio_previsto' => 'datetime',
            'fim_previsto' => 'datetime',
            'inicio_real' => 'datetime',
            'fim_real' => 'datetime',
        ];
    }

    /**
     * @return BelongsTo<OrdemServico, $this>
     */
    public function ordemServico(): BelongsTo
    {
        return $this->belongsTo(OrdemServico::class);
    }

    /**
     * @return BelongsTo<Box, $this>
     */
    public function box(): BelongsTo
    {
        return $this->belongsTo(Box::class);
    }
}
