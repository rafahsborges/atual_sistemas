<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $id_cliente
 * @property integer $id_plano
 * @property integer $id_conta
 * @property string $primeira_parcela
 * @property string $ultima_parcela
 * @property string $data_assinatura
 * @property float $qtd_parcelas
 * @property float $tipo_pagamento
 * @property float $valor
 * @property boolean $plano_funeral
 * @property float $desconto
 * @property float $juros
 * @property float $multa
 * @property string $validade_contrato
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Cliente $cliente
 * @property Conta $conta
 * @property Plano $plano
 * @property ContratoParcela[] $contratoParcelas
 */
class Contrato extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_cliente', 'id_plano', 'id_conta', 'primeira_parcela', 'ultima_parcela', 'data_assinatura', 'qtd_parcelas', 'tipo_pagamento', 'valor', 'plano_funeral', 'desconto', 'juros', 'multa', 'validade_contrato', 'enabled', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'id_cliente');
    }

    /**
     * @return BelongsTo
     */
    public function conta()
    {
        return $this->belongsTo('App\Conta', 'id_conta');
    }

    /**
     * @return BelongsTo
     */
    public function plano()
    {
        return $this->belongsTo('App\Plano', 'id_plano');
    }

    /**
     * @return HasMany
     */
    public function contratoParcelas()
    {
        return $this->hasMany('App\ContratoParcela', 'id_contrato');
    }
}
