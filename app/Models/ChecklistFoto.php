<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['ordem_servico_id', 'tipo', 'caminho_arquivo', 'descricao'])]
class ChecklistFoto extends Model
{
    public const TIPO_ENTRADA = 'entrada';

    public const TIPO_SAIDA = 'saida';

    /**
     * @return BelongsTo<OrdemServico, $this>
     */
    public function ordemServico(): BelongsTo
    {
        return $this->belongsTo(OrdemServico::class);
    }
}
