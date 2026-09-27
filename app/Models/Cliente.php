<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['nome', 'cpf_cnpj', 'telefone', 'email', 'endereco', 'observacoes', 'ativo'])]
class Cliente extends Model
{
    use SoftDeletes;

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
     * @return HasMany<Veiculo, $this>
     */
    public function veiculos(): HasMany
    {
        return $this->hasMany(Veiculo::class);
    }

    /**
     * @return HasMany<OrdemServico, $this>
     */
    public function ordensServico(): HasMany
    {
        return $this->hasMany(OrdemServico::class);
    }
}
