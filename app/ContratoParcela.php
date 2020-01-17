<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $id_contrato
 * @property string $vencimento
 * @property string $pagamento
 * @property float $id_boleto
 * @property float $id_carne
 * @property float $valor
 * @property float $numero_parcela
 * @property float $valor_pagamento
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Contrato $contrato
 * @property Boleto[] $boletos
 */
class ContratoParcela extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contrato_parcela';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_contrato', 'vencimento', 'pagamento', 'id_boleto', 'id_carne', 'valor', 'numero_parcela', 'valor_pagamento', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return BelongsTo
     */
    public function contrato()
    {
        return $this->belongsTo('App\Contrato', 'id_contrato');
    }

    /**
     * @return HasMany
     */
    public function boletos()
    {
        return $this->hasMany('App\Boleto', 'id_contrato_parcela');
    }
}
