<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string $nome
 * @property string $banco
 * @property float $agencia
 * @property string $digito_agencia
 * @property float $conta
 * @property string $digito_conta
 * @property string $codigo_empresa
 * @property float $carteira
 * @property float $tipo
 * @property string $mensagem_1
 * @property string $mensagem_2
 * @property string $cpf_cnpj
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Contrato[] $contratos
 * @property Remessa[] $remessas
 */
class Conta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'conta';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nome', 'banco', 'agencia', 'digito_agencia', 'conta', 'digito_conta', 'codigo_empresa', 'carteira', 'tipo', 'mensagem_1', 'mensagem_2', 'cpf_cnpj', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Contrato', 'id_conta');
    }

    /**
     * @return HasMany
     */
    public function remessas()
    {
        return $this->hasMany('App\Remessa', 'id_conta');
    }
}
