<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['cliente_id', 'placa', 'marca', 'modelo', 'cor', 'ano_modelo', 'observacoes'])]
class Veiculo extends Model
{
    use SoftDeletes;

    /**
     * @return BelongsTo<Cliente, $this>
     */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * @return HasMany<OrdemServico, $this>
     */
    public function ordensServico(): HasMany
    {
        return $this->hasMany(OrdemServico::class);
    }
}
