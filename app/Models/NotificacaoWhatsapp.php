<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table('notificacoes_whatsapp')]
#[Fillable([
    'ordem_servico_id', 'telefone_destino', 'tipo', 'mensagem',
    'status', 'enviado_em', 'erro',
])]
class NotificacaoWhatsapp extends Model
{
    public const STATUS_PENDENTE = 'pendente';

    public const STATUS_ENVIADO = 'enviado';

    public const STATUS_FALHOU = 'falhou';

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'enviado_em' => 'datetime',
        ];
    }

    /**
     * @return BelongsTo<OrdemServico, $this>
     */
    public function ordemServico(): BelongsTo
    {
        return $this->belongsTo(OrdemServico::class);
    }
}
