<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nome', 'descricao', 'ativo'])]
class Box extends Model
{
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'ativo' => 'boolean',
        ];
    }

    /**
     * @return HasMany<OrdemServico, $this>
     */
    public function ordensServico(): HasMany
    {
        return $this->hasMany(OrdemServico::class);
    }

    /**
     * @return HasMany<Agendamento, $this>
     */
    public function agendamentos(): HasMany
    {
        return $this->hasMany(Agendamento::class);
    }
}
