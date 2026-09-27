<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nome', 'descricao', 'preco_base', 'duracao_estimada_min', 'ativo'])]
class Servico extends Model
{
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'preco_base' => 'decimal:2',
            'duracao_estimada_min' => 'integer',
            'ativo' => 'boolean',
        ];
    }

    /**
     * @return HasMany<OrdemServicoItem, $this>
     */
    public function ordemServicoItens(): HasMany
    {
        return $this->hasMany(OrdemServicoItem::class);
    }
}
